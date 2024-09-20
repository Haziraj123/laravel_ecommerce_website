<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail; 
use App\Mail\OrderPlacedMail; 
use Illuminate\Support\Str;
use App\Models\User;       //for billing details 
class CashOnDeliveryController extends Controller
{
     public function Cod(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = $request->input('cartItems', []);

            if (!is_array($cartItems)) {
                return redirect()->route('order.complete')->with('error', 'Invalid cart items.');
            }
                        // Validate form data
                $validatedData = $request->validate([
                    'name' => 'required|string',
                    'address' => 'required|string',
                    'city' => 'required|string',
                    'state' => 'required|string',
                    'postal_code' => 'required|string',
                    'email' => 'required|email',
                    'phone' => 'required|string',
                    'payment_method' => 'required',
                ]);

            // Handle saving the order in the database
            $order = new Order();
            $order->user_id = $user->id;
            $order->order_id = Order::max('order_id') + 1; 
            $order->name = $request->input('name');
            $order->email = $request->input('email');
            $order->phone = $request->input('phone');
            $order->address = $request->input('address');
            $order->city = $request->input('city');
            $order->state = $request->input('state');
            $order->postal_code = $request->input('postal_code');
            $order->payment_method = 'Cash on Delivery';
            $order->payment_status = 'Pending';
            $order->total = collect($cartItems)->sum(fn($item) => $item['price']  ); //* $item['quantity']
            $order->delivery_status = 'Processing'; // Set initial status
            $order->save();     
           
                // Save the order items
            foreach ($cartItems as $item) {
                if (isset($item['product_id'])) { 
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->order_id; 
                    $orderItem->product_id = $item['product_id'];
                    $orderItem->product_title = $item['product_title'] ?? 'Unknown Product';
                    $orderItem->quantity = $item['quantity'] ?? 1;
                    $orderItem->image = $item['image'] ?? null;
                    $orderItem->save();
                } else {
                    return redirect()->route('checkout')->with('error', 'One or more products in the cart are missing a product ID.');
                }
            }

            // Clear the cart
            Cart::where('user_id', $user->id)->delete();

            try {
                Mail::to($order->email)->send(new OrderPlacedMail($order));
            } catch (\Exception $e) {
                return redirect()->route('checkout')->with('error', 'Order placed, but email could not be sent.');
            }

            return redirect()->route('home.order_complete');
        }

        return redirect()->route('login')->with('error', 'You must be logged in to complete the order.');
    }

    public function orderComplete()
    {
        return view('home.order_complete');
    }
}
