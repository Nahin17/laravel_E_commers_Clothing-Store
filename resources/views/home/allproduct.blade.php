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

    {{-- 
         public function allProduct(){ 

            
        $product=Product::paginate(6);
        // $comment=comment::all(); 
        $comment=comment::orderby('id','desc')->get(); 
         $reply=reply::all(); 
      return view('home.allproduct',compact('product','comment','reply'));
    

          //  return view('home.allproduct');
            //aita e header er product


     ai tuk code likha lage cz ekhane product er jinis database theke ashtese search er o so 2 or beshi jodi ashe likha lage
    --}}









      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- slider section -->
       

      
      <!-- product section -->
      @include('home.allproductview')
      <!-- end product section -->

       <!-- Comment and reply system starts here -->
       
      <div  style="text-align: center; padding-bottom:30px">
         <h1 style="font-size: 30px; text-align:center; padding-top:20px; padding-bottom:20px;">  Comments </h1>
         <form action="{{url('add_comment')}}" method="post">
            @csrf
            <textarea name="comment" style="height:150px; width: 600px" name="" id="" cols="30" rows="10" placeholder="comment something here"></textarea>
           <br>
           <input type="submit"  class="btn btn-primary" value="Comment">
           
         </form>
      </div>

      
      <div style="background-color:rgb(172, 179, 187); padding-left:35%; border: 1px solid rgb(56, 236, 236)">
         <table class="table"  style="width: 50%; border: 1px solid rgb(202, 22, 22)">
         <h1 style="font-size: 20px;  padding-top:20px; padding-bottom:20px;"">All Comments</h1>


     @foreach($comment as $comment)

      <div class="" >
        
        
     
      
       <h4> <b>Post by-> {{$comment->name}}: </b>  
            {{$comment->comment}} <br> </h4>  
            <a style="color:rgb(212, 32, 32)"  href="javascript::void(0);" data-Commentid="{{$comment->id}}" class="btn btn-sm" onclick="reply(this)"> Reply</a>
          <hr>
      
      @foreach($reply as $rep)
      @if($rep->comment_id==$comment->id)   
      <div style="padding-left: 5%; paddding-top: 10px"> 
                
            {{$rep->name}}:
            {{$rep->reply}} <br>
            <a style="color:blue"  href="javascript::void(0);" data-Commentid="{{$comment->id}}" class="btn btn-sm" onclick="reply(this)"> Reply</a>
         
      </div>         
      </div>    
   </div>
   <hr> 
     @endif
      @endforeach 
      @endforeach 
      
 </table>
      
      <!-- reply textbox -->

      <div style="display: none;" class="replyDiv">
         <form action="{{url('add_reply')}}" method="post">
            @csrf
         <input type="text" id="commentId" name="commentId" hidden="">
         <textarea name="reply" style="height:100px; width:500px"  placeholder="Write something here" ></textarea>
         <br>
         <button type="submit" class="btn btn-warning  btn-sm" value="Reply"> Reply </button>
        

         <a href="javascript::void(0);"class="btn  btn-sm" onclick="reply_close(this)">Close</a>
   
      </form>
     </div>
  

   </div>
     <!-- --------------------------------------------------------- Comment and reply system end here -->
   
      

      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->
      
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>

      <script type="text/javascript">
      function reply(caller){
         document.getElementById('commentId').value=$(caller).attr('data-Commentid')
         $('.replyDiv').insertAfter($(caller));
         $('.replyDiv').show();

      }

      function reply_close(caller){
       
         $('.replyDiv').hide();

      }


      
      
      </script>


{{-- ai nicher code ta diye refresh dile o same jaygay thake --}}

<script>
   document.addEventListener("DOMContentLoaded", function(event) { 
       var scrollpos = localStorage.getItem('scrollpos');
       if (scrollpos) window.scrollTo(0, scrollpos);
   });

   window.onbeforeunload = function(e) {
       localStorage.setItem('scrollpos', window.scrollY);
   };
</script>





      <!-- jQery -->
      // ai 4 ta line er kaj payment successful je mes dey oitay x clict korle delete kora
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>