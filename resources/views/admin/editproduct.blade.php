<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">  {{-- css ta read korte partesilo nah or public folder pacchilo nah tai aai line--}}
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
                    <h1 class="font_size"> Edit Product</h1>

                    
                    <form action="{{url('/edit_product_confirm',$product->id)}}" method="post" enctype="multipart/form-data">  {{--enctype disi  file upload er jonno --}}
                     @csrf
                        <fieldset class="ff">
                    <div class="div_design">
                  <label for="">Product Title : </label>
                    <input class="text_color " type="text" name="title" placeholder="write a title" required="" value="{{$product->title}}">
                    </div>

                    <div class="div_design">
                     <label for="">Product Description: </label>
                          <input class="text_color " type="text" name="description" placeholder="write a description" required="" value="{{$product->description}}">
                          </div>

                        <div class="div_design">
                           <label for="">Product Price : </label>
                           <input class="text_color " type="number" name="p_price" placeholder="write a product price" required="" value="{{$product->price}}">
                        </div>

                        <div class="div_design">
                            <label for="">Discount Price : </label>
                            <input class="text_color" type="number" name="dis_price" placeholder="write a discount price if applied" value="{{$product->discount_price}}">
                        </div>
                     

                        <div class="div_design">
                            <label for="">Product Quantity: </label>
                            <input class="text_color " type="number" name="quantity" min="0" placeholder="Product quantity" required="" value="{{$product->quantity}}">
                        </div>

                      



                        <div class="div_design">
                             <label for="">Product Catagory: </label>
                            <select name="catagory" class="text_color" name="catagory" required="" >
                                <option value="{{$product->catagory}}" selected disabled=""> {{$product->catagory}}</option>
                            {{--    <option value="">Shirt</option>
                                <option value="">Jeans</option>  --}}
                               @foreach($catagory as $catagory)  
                              
                                {{-- aita commentout korbo nah  <option value="">{{$catagory->catagory_name}}   </option> --}}

                          <option value="{{$catagory->catagory_name}}"> {{$catagory->catagory_name}}   </option>
                           
                                @endforeach 
                           
                            </select>
                        </div> 

                        <div class="div_design ">
                            <label for="">Current Product Image: </label>
                           <img style="margin: auto;" height="100" width="100" src="/product/{{$product->image}}" alt="">
                        </div>
                        


                        <div class="div_design">
                            <label for="">Change Product Image: </label>
                            <input class="text_color " type="file" name="image" min="0" placeholder="write a title" value="{{$product->image}}">
                        </div>
    

                        
                        <div class="div_design">
                            
                            <input class="btn btn-primary" type="submit" value= "EditProducts">
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