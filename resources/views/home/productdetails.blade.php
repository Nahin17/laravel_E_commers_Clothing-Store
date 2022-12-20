<!DOCTYPE html>
<html>
   <head>


   
      <!-- Basic -->
      {{-- <base href="/public"> {{-- majhe majhe aita chara css pawa jay nah --}}

      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>It's Jollyroger</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" /> 
   
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- slider section -->
        
         <!-- end slider section -->
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 10px; margin-top:-40% ">
      
           <div class="img-box">
              <img width="450px" height="250px" src="/product/{{$product->image}}" alt="">
           </div>
           <div class="detail-box">
              <h5>
                 {{$product->title}}
              </h5>

              @if($product->discount_price!=null)

              <h6 style="color: red">
                 Discount price
                 <br>
                 ${{$product->discount_price}}
              </h6>

              <h6 style="text-decoration: line-through; color:skyblue ">
                Regular price
                 ${{$product->price}}
              </h6>
              @else 
              <h6 style="color: rgb(98, 171, 255)">
                 Regular price
                  ${{$product->price}}   
              </h6> 

              @endif
              <h6>Product Catagory : {{$product->catagory}} </h6>
              <h6>Product Details : {{$product->description }}</h6>
              <h6>Available Quantity : {{$product->quantity }}</h6>

              {{--Form aita purata product.blade.php theke copy kore niye eshe boshay disi  ai
               
               ai code ta hocche product details er vitor theke add to cart korar jonno
               --}}
              <form action="{{url('add_cart',$product->id)}} " method="post">
               @csrf
               <input type="number" class="option1" name="quantity" value="1" min="1">
      
               <input type="submit" class="option2" value="Add to cart">
      
            </form>
      
          
             
           </div>
        </div>
     </div>
     
      <!-- why section -->
     

      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->
      
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>