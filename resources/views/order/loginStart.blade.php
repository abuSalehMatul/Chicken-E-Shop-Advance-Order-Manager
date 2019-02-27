<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frito Chicken-Login</title>
     @include('order.JS')
      <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{('order/css/bootstrap.min.css')}}">
      @include('order.orderpartialcss')
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' =>  auth()->user()
        ]) !!};
       
    </script>
</head>
<body>
    {{-- <style>
        #login-start-page{
            align-items: center;
           // margin-left: 30%;
            border: solid 1px #bbbbbb;
            margin-right: 30%;
            
        }
    </style> --}}
    
    {{-- <div id="login-start-page">
         <h2 class="text-center text-info">Login with</h2>
        <ul style="list-style:none">
            <li style="padding:30px;">
                <a href="{{url('login/google')}}"><img src="{{asset('order/img/google.jpg')}}" height="40px" width="40px">Google</a>
            </li>
            <li style="padding:30px;">
                <a href="{{url('login/facebook')}}"><img src="{{asset('order/img/facebook.png')}}" height="40px" width="40px">FaceBook</a>
            </li>
        </ul>
    </div> --}}

   
    <div class="col-md-5 float-left" style="border:1px solid #eee">
        <div style="margin:50px" class="text-center"><h1>Frito Chicken</h1></div>
        <hr>
        <a href="{{url('login/facebook')}}" class="btn" style="padding: 0px 195px 0px 0px;background: #51669c;color:white;margin-left: 50px;"><img src="{{asset('order/img/fb_icon.png')}}" height="42px" width="42px" style="border:1px #eee solid"><h5 style="display:inline;margin-left: 34%;">Login with Facebook</h5></a>
        <a href="{{url('login/google')}}" class="btn" style="padding: 0px 218px 0px 0px;background: #f9f9f9;color:#a2a2a2;margin: 21px 0px 0px 45px;"><img src="{{asset('order/img/google-plus-logo.jpg')}}" height="42px" width="42px" style="border:1px #eee solid"><h5 style="display:inline;margin-left: 34%;">Login with Google</h5></a>
        <h6 class="text-center">or</h6>
        <div>
            <form action="{{url('/logincustomer')}}" method="POST">
                {{ csrf_field() }}
                <input name="email" type="email" placeholder="Email" style="margin: 10px 4px 16px 43px;width: 82%;padding: 13px;">
                <input name="password" type="password" style="margin: 10px 4px 16px 43px;width: 82%;padding: 13px;" placeholder="Password">
                <input type="submit" style="margin-left: 43px;width: 82%;padding: 13px;background:#bb4238;color:white" value="Login">
                <a href="{{url('/')}}" style="text-decoration:none;"> <h6 style="display:inline;color:#46a1de;margin: 0px 0px 0px 45px;">Cencel</h6></a>
                {{-- <h6 style="display:inline;color:#46a1de;margin: 0px 0px 0px 265px;">Forget Passwork?</h6> --}}
            </form>
            <a href="{{url('/create_account')}}" style="padding: 6px 289px 11px 6px;background: #ffffff;color:black;margin: 53px 5px 70px 46px;border:1px solid black" class="btn">Create an Account</a>
        </div>
    </div>
   
    @include('order.mapsection')




   <script src="{{('order/js/bootstrap.min.js')}}"></script>
</body>
</html>