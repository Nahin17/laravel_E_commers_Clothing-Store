<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2> 
               
        {{--      <form class="form-inline">
                  <button class="btn  my-2 my-sm-0 nav_search-btn" id="search" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
               </form>
               

           <form action="">
                  <input class="btn  my-2 my-sm-0 nav_search-btn" type="text" name="search" placeholder="Search for something">
                  <input type="submit" value="Search">
--}}  
            <div> 
               <form action="{{url('product_search')}}" method="GET">
                  @csrf
       <input class="btn  my-2 my-sm-0 nav_search-btn" type="text" name="search" placeholder="Search for something">
                 {{--  <input type="submit" value="Search">  --}}
                  <button type="submit" value="Search">
                     <i class="fa fa-search" aria-hidden="true"></i>
                     </button>
               </form>
            </div>
            </div>

            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x </button>
                {{session()-> get('message')}}
            </div>


            @endif
            
            <div class="row">
               @foreach($product as $products)
           
               
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('product_details',$products->id)}}" class="option1">
                     Product's Details
                     </a>


      <form action="{{url('add_cart',$products->id)}} " method="post">
         @csrf
         <input type="number" class="option1" name="quantity" value="1" min="1">

         <input type="submit" class="option2" value="Add to cart">

      </form>





                   

                  </div>
               </div>
               <div class="img-box">
                  <img src="product/{{$products->image}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{$products->title}}
                  </h5>

                  @if($products->discount_price!=null)

                  <h6 style="color: red">
                     Discount price
                     <br>
                     ${{$products->discount_price}}
                  </h6>

                  <h6 style="text-decoration: line-through; color:skyblue ">
                    Regular price
                     ${{$products->price}}
                  </h6>
                  @else 
                  <h6 style="color: rgb(98, 171, 255)">
                     Regular price
                      ${{$products->price}}   
                  </h6> 

                  @endif
                 
               </div>
            </div>
         </div>
          

        @endforeach
        <span style="padding-top: 20px "></span>
        {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
         </div>
      </section>