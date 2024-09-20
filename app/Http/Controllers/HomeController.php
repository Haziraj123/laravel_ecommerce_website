<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product; // Ensure you import the Product model
use App\Models\Order; 
use App\Models\User; 
use App\Models\Cart; // Ensure you import the Cart model;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        
        if ($usertype == 1) {

            $total_product =Product::all()->count();
            $total_order =Order::all()->count();
            $total_customer = User::where('usertype', '0')->count();
            $total_category =Category::all()->count();
            $order = Order::all();
            $total_revenue =0;
            foreach ($order as $order) {
                $total_revenue =  $total_revenue + $order->total;
            }
            $order_processing =Order::where('delivery_status', 'processing')->count();
            $order_delivered=Order::where('delivery_status', 'delivered')->count();
          
            return view('admin.adashboard', compact('total_product', 'total_order', 'total_customer','total_category', 'total_revenue', 'order_processing', 'order_delivered'));
        } else {
            $products = Product::paginate(9); // This is for if user login then show product 
            return view('home.index', compact('products')); // Otherwise not
        }
    }

    public function index()
    {
        $products = Product::paginate(9); // Fetch all products from the database
        return view('home.index', compact('products')); // Pass the products to the view
    } 

    public function about() {
        return view('home.about');
    }
    

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        $arr = explode(",", $id);
    
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($arr[0]);
    
            // Check if the product already exists in the cart
            $existingCartItem = Cart::where('user_id', $user->id)
                                    ->where('product_id', $product->id)
                                    ->first();
    
            if ($existingCartItem) {
                // Redirect to the cart page with a message that the product is already in the cart
                return redirect()->route('home.cart')->with('success', 'This product is already in your cart!');
            } else {
                // Create a new cart item if the product is not in the cart
                $cart = new Cart();
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;
                $cart->product_title = $product->title;
    
                $cart->price = ($product->discount_price ?? $product->price) * $arr[1];
                $cart->image = $product->image;
                $cart->product_id = $product->id;
                $cart->quantity = $arr[1];
    
                $cart->save();
            }
            Alert::success('Product added successfully','A product added to your cart');
            return redirect()->route('redirect');
        } else {
            return redirect()->route('login');
        }
    }
    

    public function cart()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = Cart::where('user_id', $user->id)->get();
            return view('home.cart', compact('cartItems'));
        } else {
            return redirect()->route('login');
        }
    }  

    public function deleteProduct($id)
    {
        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();
            return redirect()->back()->with('success', 'Product deleted successfully!');
        }
        return redirect()->back()->with('error', 'Product not found!');
    }
       
            public function calculateShippingCost($distance)
        {
            // Set different shipping cost based on distance
            if ($distance < 10) {
                return 5.00; // If distance is less than 10 km
            } elseif ($distance >= 10 && $distance <= 50) {
                return 10.00; // If distance is between 10 km and 50 km
            } else {
                return 20.00; // If distance is greater than 50 km
            }
        }

    public function checkout()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = Cart::where('user_id', $user->id)->get();
            $userDistance = 25; // Assume this is fetched dynamically (e.g., from a Google Maps API or other service)
             // Calculate shipping cost based on distance
          $shippingCost = $this->calculateShippingCost($userDistance);
            return view('home.check_out', compact('cartItems','shippingCost'));
        } else {
            return redirect()->route('login');
        }
    }

    public function ordercomplete()
    {
        // Your logic for the order complete page goes here
        return view('home.order_complete');
    }


    public function my_order()
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            // Fetch only the orders that are not hidden from the user
            $orders = Order::where('user_id', $user->id)
                           ->where('hidden_from_user', false)  // Exclude hidden orders
                           ->get();
    
            return view('home.my_order', compact('orders'));
        } else {
            return redirect()->route('login');
        }
    }
    
    public function cancel_order($id){
        $order = Order::find($id);
        $order->delivery_status ='Order Cancelled';
        $order->save();    
        return redirect()->back(); 
    }
    public function remove_order($id) {
        $order = Order::find($id);
    
         // Mark the order as hidden for the user
        $order->hidden_from_user = true; 

        // Save the change without deleting the order
          $order->save();
    
        return redirect()->back()->with('success', 'Order removed from your list successfully.');
    }





    public function shop(Request $request)
{
    $query = Product::query();
    // Filter by category if provided
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }
    // Paginate the results
    $products = $query->paginate(12); // You can adjust the number of items per page as needed
    // Fetch categories from the database
    $categories = Category::all();
    // Pass both products and categories to the view
    return view('home.shop', compact('products', 'categories'));
}
public function search(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('title', 'LIKE', "%{$query}%")
                        ->orWhere('description', 'LIKE', "%{$query}%")
                        ->paginate(12);
                        $categories = Category::all();
    return view('home.shop', compact('products' ,'categories'));
}

    

}
