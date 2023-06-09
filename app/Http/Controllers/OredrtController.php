<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PharIo\Manifest\Url;
use Stripe;
use Illuminate\Support\Facades\Mail;
use App\Mail\InoviceOrderMailble;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
class OredrtController extends Controller
{


   public function Registerview(){
        
      if (Auth::check()){
      $getCartItems=Cart::getCartItems();
      $user = User::find(Auth::user()->id);
       return View('auth.register',compact('getCartItems','user'));
      }
      else
      {
          return redirect('login');
      }
    }
    
    // Show filing use details form
    public function signin(){
        
      return View('Home.sigin');
    }

   public function orderdelete($id)
   {
    $data=Order::find($id);

    $data->delete();
    toast('Delete Sucessfully!!','warning');
   return redirect()->back();

   }

    




    public function stripePost(Request $request)
{
  // \Stripe\Stripe::setApiKey('sk_test_51NB6blF26Y4qwjWzC1VbHQQXgniAUEoIRMRho1evJ09IFrg1h3DmlxXEXKad514hAG0CsPCn7hNeeDazlm7uMSlU00r8eBf7oD');

    
  //   try {
  //       $customer = \Stripe\Customer::create([
  //           'source' => $request->input('stripeToken'), // Use the 'stripeToken' from the request
  //           // Add any additional customer information if needed
  //       ]);

  //       // Retrieve the customer's default payment source
  //       $defaultSource = \Stripe\Customer::retrieve($customer->id)->default_source;

  //       // Create a charge using the customer and the default payment source
  //       \Stripe\Charge::create([
  //           'amount' => 100 * 100,
  //           'currency' => 'usd',
  //           'customer' => $customer->id,
  //           'source' => $defaultSource,
  //           // 'description' => 'Test payment from LaravelTus.com.',
  //       ]);

  //       // Charge created successfully, process any additional logic here

  //       return response()->json(['success' => true]);
  //   } catch (\Stripe\Exception\ApiErrorException $e) {
  //       // Handle any Stripe API errors
  //       return response()->json(['error' => $e->getMessage()], 400);
  //   }






    if (Auth::check()) {
      // Retrieve the cart items for the user
      $cartItems = Cart::where('userId', Auth::user()->id)->get();
      $productIds = $cartItems->pluck('ProductId');
  
      // Retrieve the product details for the product IDs
      $products = Product::whereIn('id', $productIds)->get();
  
    // Save used  detales to the order table
      $order = new Order();
      $order->user_Id = Auth::user()->id;
      $order->name = Auth::user()->name;
      $order->phone = Auth::user()->phone;
      $order->email = Auth::user()->email;
      $order->City = Auth::user()->City;
      $order->Locatontype = Auth::user()->Ltype;
      $order->address =Auth::user()->address;
      $order->pmode = "Card_Payment";
      $order->status = "pending";
      $order->save();
  // Save cart  items to the order table
      foreach ($cartItems as $cartItem) {
          $product = $products->firstWhere('id', $cartItem->ProductId);
          if ($product) {
              $orderItem = new OrderItem();
              $orderItem->orderId = $order->id;
              $orderItem->quntity = $cartItem->quntity;
              $orderItem->ProductId = $cartItem->ProductId;
              $orderItem->name = $product->Name;
              $orderItem->img = $product->image;
              $orderItem->price = $product->Price;
              $orderItem->save();
  
              // Quantity handling
              $productQ = Product::find($cartItem->ProductId);
              $quantity = $productQ->quntity;
              if ($quantity > 0) {
                  $newQuantity = $quantity - $cartItem->quntity;
                  $productQ->quantity = $newQuantity;
                  $productQ->save();
              }
            
      
  
      // Remove all cart items after saving them to the order table
      $cartItems->each->delete();
  }
  
  
  $data = [
      'invoice_no' => Auth::user()->id,
      'name' => Auth::user()->name,
      'email' => Auth::user()->email,
  ];


  Mail::to($order->email)->send(new InoviceOrderMailble($data));
  toast('your order has been placed successfully','success');

  return redirect()->route('order.conformView');
 
    
    }}


  }
//    show oder  custromer
public function View(){
  if (Auth::check()) {
    $order= Order::where('user_Id',Auth::user()->id)->orderBy('created_at','desc')->paginate(5);
  
    return View('Home.oder',compact('order'));

} else {
    return redirect('login');
}

}


// ...show oder details user
public function orderDetails($id)
{
  $orderid=$id;
  $orderItem= OrderItem::where('orderId',$orderid)->orderBy('created_at','desc')->get();
  $order= Order::where('id', $orderid)->orderBy('created_at','desc')->get();
  
  return View('Home.orderDetails',compact('order','orderItem','orderid'));
  
  }


  public function usedetailsSave(Request $request){
    
  // Save use detals in oder table
    $order = User::find(Auth::user()->id);
    $order->City = $request->City;
    $order->phone = $request->phone;
    $order->Locatontype = $request->Ltype;
    $order->address = $request->address;
    $order->pmode = $request->payment;
    $order->status = "pending";
    $order->save();
    if($order->pmode=='Card_Payment'){
       
      return View('Home.strip');
       
    }
    else{
      if (Auth::check()) {
        // Retrieve the cart items for the user
        $cartItems = Cart::where('userId', Auth::user()->id)->get();
        $productIds = $cartItems->pluck('ProductId');
    
        // Retrieve the product details for the product IDs
        $products = Product::whereIn('id', $productIds)->get();
    
        // Save cart items to the order table
        $order = new Order();
        $order->user_Id = Auth::user()->id;
        $order->name = Auth::user()->name;
        $order->phone = Auth::user()->phone;
        $order->email = Auth::user()->email;
        $order->City = Auth::user()->City;
        $order->Locatontype = Auth::user()->Ltype;
        $order->address = Auth::user()->address;
        $order->pmode = $request->payment;
        $order->status = "pending";
        $order->save();
    
        foreach ($cartItems as $cartItem) {
            $product = $products->firstWhere('id', $cartItem->ProductId);
            if ($product) {
                $orderItem = new OrderItem();
                $orderItem->orderId = $order->id;
                $orderItem->quntity = $cartItem->quntity;
                $orderItem->ProductId = $cartItem->ProductId;
                $orderItem->name = $product->Name;
                $orderItem->img = $product->image;
                $orderItem->price = $product->Price;
                $orderItem->save();
    
                // Quantity handling
                $productQ = Product::find($cartItem->ProductId);
                $quantity = $productQ->quantity;
                if ($quantity > 0) {
                    $newQuantity = $quantity - $cartItem->quntity;
                    $productQ->quantity = $newQuantity;
                    $productQ->save();
                }
            }
        }
    
        // Remove all cart items after saving them to the order table
        $cartItems->each->delete();
    }
    
    // .............................send Email................................
    $data = [
        'invoice_no' => Auth::user()->id,
        'name' => Auth::user()->name,
        'email' => Auth::user()->email,
    ];


    Mail::to($order->email)->send(new InoviceOrderMailble($data));
    toast('your order has been placed successfully','success');

    return redirect()->route('order.conformView');
   
      
      }}



//print pdf use
  public function printPDF($id){

  $orderid=$id;
  $orderItem= OrderItem::where('orderId',$orderid)->orderBy('created_at','desc')->get();
  $order= Order::where('id', $orderid)->orderBy('created_at','desc')->get();
  
  $pdf = PDF::class::loadView('Home.invoice', compact('order','orderItem',));
  toast('PDF download Successfuly','success');
  return $pdf->download('Bill.pdf');
  }






// show order in admin panel
public function adminOderView($id){
  $orderid=$id;
  $orderItem= OrderItem::where('orderId',$orderid)->orderBy('created_at','desc')->get();
  $order= Order::where('id', $orderid)->orderBy('created_at','desc')->get();

  return view('admin.orderView',compact('order','orderItem','orderid'));
}


// ....select delever boy.......
public function SelectDelivery(Request $request,$id){

  $order=Order::find($id);
  $order->delveryId=$request->delivery_id;

  $order->Save();
  return redirect()->back();
}



public function viewDeliveryOrder($id){

  $orderid=$id;
  $orderItem= OrderItem::where('orderId',$orderid)->orderBy('created_at','desc')->get();
  $order= Order::where('id', $orderid)->orderBy('created_at','desc')->get();

  return view('deliver.orderItems',compact('order','orderItem','orderid'));
}


public function tracking($id){
  $order= Order::find($id);
  return view('Home.tracking',compact('order'));
}


public function prosesing($id){
  $Order=Order::find($id);
  $Order->status='Prosesing';
  $Order->save();
  toast('change status Sucessfully!!','success');
  return redirect()->back();
}
public function packing($id){
  $Order=Order::find($id);
  $Order->status='packed';
  toast('change status Sucessfully!!','success');
  $Order->save();
  return redirect()->back();
}
public function Delivering($id){
  $Order=Order::find($id);
  $Order->status='Delivering';
  $Order->save();
  toast('change status Sucessfully!!','success');
  return redirect()->back();
}
public function Delivered($id){
  $Order=Order::find($id);
  toast('change status Sucessfully!!','success');
  $Order->status='Delivered';
  $Order->save();
  return redirect()->back();
}
public function cancel($id){
  $Order=Order::find($id);
  $Order->status='cancel';
  $Order->save();
  toast('change status Sucessfully!!','success');
  return redirect()->back();
}

public function conformView (){
  
  return view('Home.odercnform');
  
} 
}

