<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
         .title_deg{
            text-align: center;
            font-size: 25px;
            font-weight: bold;

         }

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include ('admin.sidebar')
      <!-- partial -->
        <!-- partial:partials/_navbar.html -->
       @include ('admin.header')
        <!-- partial -->
        <!-- partial:partials_body -->

        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x </button>
            {{session()-> get('message')}}
        </div>
  
  
        @endif
        <div class="main-panel">
            <div class="content-wrapper">
                <H1 class="title_deg">All Orders</H1>


        {{-- ---------------------------for search---------------------------------      --}}

                <div style="padding-left: 400px; padding bottom:30px">   
                  <form action="{{url('search')}}" method="get"  >
                    @csrf
                    <input type="text" style="color: black"  name="search" placeholder="Search">

                    <input type="submit" value="Search"" class="btn btn-outline-success">




                  </form>


                </div>
 {{-- ---------------------------end search---------------------------------      --}}
             
            <div class="row ">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Order Status</h4>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr >
                              <th>
                            {{--    <div class="form-check form-check-muted m-0">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                  </label>
                                </div>  
                                --}}  
                              </th>
                              <th> Name </th>
                              <th> User ID </th>
                              <th> Email </th>
                              <th> Address </th>
                              <th> Phone </th>
                              
                              <th> Product Title </th>
                              <th> Quantity </th>
                              <th> Price </th>
                              <th > Payment Status </th>
                              <th> Delivery Status </th>
                              <th>Image </th>
                              <th>Delivered </th>
                              <th>PDF </th>
                              <th>Send Email </th>
                              
                            </tr>
                          </thead>
                          @forelse($order as $order)
                          <tr>
                             <td>
                                 <div class="form-check form-check-muted m-0">
                                   <label class="form-check-label">
                                     <input type="checkbox" class="form-check-input">
                                   </label>
                                 </div>
                               </td>
                             <td>{{$order->name}}</td>
                 
                             <td>{{$order->user_id}}</td>
                             <td>{{$order->email}}</td>
                             <td>{{$order->address}}</td>
                             <td>{{$order->phone}}</td>
                             <td>{{$order->product_title}}</td>
                             <td>{{$order->quantity}}</td>
                             <td>{{$order->p_price}}</td>
                             <td>                             
                                @if($order->payment_status =='CashOnDelivery' && $order->delivery_status !='Processing')
                                <div class="badge badge-outline-success"> {{$order->payment_status}}</div>
                                @elseif($order->payment_status=='paid')
                                <div class="badge badge-outline-success"> {{$order->payment_status}}</div>
                                @else
                                <div class="badge badge-outline-warning"> {{$order->payment_status}}</div>
                                @endif                
                            </td>

                             <td> 
                                @if($order->delivery_status=='Processing')
                                 <div class="badge badge-outline-warning">{{$order->delivery_status}} </div>
                                 @else
                                 <div class="badge badge-outline-success">{{$order->delivery_status}} </div>
                                 @endif
                             </td>        

                             <td>
                                <div class="img_size"> <img class="" src="/product/{{$order->image}}" alt=""> </div>
                             </td>
                
                             <td>
                                @if($order->delivery_status=='Processing')
                                <a class="badge badge-outline-danger" href="{{url('delivered',$order->id)}}" 
                                    onclick="return confirm('Are You Sure This Product Is Delivered?')">  Deliver</a>  
                                @else
                               
                                    <div class="badge badge-outline-success"> Done </div>                                                                            
                                @endif
                             </td>

                             <td>
                            <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>                      
                             </td>

                             {{-- email er vitor order id diye e uporer order theke id er --}}

                             <td>
                              <a href="{{url('send_email',$order->id)}}" class="btn btn-outline-info">Send Email</a>                            
                              </td>
                         
                 
                               
                         
                            
                          </tr>

                          @empty
                          <tr colspan="16">
                            <td style="font-size: 25px; color:rgb(61, 183, 231); text-align:center; "> No Data Found</td>

                          </tr>


                 
                       @endforelse
                 
                 
                 
                 
                    </table>


            </div>
        </div>
      
    <!-- plugins:js -->
   @include ('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>