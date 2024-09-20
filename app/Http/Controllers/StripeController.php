<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\RedirectResponse;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; // Import the Mail facade
use App\Mail\OrderPlacedMail; // Import the Mailable class
 
 
class StripeController extends Controller
{
    public function checkout()
    {
        return view('stripecheckout');
    }

    public function session(Request $request)
    {
              // Validate form data
    $validatedData = $request->validate([
        'name'        => 'required|string',
        'address'     => 'required|string',
        'city'        => 'required|string',
        'state'       => 'required|string',
        'postal_code' => 'required|string',
        'email'       => 'required|email',
        'phone'       => 'required|string',
        'payment_method' => 'required',
    ]);

        \Stripe\Stripe::setApiKey(config('stripe.sk'));
    
        $cartItems = $request->get('cartItems', []); // Default to an empty array
        $lineItems = [];
    
        if (is_array($cartItems)) {
            foreach ($cartItems as $item) {
                $lineItems[] = [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            'name' => $item['product_title'],
                        ],
                        'unit_amount'  => intval($item['price'] * 100), // Convert dollars to cents
                    ],
                    'quantity'   => 1, // Quantity is set to 1 because the price is already the total for that product
                ];
            }
        } else {
            // Handle error or set a default
            return redirect()->route('checkout')->with('error', 'Cart items are missing.');
        }
             // Store validated customer information (excluding payment status) in session
    session()->put('checkout_data', $validatedData);

    
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => $lineItems,
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);
    
        return redirect()->away($session->url);
    }
    public function success()
    {
        $checkoutData = session()->get('checkout_data');
        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = Cart::where('user_id', $user->id)->get();
             
                    // Retrieve the stored form data from the session
     
            
            // Handle saving the order in the database
            $order = new Order();
            $order->user_id = $user->id;
            $order->order_id = Order::max('order_id') + 1; 
            $order->name = $checkoutData['name'];  // From form validation
            $order->email = $checkoutData['email'];
            $order->phone = $checkoutData['phone'];
            $order->address = $checkoutData['address'];
            $order->city = $checkoutData['city'];
            $order->state = $checkoutData['state'];
            $order->postal_code = $checkoutData['postal_code'];
            $order->payment_method = 'Stripe';
            $order->payment_status = 'Paid';
            $order->total = collect($cartItems)->sum(fn($item) => $item['price']);
            $order->save();

            // Save the order items
            foreach ($cartItems as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->order_id; 
                $orderItem->product_id = $item->product_id;
                $orderItem->product_title = $item->product_title;
                $orderItem->quantity = $item->quantity;
                $orderItem->image = $item->image;
                $orderItem->save();
            } 
            // Clear the cart
            Cart::where('user_id', $user->id)->delete();
          
               // Send order confirmation email
            Mail::to($order->email)->send(new OrderPlacedMail($order));
            
               return view(' home.order_complete');
    }
        
}

}
