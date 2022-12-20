<!DOCTYPE html>
{{-- Home.blade.php copy kore ene disi  --}}
<base href="/public">
<html lang="en">

  <head>

    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        label{
            display: inline-block;
            width: 200px;
            font-size: 15px;
            font-weight: bold;

        }
    </style>
  </head>
  <>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include ('admin.sidebar')
      <!-- partial -->
        <!-- partial:partials/_navbar.html -->
       @include ('admin.header')
        <!-- partial -->
        <!-- partial:partials_body -->
        <div class="main-panel">
            <div class="content-wrapper">
               

             
            <div class="row ">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Send Email</h4>
                      <div class="table-responsive">
                        <table class="table">
                         
                            {{--    <div class="form-check form-check-muted m-0">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                  </label>
                                </div>  
                                --}}  
                              
                              <h1 style="text-align: center; front-size: 20px"> Send Email to {{$order->email}} </h1>


                              <form action="{{url('send_email_notifi',$order->id)}}" method="post">
                                @csrf
                              <div style="padding-left: 35%; padding-top:30px">
                                <label for="">Email Greeting: </label>
                                <input style="color:black" type="text" name="greeting">
                            </div>   
                            
                            <div style="padding-left: 35%; padding-top:30px">
                                <label for="">Email Firstline: </label>
                                <input style="color:black" type="text" name="firstline">
                            </div> 

                            <div style="padding-left: 35%; padding-top:30px">
                                <label for="">Email Body: </label>
                                <input style="color:black" type="text" name="body">
                            </div> 

                            <div style="padding-left: 35%; padding-top:30px">
                                <label for="">Email Button: </label>
                                <input style="color:black" type="text" name="button">
                            </div> 

                            <div style="padding-left: 35%; padding-top:30px">
                                <label for="">Email URL: </label>
                                <input style="color:black" type="text" name="url">
                            </div> 

                            <div style="padding-left: 35%; padding-top:30px">
                                <label for="">Email Lastline: </label>
                                <input style="color:black" type="text" name="lastline">
                            </div> 

                            <div style="padding-left: 35%; padding-top:30px">
                             
                                <input type="submit" value="Send Email"class="btn btn-primary" >
                            </div> 




                        </form>
                        </table>
                    </div> </div></div></div>
            </div></div></div></div>
     
    <!-- plugins:js -->
   @include ('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>