
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 
     
   Customer Name:<h1> {{$order->name}}</h1>
   Customer Email: <h1> {{$order->email}}</h1>
   Customer Phone:<h1>{{$order->phone}}</h1>
<br>
      <img height="250px" width="450px" src="product/{{$order->image}}" alt="">



    </table>
</body>
</html>