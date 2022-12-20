<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .center{
            margin: auto;
            width: 50%;
            border: 2px solid blanchedalmond;
            text-align: center;
            margin-top: 30px;
           
            
        }
        .font_size{
            text-align: center;
                 font-size: 20px;
             padding-bottom:30px;
}
.img_size{
    width: 850px;
    height: 100px;
}
.th_color{
    background: skyblue;
}
.th_deg{
    padding: 30px;

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
    {{--     <div class="content-wrapper"> 
            
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
            
            <h2 class="font_size">ALl products</h2>

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
                              <th> Product Title </th>
                              <th> Description </th>
                              <th> Quantity </th>
                              <th> Catagory </th>
                              <th> Price </th>
                              <th> Discount Price </th>
                              <th > Image </th>
                              <th> Edit </th>
                              <th>Delete </th>
                              
                            </tr>
                          </thead>
                        

       @foreach($product as $product)
         <tr>
            <td>
                <div class="form-check form-check-muted m-0">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                  </label>
                </div>
              </td>
            <td>{{$product->title}}</td>

            <td>{{$product->description}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->catagory}}</td>
            <td>{{$product->price}}</td>
            <td>   <div class="badge badge-outline-success">{{$product->discount_price}} </div> </td> 
            <td>
              
                <img class="" src="/product/{{$product->image}}" alt=""> 
            </td>

            <td>
               <a class="btn btn-success" href="{{url('edit_product',$product->id)}}">  Edit</a>   
            </td>
        

               <td>
                <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this')" href="{{url('delete_product',$product->id)}}">  Delete</a>
             </td>
        
           
         </tr>

      @endforeach




   </table>
</div>
</div>
</div>
</div>
</div>





    <!-- plugins:js -->
   @include ('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>