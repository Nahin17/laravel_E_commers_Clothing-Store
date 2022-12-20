<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;


use Session;
use Stripe;

use App\Models\Comment;
use App\Models\Reply;
use App\Models\Testimonial;

class HomeController extends Controller
{

    public function index(){

        //this view portion is when the user is not log in
 

        $product=Product::paginate(6);
       // $comment=comment::all();   // ai line nah likhle comment gular jonno logout korle comment error dekhaito tai home theke niye ashci
       $comment=comment::orderby('id','desc')->get(); 
        $reply=reply::all(); 
        $testimonial=testimonial::all();
      
     return view('home.userpage',compact('product','comment','reply','testimonial'));
   
    }
    

    public function home()
    {
           
        $usertype =Auth::user()->usertype;
        if($usertype =='1')
        {
                // return view('admin.home');
            //ai total er line search korar por dashboard thik kort ashchi tokhon
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();
            $order=order::all();
             $total_revenue=0;

            foreach($order as $order)
            {
                $total_revenue= $total_revenue + $order->p_price;
            }
            $total_delivered=order::where('delivery_status','=','delivered')->get()->count();
            $total_order_processing=order::where('delivery_status','=','processing')->get()->count();

            


            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_order_processing'));
                   
        }
        else{
           // return view('home.userpage');
            // return view('dashboard');

            
        $product=Product::paginate(6);
        //
      //  $comment=comment::all(); 
      //all dile e hoy amra just vaber thelay new comment jeita ashbe oita 1st e dekhabo tai nicher line ta likhsi same shit

         $comment=comment::orderby('id','desc')->get(); 
        //kono data pathaite hoile compact er vitor likha lage compact diye comment er data userpage e pathaysi
        $reply=reply::all(); 
        $testimonial=testimonial::all();
      
        return view('home.userpage',compact('product','comment','reply','testimonial'));


        // undefined $products dekhay er jonno login hocchilo nah cz product name 2 jaygay ase 
        //so index er code tai copy kore ekhane boshay dile thik hoye jay.

        }       
        }

        public function productDetails($id)
        {

            //make sure product model on the top
            $product=product::find($id);
            return view('home.productdetails',compact('product'));
        }


        public function addCart(Request $request,$id){ 
            //request likhi jokhon e form use kore kono value pass kori
         //   use Illuminate\Support\Facades\Auth; make sure you write this

            if(Auth::id())
            {
                  //make sure cart model on the top  use App\Models\Cart;
                  //user part
               
                $user= Auth::user();
                $useid=$user->id;
               $product=product::find($id);
               //ai code ta likhtesi quantity er jonno 
               $product_exist_id=cart::where('Product_id','=',$id)->where('user_id','=',$useid)->get('id')->first();
               if($product_exist_id)
             {
                $cart=cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity = $quantity + $request->quantity;

                //if er part theke else porjnto purata quantity barar sathe sathe je price o bare ai part
                //and else theke copy kore niye ashchi 
                // $cart->p_price=$product->discount_price * $request->quantity; aita chilo but request quantity diye okhane kaj kortese
                // so ekhane new name deya lagbe so cart quantity and ekhane theke nisi   $cart->quantity = $quantity + $request->quantity;
               if($product->discount_price!=null)
               {
                 $cart->p_price=$product->discount_price *  $cart->quantity;
 
               }
               else
               {
                 $cart->p_price=$product->price *  $cart->quantity;
              }

                $cart->save();
                return redirect()->back()->with('message','Product added Succeddfully');


             }
             else
             {

                $cart=new cart;
                $cart->name=$user->name;
                $cart->userid=$user->userid;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;
 
                //product part
                $cart->product_title=$product->title;
              //
               if($product->discount_price!=null)
               {
                 $cart->p_price=$product->discount_price * $request->quantity;
 
               }
               else
               {
                 $cart->p_price=$product->price * $request->quantity;
              }
                $cart->image=$product->image;
                $cart->Product_id=$product->id;
                $cart->quantity=$request->quantity;
 
                $cart->save();
 
                return redirect()->back()->with('message','Product added Succeddfully');

                

             }


        /*     $cart=new cart;
             $cart->name=$user->name;
             $cart->userid=$user->userid;
             $cart->email=$user->email;
             $cart->phone=$user->phone;
             $cart->address=$user->address;
             $cart->user_id=$user->id;

             //product part
             $cart->product_title=$product->title;

            if($product->discount_price!=null)
            {
              $cart->p_price=$product->discount_price * $request->quantity;

            }
            else
            {
              $cart->p_price=$product->price * $request->quantity;
           }
             $cart->image=$product->image;
             $cart->Product_id=$product->id;
             $cart->quantity=$request->quantity;

             $cart->save();

             return redirect()->back();
        */
           
               


            }
            else{
                // we dont create login route it was created by laravel 
                return redirect('login');

            }

        }


        public function showCart(){
            //ai je return view kortesi cart e ja ja ase shob dekhay but cart to emon nah different different customer er
            // diffrent diffrent item order kore so je jei id te login korbe tar cart tai dekhabe.
    //  if you use auth make sure this line is on the top      use Illuminate\Support\Facades\Auth;
    // I use cart model so i have to add use App\Models\Cart;
     //return view('home.showcart');
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get(); //2nd cart ta amader database er table er name
  
      
      //  $cart=cart::find($userid);
              return view('home.showcart',compact('cart'));

            
        }
        else{
            return redirect('login');

        }


    //       $id=Auth::user()->id;
    //       $cart=cart::where('user_id','=',$id)->get(); //2nd cart ta amader database er table er name

    
    // //  $cart=cart::find($userid);
    //         return view('home.showcart',compact('cart'));
        }

        public function removeCart($id){
            $cart=cart::find($id);
            $cart->delete();

            return redirect()->back();

        }

        public function cashOrder(){
             //make sure cart model on the top  use App\Models\Order;
               // amader cart table to differnt different userid ola manush thakbe but order to sobai korbe nah r korle e 
               //oder er time e kokhon kon userid login ase aita o to bujha lagbe
           $user=Auth::user();

           $useid=$user->id;

          $data =cart::where('user_id','=',$useid)->get();
       //   1st e id je ase oitake useid te nisi oi use id ta user_id er sathe compare korsi than oita ke $data variable e save korsi
          foreach($data as $data)
          {
            $order= new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->p_price=$data->p_price;
            $order->quantity=$data->quantity; 
            $order->image=$data->image; 
             $order->product_id=$data->Product_id;  
             // 1st product id ta order table and 2nd ta cart table er cart table er shob data useid diye $data name er variable e save hoise
              
             $order->payment_status='CashOnDelivery';
             $order->delivery_status='Processing';

             $order->save();


             $cart_id=$data->id;
             $cart=cart::find($cart_id);
             $cart->delete();



          }
          return redirect()->back()->with('message','We have received your order. We will connect with you soon.'); 

        }



           public function stripe($totalprice){  
            // web.php theke catch korar jonno ai 1st $totalprice likhsi and niche compact er sather total price ta likhsi cz ai je 1st er total price ta je paisi aita to view te pathaite hobe


            return view('home.stripe', compact('totalprice'));
           }

   

    
       public function stripePost(Request $request, $totalprice)
    {
        // make sure this 2 line added    use Session;
       //    use Stripe;


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "bdt",
                "source" => $request->stripeToken,
                "description" => "Thanks for the payment." 
        ]);
        //ai part ta pore add korsi jokhon pay korar por o cart e show kortesilo jate nah show kore ai jonno e use korsi
        $user=Auth::user();

        $useid=$user->id;

       $data =cart::where('user_id','=',$useid)->get();
    //   1st e id je ase oitake useid te nisi oi use id ta user_id er sathe compare korsi than oita ke $data variable e save korsi
       foreach($data as $data)
       {
         $order= new order;
         $order->name=$data->name;
         $order->email=$data->email;
         $order->phone=$data->phone;
         $order->address=$data->address;
         $order->user_id=$data->user_id;
         $order->product_title=$data->product_title;
         $order->p_price=$data->p_price;
         $order->quantity=$data->quantity; 
         $order->image=$data->image; 
          $order->product_id=$data->Product_id;  
          // 1st product id ta order table and 2nd ta cart table er cart table er shob data useid diye $data name er variable e save hoise
           
          $order->payment_status='paid';
          $order->delivery_status='Processing';

          $order->save();


          $cart_id=$data->id;
          $cart=cart::find($cart_id);
          $cart->delete();



       }



      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }


    public function showOrder(){  


    if(Auth::id()){
        // make sure add this use Illuminate\Support\Facades\Auth;
        $user=Auth::user();   // aitar kaj hocche login obosthay kon user login ase oita id diye khuje ber kora
        $useid= $user->id;

       

        $order=order::where('user_id','=',$useid)->get();
        $order=order::orderby('id','desc')->get(); 

        return view('home.order',compact('order'));
    }
    else{
        return redirect('login');
    }



        }

         public function cancelOrder($id)
         {  
         $order=order::find($id);
         $order->delivery_status='You cancled the order';
         $order->save();
         return redirect()->back();
         }

         public function addComment(Request $request)
         { 
         // use App\Models\Comment;
         if(Auth::id())
         {
         $comment = new comment;  //new comment our table name $comment variable
         $comment->name=Auth::user()->name;
         $comment->user_id=Auth::user()->id;
         $comment->comment=$request->comment;
         $comment->save();
         return redirect()->back();
         }
         else
         {
         return redirect('login');
         }
        }



         public function addReply(Request $request)
         { 
         // use App\Models\Reply;
         if(Auth::id())
         {
         $reply = new reply;  //new comment our table name $comment variable
         $reply->name=Auth::user()->name;
         $reply->user_id=Auth::user()->id;
         $reply->comment_id=$request->commentId;  //form er vitor name= commentId
         $reply->reply=$request->reply; 
         $reply->save();
         return redirect()->back();
       
         }
         else
         {
         return redirect('login');
         }

         }

         public function productSearch(Request $request){ 
         //    make sure  to add use App\Models\Product;
         // $product=Product::paginate(6); 
         // ai uporer paginate ekhane diye niche get() dile hobe nah cz ekhane same page theke onek kichu hocchew
         $comment=comment::orderby('id','desc')->get(); 
         $reply=reply::all();
         $search_text=$request->search;
         //foreach er vitor 1st e jeita likhsi oitai hobe niche  $product                               
         //foreach er 1st dataname=table name::
         // $product=product::where('title','LIKE',"%$search_text%")->paginate(6);   
         $product=product::where('title','LIKE',"%$search_text%")->orWhere('catagory','LIKE',"%$search_text%")->paginate(6);         
         return view('home.userpage',compact('product','comment','reply'));

         }


         public function allProduct( Request $request)
         {          
         $product=Product::paginate(6);
         // $comment=comment::all(); 
         $comment=comment::orderby('id','desc')->get(); 
         $reply=reply::all();                       
         return view('home.allproduct',compact('product','comment','reply'));
         // return view('home.allproduct');
         //aita e header er product
         // ai tuk code likha lage cz ekhane product er jinis database theke ashtese search er o so 2 or beshi jodi ashe likha lage  
         //-----------------------------------something big --------
         //uporer code tay problem holo all products er page theke search dile o amake main userpage e niye jay cause
         //cz route ta userpage er jonno e banano hoise
         // so product.blade.php er shob onno ekta page e niye oitar jonno new ekta search route and controller create korle kaj hoye jabe

        }
 



        public function searchAllproduct(Request $request)
        { 
        //    make sure  to add use App\Models\Product;
        // $product=Product::paginate(6); 
        // ai uporer paginate ekhane diye niche get() dile hobe nah cz ekhane same page theke onek kichu hocchew
        $comment=comment::orderby('id','desc')->get(); 
        $reply=reply::all();
        $search_text=$request->search;
        //foreach er vitor 1st e jeita likhsi oitai hobe niche  $product                                  
        //foreach er 1st dataname=table name::
        // $product=product::where('title','LIKE',"%$search_text%")->paginate(6);   
        $product=product::where('title','LIKE',"%$search_text%")->orWhere('catagory','LIKE',"%$search_text%")->paginate(6);         
        return view('home.allproduct',compact('product','comment','reply'));
         }



         public function add_testimonial(){ 
          
          return view('home.addtestimonial');
          
          }


          public function adding_testimonial(Request $request)
          { 
            //using req we get all the data from this form

       
            
         if(Auth::id())
         {
            

            $testimonial = new testimonial;

            $testimonial->name= $request->name;
            $image= $request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename); 
            //public folder er moddhe product name er ekta folder khulte hobe pic save korar jonno
           $testimonial->image=$imagename;
           $testimonial->image=$imagename;

           

            $testimonial->testimonial = $request->testimonial;
            $testimonial->save();
          
            
            return redirect()->back();      
            
          }
          else
          {
          return redirect('login');
          }
        }





            public function show_testimonial()
            { 

              
              $testimonial=testimonial::all();
              return view('home.showtesti',compact('testimonial'));

            }
           


            







    }

//request likhi jokhon e form use kore kono value pass kori
       //   use Illuminate\Support\Facades\Auth; make sure you write this

        //  if(Auth::id())
       //   {
                //make sure cart model on the top  use App\Models\Cart;
                //user part
             
           //   $user= Auth::user();
            //  $useid=$user->id;
          //        $product=product::find($id);