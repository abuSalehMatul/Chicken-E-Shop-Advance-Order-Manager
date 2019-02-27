<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <div class="col-md-5" style="border:1px solid #eee;height:700px;float:left">
        <div style="margin: 15px 3px 1px 5px;" class=" card"><a href="#"><h5> <i style="font-size:16px" class="fas fa-less-than"></i>Back</h5></a></div>

    
            <div class="card card-div-order">
                <div class="card-header">
                Profile
                <i style="color:cornflowerblue;float:right" class="far fa-edit"></i>
                </div>
                <div class="card-body" style="border:1px #eee solid">
                    <table class="" >
                        <tbody>
                            <tr>  
                                @php
                                    $user=Auth::user()->id;
                                    $user=App\User::find($user);
                                    $shop=Session::get('shop_id');
                                @endphp                
                            <td scope="col"><h5 style="margin: 0px 40px 0px 115px;font-weight: 700;font-size: 18px;font-style: normal;">Email</h5></td>
                            <td><h5 style="margin: 0px 0px 0px 5px;font-weight: 300;font-size: 16px;font-style: normal;">{{$user->email}}</h5></td>
                            </tr>              
                            <tr>  
                                {{-- @php
                                    $user=Auth::user()->id;
                                    $user=App\User::find($user);
                                    $shop=Session::get('shop_id');
                                @endphp                 --}}
                            <td scope="col"><h5 style="margin: 0px 40px 0px 115px;font-weight: 700;font-size: 18px;font-style: normal;">Name</h5></td>
                            <td><h5 style="margin: 0px 0px 0px 5px;font-weight: 300;font-size: 16px;font-style: normal;">{{$user->first_name}}</h5></td>
                            </tr>              
                            <tr>
                                <td style="">
                                    <h5 style="margin: 0px 40px 0px 115px;font-weight: 700;font-size: 18px;font-style: normal;">Phone</h5>
                                    <td><h5 style="margin: 0px 0px 0px 5px;font-weight: 300;font-size: 16px;font-style: normal;">{{$user->cell_number1}}</h5></td>
                                </td>
                               
                            </tr>
                        

                        </tbody>
                    </table>
                   
                </div>
                 <a class="btn" href="{{url('/logoutcustomer')}}" style="margin: 90px 1px 0px 0px;padding: 10px 218px 10px 227px;border: 1px solid ##48A2DF;border: 1px #48A2DF solid;background: #48A2DF;color: white;font-size: 19px;font-style: normal;">Log Out</a>
            </div>
             
    </div> 
     @include('order.mapsection')   
  

    
   <script src="{{('order/js/bootstrap.min.js')}}"></script>
</body>
</html>