<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderitem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail; // for mail
use App\Mail\OrderPlacedMail; // for mail
use App\Mail\DeliveredMail;
use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{
 // Show the settings page
 public function settings()
 {
     $user = Auth::user(); // Get the currently authenticated user
     return view('admin.settings', compact('user'));
 }
  // Handle settings form submission
  public function updateSettings(Request $request)  
  {  
      $user = Auth::user();  
  
      if (!$user instanceof User) {  
          return redirect()->back()->with('error', 'User not authenticated or does not exist.');  
      }  
  
      $request->validate([  
          'name' => 'required|string|max:255',  
          'email' => 'required|email',  
          'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  
      ]);  
  
      if ($request->hasFile('image')) {  
          $image = $request->file('image');  
          $imageName = time() . '.' . $image->getClientOriginalExtension();  
          $image->move(public_path('uploads/profile_images'), $imageName);  
          $user->profile_photo_path = 'uploads/profile_images/' . $imageName;  
      }  
  
      // Update user's attributes  
      $user->name = $request->input('name');  
      $user->email = $request->input('email');  
      
      // Ensure this line is valid  
      if (!$user->save()) {  
          return redirect()->back()->with('error', 'Failed to update profile.');  
      }  
  
      return redirect()->back()->with('success', 'Profile updated successfully.');  
  }




   public function category(){
       // Get all categories from the database
       $categories = Category::all();
    return view('admin.category',['categories'=>$categories]);    // 'categories' this is a key you can write anything 
   }

   public function add_category(Request $request){
       // Validate the request data
       $request->validate([
         'category_name' => 'required|string|max:255',
     ]);

     // Create a new category instance and save it to the database
     $category = new Category();       //model name
     $category->category_name = $request->category_name;     //(typename)category_name == $request->category_name 
     $category->save();

     // Redirect back to the category page with a success message
     return redirect()->back()->with('success', 'Category added successfully!');
       
     }
     public function deleteCategory($id) {
      $category = Category::find($id);
      if ($category) {
          $category->delete();
          return redirect()->back()->with('success', 'Category deleted successfully!');
      }
      return redirect()->back()->with('error', 'Category not found!');
  }
   public function view_product(){
    $categories = Category::pluck('category_name', 'id'); // Fetch categories from the database
    return view('admin.add_product', ['categories' => $categories]); // Pass categories to the view
   }
   public function add_product(Request $request){
   // Validate the request data
   $request->validate([
    'title' => 'required|string|max:255',
    'description' => 'required|string',
    'price' => 'required|numeric|min:0',
    'discount_price' => 'nullable|numeric|min:0', // Add validation for discount_price
    'quantity' => 'required|numeric|min:0',
    'category' => 'required|string|max:255',
    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
], [
    'title.required' => 'Title is required.',
    'description.required' => 'Description is required.',
    'price.required' => 'Price is required.',
    'price.numeric' => 'Price must be a number.',
    'price.min' => 'Price must be at least :min.',
    'discount_price.numeric' => 'Discount Price must be a number.', // Custom message for discount_price
    'discount_price.min' => 'Discount Price must be at least :min.', // Custom message for discount_price
    'quantity.required' => 'Quantity is required.',
    'quantity.numeric' => 'Quantity must be a number.',
    'quantity.min' => 'Quantity must be at least :min.',
    'category.required' => 'Category is required.',
    'image.required' => 'Image is required.',
    'image.image' => 'Uploaded file must be an image.',
    'image.mimes' => 'Supported image formats are: jpeg, png, jpg, gif, svg.',
    'image.max' => 'Maximum file size allowed is :max kilobytes.',
]);


// Process the image upload
if ($request->hasFile('image')) {
    $imagePath = $request->file('image')->store('product_images', 'public');
} else {
    return redirect()->back()->with('error', 'Image upload failed!');
}

    // Create a new product instance and save it to the database
    $product = new Product();
    $product->title = $request->title;
    $product->description = $request->description;
    $product->image = $imagePath; // Save the filename of the uploaded image
    $product->category = $request->category;
    $product->quantity = $request->quantity;
    $product->price = $request->price;  
    $product->discount_price = $request->discount_price; // Save the discount price
    $product->save();

    // Redirect back to the product page with a success message
    return redirect()->back()->with('success', 'Product added successfully!');
   }
   public function show_products(){
    $products = Product::all();
    return view('admin.show_product', compact('products'));

   }

   public function edit_product($id){
     // Retrieve the product from the database
      $product = Product::find($id);
      $categories = Category::all(); // Fetch all categories from the database

     // Pass the product data to the edit view
     return view('admin.update_product' , compact('product', 'categories'));
   }

 public function delete_product($id){
  // Retrieve the product from the database
  $product = Product::find($id);

  // Delete the product
  $product->delete();

  // Redirect back to the product page with a success message
  return redirect()->back()->with('success', 'Product deleted successfully!');
 }
        
 public function confirm_update_product(Request $request,$id) {
  $product = Product::find($id);
  $product->title=$request->title;
  $product->description=$request->description;
  $product->category=$request->category;
  $product->quantity=$request->quantity;
  $product->price=$request->price;
  $product->discount_price = $request->discount_price; // Update the discount price

  // Check if a new image file is uploaded
  if ($request->hasFile('image')) {
    // Delete the existing image file if it exists
    if ($product->image) {
      Storage::disk('public')->delete($product->image); // Delete the file from storage       //Storage (must add the line in top)
    }
    // Store the new image file
    $imagePath = $request->file('image')->store('product_images','public');
    $product->image = $imagePath;
}

$product->save();
return redirect()->back()->with('success', 'Product updated successfully.');
 
}

public function orders() {
   $order=Order::all();
   return view('admin.orders', compact('order'));

}
public function order_items() {
    $order_items=Orderitem::all();
   
    return view('admin.order_items', compact('order_items'));
}

public function on_the_way($id)
{
    $order = Order::find($id);
    $order->delivery_status = 'On the way';
    $order->save();
    return redirect()->back();
}
public function delivered($orderId)
{
    $order = Order::findOrFail($orderId);
    $order->delivery_status = 'Delivered';
    $order->save();
     // Send the delivered email
     $this->sendDeliveredEmail($order);

    return redirect()->back();
}
protected function sendDeliveredEmail($order)
{
    // Send email to the customer
    Mail::to($order->email)->send(new DeliveredMail($order));
}


public function print_pdf($id) {

    $order=Order::find($id);
    $pdf = Pdf::loadView('admin.pdf', compact('order'));

    return $pdf->download('order_details.pdf');
      
     
}
 

}