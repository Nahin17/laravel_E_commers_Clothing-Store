<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
  
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
        
      <!-- end client section -->
      <div>
        <table class="table" style="border: 1px solid rgb(202, 22, 22)">
            <tr>
                <th>Product Title</th>
                <th>Quantity</th>
                <th>price</th>
                <th>payment</th>
                <th>Delivery Status </th>
                <th>Image </th>
                <th>Cancel Order</th>               
            </tr>
            <tr>
           @foreach($order as $order)
              
                <td>{{$order->product_title}}</td>   
                <td>{{$order->quantity}}</td>
                <td>{{$order->p_price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>

                    @if($order->delivery_status=='Processing')
                    <div class="btn btn-warning">{{$order->delivery_status}} </div>
                    @elseif($order->delivery_status=='delivered')
                    <div class="btn btn-success">{{$order->delivery_status}} </div>
                    @else
                    <div class="btn btn-danger">{{$order->delivery_status}} </div>
                    @endif
           
                </td>




                <td>
                    <img height="100" width= "180" src="product/{{$order->image}}" alt="">
                </td>

                <td>
                    @if($order->delivery_status=='Processing')
                    <a class="btn btn-danger" href="{{url('cancel_order',$order->id)}}" 
                        onclick="return confirm('Are You Sure?')">  Cancel Order</a>  
                    @else
                   
                        <div class="btn btn-success"> Not Allowed </div>                                                                            
                    @endif
                   
                    
                   
                </td>



            

            </tr>
            @endforeach


        </table>
      </div>

      </div>

      
      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href="">It's Jolly Roger</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">Md. Nahinul Abedin Nahin</a>
         
         </p>
      </div>
      <!-- jQery -->
      {{--   ai 4 ta line er kaj payment successful je mes dey oitay x clict korle delete kora --}}
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>