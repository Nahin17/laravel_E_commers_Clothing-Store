<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
    .div_center{
        text-align: center;
        padding-top: 0%;
    }

    .font_size{
           font-size: 40px;
         padding-bottom:40px;
         color: aqua;
      }
      .text_color{
        color: black;
        padding-bottom: 20px;
        
        
      }
      label{
        display: inline-block;
        width: 200px;

        
      }
      .div_design{
        padding-bottom: 15px;
      }
      .ff{
        
        color: rgb(8, 236, 236);
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
         {{--            <div class="main-panel">
          <div class="content-wrapper"> 
            
            ai 2 ta or nicher 2 ta line likha e lage jotobar ai typer view create korte jai like product add e gelam okhabe o
            ai 2 line diye mainly input field create hoy
            
            
            --}}
            
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x </button>
                    {{session()-> get('message')}}
                </div>
    
    
                @endif
                

                <div class="div_center">
                    <h1 class="font_size"> Add Product</h1>

                    
                    <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">  {{--enctype disi  file upload er jonno --}}
                     @csrf
                        <fieldset class="ff">
                    <div class="div_design">
                  <label for="">Product Title : </label>
                    <input class="text_color " type="text" name="title" placeholder="write a title" required="">
                    </div>

                    <div class="div_design">
                     <label for="">Product Description: </label>
                          <input class="text_color " type="text" name="description" placeholder="write a description" required="">
                          </div>

                        <div class="div_design">
                           <label for="">Product Price : </label>
                           <input class="text_color " type="number" name="p_price" placeholder="write a product price" required="">
                        </div>

                        <div class="div_design">
                            <label for="">Discount Price : </label>
                            <input class="text_color" type="number" name="dis_price" placeholder="write a discount price if applied">
                        </div>
                     

                        <div class="div_design">
                            <label for="">Product Quantity: </label>
                            <input class="text_color " type="number" name="quantity" min="0" placeholder="Product quantity" required="">
                        </div>

                      



                        <div class="div_design">
                             <label for="">Product Catagory: </label>
                            <select name="catagory" id="" class="text_color" name="catagory" required="">
                                <option value="" selected disabled="">Add a catagory here</option>
                            {{--    <option value="">Shirt</option>
                                <option value="">Jeans</option>  --}}
                                @foreach($catagory as $catagory) 
                              
                                {{--   <option value="">{{$catagory->catagory_name}}   </option> --}}

                            <option value="{{$catagory->catagory_name}}"> {{$catagory->catagory_name}}   </option>
                           
                                @endforeach

                            </select>
                        </div> 


                        <div class="div_design">
                            <label for="">Product Image: </label>
                            <input class="text_color " type="file" name="image" min="0" placeholder="write a title" required="">
                        </div>
    

                        
                        <div class="div_design">
                            
                            <input class="btn btn-primary" type="submit" value= "Add Products">
                        </div>
                    </fieldset>
                    </form>
              


            

                </div>
            </div>
        </div>
            







       
    <!-- plugins:js -->
   @include ('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>