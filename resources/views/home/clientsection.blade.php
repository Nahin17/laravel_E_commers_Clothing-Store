<section class="client_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Customer's Testimonial
         </h2>
      </div>
      <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="box col-lg-10 mx-auto">
                  <div class="img_container">
                     <div class="img-box">
                        <div class="img_box-inner">
                           <img src="images/tasnia.jpg" alt="">
                        </div>
                     </div>
                  </div>
                  <div class="detail-box">
                     <h5>
                        Tasnia
                     </h5>
                     <h6>
                        Customer
                     </h6>
                     <p>
                        Finally, I discovered trustworthy products and a user-friendly website. Amazing product quality and good delivery service are both present.
                     </p>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="box col-lg-10 mx-auto">
                  <div class="img_container">
                     <div class="img-box">
                        <div class="img_box-inner">
                           <img src="images/sadia.jpg" alt="">
                        </div>
                     </div>
                  </div>
                  <div class="detail-box">
                     <h5>
                        Sadia Zaman
                     </h5>
                     <h6>
                        Customer
                     </h6>
                     <p>
                        Finally, I discovered trustworthy products and a user-friendly website. Amazing product quality and good delivery service are both present.
                     </p>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="box col-lg-10 mx-auto">
                  <div class="img_container">
                     <div class="img-box">
                        <div class="img_box-inner">
                           <img src="images/Nissa.jpg" alt="">
                        </div>
                     </div>
                  </div>
                  <div class="detail-box">
                     <h5>
                        Zinnatun Nissa
                     </h5>
                     <h6>
                        Customer
                     </h6>
                     <p>
                        The nicest aspect of this brand that I appreciate is its product quality. Finally, some quality work on a website that is very user-friendly
                     </p>
                  </div>
 
               </div>
            </div>
         </div>
         <div class="carousel_btn_box">
            <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </div>
   </div>
  
   <div style="padding-left: 80%"> 
      <form action="{{url('add_testimonial')}}" method="GET">
         @csrf
      
        {{--  <input type="submit" value="Search">  --}}
         <input type="submit" value="Add Testimonial">
           
            </input>
       
      </form>
   </div>
 
 
 
 
 </section>


 