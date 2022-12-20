<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center{
            text-align:center;
            padding-top: 0%;
        }

        .h2_font{

        font-size: 40px;
        padding-bottom:40px;
        }
        .input_color{
            color:black;
        }
        .center{
          margin:auto;
          width: 50%;
          text-align: center;
          margin-top: 30px;
          border: 3px solid rgb(184, 184, 184);
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
            
            <div class="div_center"> <h2 class="h2_font"> Add Catagory</h2>
            <form action="{{url('/add_catagory')}}" method="post">
                @csrf
                <input class="input_color" type="text" name="catagory" placeholder="write catagory name">

                <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
            </form>
            </div>

            <table class="center"> 
              <tr>
                <td>Catagory Name</td>
                <td> Action</td>


     @foreach($data as $data)
     
              </tr>
              <tr>
                <td>
                  {{$data->catagory_name}}

                </td>  {{--exactly database e jei name disi oitai deya lagbe--}}

              <td>
                <a onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger" href="{{url('delete_catagory',$data->id)}}"> Delete  </a></td>
              {{--ekhane delete korle successfull message dekhay but kono code likha lagtese nah cz
                 variable ta message e rakhsi message bad diye onno kichu name dile likha lagto --}}
              </tr>

              @endforeach   

            </table>

    </div>
     </div>


    <!-- plugins:js -->
   @include ('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>