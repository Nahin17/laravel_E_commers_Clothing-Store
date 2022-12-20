<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <style>
    .div_design{
        padding-bottom: 15px;
      }
     
.f{
margin: auto;
height: 37%;
width:13%;
margin-top: 5%;
margin-left: 40%;
border-color: skyblue;

}
.button{
text-decoration: none;
text-align: center;
    width:100%;
color: whitesmoke;
background-color: rgb(73,127,175);
border: 1px solid red;
padding: 15px;
font-size: 100%;

}
.button:hover{
            background-color:teal;
            color: cyan;
        }


.hover{

}
.hover:hover{
border-color: cyan;

}
.font{
            font-size:25px;
            
            
            font: serif;
            color: palevioletred;
            
        }
        .block{
            color: green;
        }
        .signup{
            
            text-align: center;
            

        }
        .textfield{
            height: 45px;
            
        }

        
        body{
            background-color:#E3ECE3;
            
        }
   

        .font_size{
           font-size: 20px;
         padding-bottom:10px;
         color: rgb(1, 2, 2);
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






      </style>
</head>
<body>
   
    <fieldset class="f">
    <form action="{{url('/adding_testimonial')}}" method="POST" enctype="multipart/form-data">  {{--enctype disi  file upload er jonno --}}
        @csrf

        <table align="" >
            <tr>
                <td> <br> <a class="navbar-brand" href="{{url('/')}}"><img   width = "250px" src="/images/logo.png" alt="#" /></a> 
                    <br><blockquote class="block">-Buy Good, Feel Good </blockquote>  <td>
               
     {{--  <td><h1 align="center">&nbsp; <span  style="color: #d41b1b;">Jolly</span>  Roger</h1> <blockquote class="block">-Eat Good, Feel Good </blockquote> </td> --}}
    
            </tr>
       </table>
       <br>
       <br>
  
           <table align="">

            <div class="font_size">             
              <label for="">Name : </label>
                <input class="hover textfield" type="text"  name="name" placeholder=" write a testimonial" size="60%" required="">                       
             </div>
             
          
         <div class="font_size">             
             <label for="">Testimonial : </label>
               <input class="hover textfield" type="text"  name="testimonial" placeholder=" write a testimonial" size="60%" required="">                       
            </div>
            
            <div class="font_size" >
               
                <label for="">Person's Image:</label>
               <td><input class="hover text_color" type="file"  name="image" min="0"  required=""> 
                       
               </div>
            
           </table>

          <div>

            <input class="button" type="submit" value= "Add Testimonial">
          </div>
            
       </form>
    
   </fieldset>
 
</body>
</html>