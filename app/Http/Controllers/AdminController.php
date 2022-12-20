<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Catagory;
use Illuminate\Support\Facades\Auth;

Use App\Models\Product;
Use App\Models\Order;
Use App\Models\Testimonial;

Use PDF;

Use Notification;
Use App\Notifications\SendEmailnotification;

class AdminController extends Controller
{
    public function viewCatagory(){

        //aigula pore add hoise jokhon data ene dekhaysi
        $data=catagory::all(); //getting all the data from catagory using USE\app\model than store this data on data variable
        
      //  return view('admin.catagory');  just ai 1 ta line chilo
        return view('admin.catagory', compact('data'));  // now data variable to view
    }
    public function addCatagory(Request $request){
        //for posting data Request $request likha lage
        $data= new Catagory;
        $data->catagory_name=$request->catagory; //catagory aita ashche catagory.blade.php er name=catagory & catagory_name table er col er name
        $data->save();
        return redirect()->back()->with('message', 'Catagory Added Sussfully'); //jate button press korar por o same page e back kore
    }

    public function deleteCatagory($id){
        // make sure catagory model at the top
        $data=catagory::find($id);  
        $data->delete();
        return redirect()->back()->with('message', 'Catagory deleted'); //back deyar mean same page ai ashbe 
        //ekhane delete korle successfull message dekhay but kono code likha lagtese nah cz
           // variable ta message e rakhsi message bad diye onno kichu name dile likha lagto 


    }

    public function viewProduct(){
      //  return view('admin.product');
        //ai catagory aita add product er time e add korsi
        $catagory= catagory::all();
        return view('admin.product',compact('catagory'));  //compact likhi view koraite
        //aitar por for each likhsi product catagory te product.blade.php te
    }


    // ----product model start-------

    public function addProduct(Request $request){  //form thakle kori
              // make sure product model at the top
              $product= new product;
              $product->title=$request->title;
              $product->description=$request->description;
              $product->price=$request->p_price;
              $product->quantity=$request->quantity;
              $product->discount_price=$request->dis_price;
              $product->catagory=$request->catagory;
              //for uploading image its diffrent 
              $image= $request->image;
              $imagename=time().'.'.$image->getClientOriginalExtension();
              $request->image->move('product',$imagename); 
               //public folder er moddhe product name er ekta folder khulte hobe pic save korar jonno
              $product->image=$imagename;


              $product->save();

              return redirect()->back()->with('message', 'Product added successfully');

    }


    public function showProduct(){
        // make sure product model at the top
        $product=product::all();

        return view('admin.show_product',compact('product')); 
        //ai product ta hocche ager lin er 1st $product ta
        //and compact likhi view koraite

    }

    //product. blade add product er okhane message call korsi oita diye e ekhan theke mess
    // call korsi showproduct e alada kore session likha lage nah but tao show.blade e session diye likhe disi



    public function deleteProduct($id){

        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');

    }

    public function editProduct($id){
     // make sure product model at the top product and catagory also
        $product=product::find($id);
        $catagory=catagory::all();

     //   return view('admin.editproduct',compact('product'));

     return view('admin.editproduct',compact('product','catagory')); //ai 2 jaygay catagori ana lagse only dropdown theke shob data jate select kora jay ai jonno
}
  public function editProductconfirm(Request $request,$id)
  {
      // make sure product model at the top: product

      $product= product::find($id);
      $product->title=$request->title;   
      $product->description=$request->description; 
      $product->price=$request->p_price; 
      $product->discount_price=$request->dis_price;             //ai req diye name = je likhe okhan theke data niye ashe
      $product->catagory=$request->catagory; 
      $product->quantity=$request->quantity; 

      $image=$request->image; 
      if($image)
      {
        $imagename=time().'.'.$image->getClientOriginalExtension();
      $request->image->move('product',$imagename);
      $product->image=$imagename; 
      }
      
      $product->save();
      return redirect()->back()->with('message', 'Product edited successfully');



  }

  public function order(){
      // make sure this model is on the top Use App\Models\Order;
      // make sure to add auth
      $usertype =Auth::user()->usertype;
      if($usertype =='1')
      {

      //just ai nicher line ta diye shob latest order 1st e dekha jabe
        $order= order::orderby('id','desc')->get();
    //$order= order::all();
    //2nd order ta hocche database er table er name and last order tai compact e hope so
    return view('admin.order',compact('order'));
  }

     else{
       
      $product=Product::paginate(3);
      return view('home.userpage',compact('product'));
     }
    }


  public function delivered($id){

    $order= order::find($id);

    $order->delivery_status="delivered";
    //$order->payment_status="paid"; 
    // aita chai nah cz taile kon ta cash on delivery r kon ta card payment bujha jabe nah data dekhe 
    //so cash on delivery green hole bujhbo payment dont

    $order->save();

    return redirect()->back();



} 
public function print_pdf($id)
{
     //     make sure to write Use PDF;

     $order= order::find($id);
     $pdf=PDF::loadview('admin.pdf',compact('order'));
     return $pdf->download('order_details.pdf');


}

public function sendEmail($id)
{
     //     make sure to write Use PDF;

     $order= order::find($id);
     //$pdf=PDF::loadview('admin.pdf',compact('order'));
    // return $pdf->download('order_details.pdf');
    return view('admin.sendemail',compact('order'));


}

public function send_email_notifi(Request $request, $id){

 // make sure to add Use Notification;
 //   Use App\Notifications\SendEmailnotification;

      $order= order::find($id);

         $details = [

             'greeting'=> $request->greetings,
             'firstline'=> $request->firstline,
             'body'=> $request->body,
             'button'=> $request->button,

             'url'=>$request->url,
             'lastline'=>$request->lastline,
              ];

              Notification::send($order,new sendEmailnotification($details));

              return redirect()->back();

}


public function searchData(Request $request)
{

  $searchText=$request->search;    
  // ai last er search ta NAME = SEARCH JE OI SEARCH 
  // ai name er jaygay  order table er jei column er name dei oi column diye search
  //$order=order::where('name', 'LIKE', "%$searchText%")->get(); 
  $order=order::where('name', 'LIKE', "%$searchText%")->orWhere('product_title', 'LIKE', "%$searchText%")->orWhere('email', 'LIKE', "%$searchText%")->orWhere('phone', 'LIKE', "%$searchText%")->get(); 
     // this name comes from the order database
     return view('admin.order',compact('order'));
     //compact er vitorer order ta hocche 1st $order



}

public function testimonial()
{

  return view('admin.testimonial');




}

}