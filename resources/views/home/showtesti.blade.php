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
      
         <!-- slider section -->
       
      <!-- client section -->
     
      <section class="client_section layout_padding">
       
           <div class="heading_container heading_center">
              <h2>
                 Customer's Testimonial
              </h2>
           </div>
           @foreach($testimonial as $testimonial)
           <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                 <div class="carousel-item active">
                    <div class="box col-lg-10 mx-auto">
                       <div class="img_container">
                          <div class="img-box">
                             <div class="img_box-inner">
                                <img class="img_size" src="/product/{{$testimonial->image}}">
                             </div>
                          </div>
                       </div>
                       <div class="detail-box">
                          <h5>
                            {{$testimonial->name}}
                          </h5>
                          <h6>
                             Customer
                          </h6>
                          <p>
                            {{$testimonial->testimonial}}
                          </p>
                       </div>
                    </div>
                 </div>
             
              
              </div>
            
           </div>
        
        @endforeach
       
       
      
      
      
      </section>
      <!-- end client section -->

      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->
      
     


{{-- ai nicher code ta diye refresh dile o same jaygay thake --}}





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