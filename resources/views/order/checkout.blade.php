<!doctype html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ChowNow</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
      
        @include('order.JS')
        <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{('order/css/bootstrap.min.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{('order/css/style.css')}}"> --}}
        @include('order.orderpartialcss')
       
        <script>
        var matulailla;
        </script>
  </head>
  <body style="">
     <style>
     #subscriber_form{ display:none; }
#subscriber_form {
	margin: 0;
    width: 100%;
    z-index: 2;
    height: 100%;
    max-height: 1080px;
    position: fixed;
    background: rgba(70, 71, 72, 0.69);
}
#sub_div_form { 
	width: 600px;  
	height: 210px;
    margin: 0 auto;
    background: white;
    margin-top: 15%;
    padding: 45px;
    border: 1px solid #9E9E9E;
    border-radius: .25em .25em .4em .4em;
    text-align: center;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}
#sub_div_form span {
	position: relative;
    float: right;
    font-weight: 700;
    margin-top: -40px;
    height: 15px;
    font-size: 18px;
    width: 15px;
    line-height: 15px;
    margin-right: -40px;
    border: 2px solid;
    border-radius: 90px;
    padding: 7px;
}

span#kv_form_close:hover {
    color: #e0190b;
}

@media screen and (max-width: 440px) {
	#sub_div_form { 
		width: 290px; 
		padding: 35px;
	}
}
    </style>
    <!-- pop up -->
<div id="subscriber_form" > 
 	 <div id="sub_div_form"> 
  	 	<span id="kv_form_close"> X </span>
               <div style="height:500px;width:500px">
              
                   <h6>Your Order has placed for execution, Thanks for your order ...........</h6>
            </div>
 	 </div>
</div>
      
<div class="col-md-5 float-left checkout-whole-div" style="overflow-y:scroll;height:700px">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a style="color:cornflowerblue;text-decoration:none;font-size: 19px;font-weight: 600;" class="navbar-brand" href="{{url('/makeorder')}}"> 
                <i style="font-size:16px" class="fas fa-less-than"></i>Location
            </a>
             @include('order.orderheader2')
    </nav>
    <div class="card card-div-order">
        <div class="card-header">
           Contact
        </div>
        <div class="card-body">
           <table class="" >
                 <tbody>
                    <tr>  
                        @php
                            $user=Auth::user()->id;
                             $user=App\User::find($user);
                              $shop=Session::get('shop_id');
                        @endphp                
                    <td scope="col"><h5>Name</h5></td>
                    <td><h5></h5>{{$user->first_name}}</h5></td>
                    </tr>              
                    <tr>
                        <td style="">
                            <h5>Phone</h5>
                        </td>
                        <td  class="form-group">

                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone" style="width:120%">
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" style="margin-left:6px">
                            <label class="form-check-label" for="exampleCheck1" style="margin-left:20px">Someone else will pick that order</label>
                       </td>
                    </tr>

                </tbody>
            </table>
        </div>
   </div>
   <div class="card card-div-order">
       <div class="card-header">
           Order Details
       </div>
       <div class="card-body">
           <ul style="list-style:none">
            <li>
                <h6><b>Pickup Location</b></h6>
            </li>
            <li>
                 @if($shop==1)
                    <h2 style="margin:0">Frito Chicken</h2>
                    <h6 style="margin:0">44650 Waxpool Rd #100 Ashburn VA 20147 <br>
                    </h6>
                 @endif  
                  @if($shop==2)
                    <h2 style="margin:0">Frito Chicken</h2>
                    <h6 style="margin:0">6007 Centreville Crest Lane Centreville VA 20121 <br>
                
                    </h6>
                    @endif
                    @if($shop==3)
                    <h2 style="margin:0">Frito Chicken</h2>
                    <h6 style="margin:0">6699 B Frontier Dr Springfield VA 22150<br>
                
                    </h6>
                    @endif 
            </li>
            {{-- <li>
                 <h6>8357 Leesburg Pike</h6>
            </li>
            <li>
                 <h6>Vienna, VA 22182 USA</h6>
            </li> --}}
          </ul>

       </div>
   </div>
   <div class="card card-div-order">
       <div class="card-header">
        Payment
       </div>
       <div class="card-body">
          <table>
                <tr>
                     <td>
                        <input type="checkbox" class="form-check-input" id="paymentcheck" style="margin-left:6px">
                        <label class="form-check-label" for="paymentcheck" style="margin-left:20px">Remember card for future use</label>
                    </td>
                </tr>
                <tr  class="form-group">
                    <td class="float-left" style="widht:70%">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Card Number">
                    </td>
                    <td class="float-right col-md-5">
                         <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="CVV">
                    </td>
                </tr>
                <tr>
                   
                   <td> 
                      <div class="dropdown" style="display:inline;margin-right:15px">
                            <button class="btn-sm btn dropdown-toggle" type="button" id="dropdownMenuButtonmonth" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                               Month
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonmonth">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                      </div>   
                   <div class="dropdown" style="display:inline; margin-right:15px">
                        <button class="btn-sm btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                              Year
                         </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another2</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                   </div> 
                   <div style="display:inline">
                    <input type="text" class="form-control" placeholder="Zip Code" style="width:57%;display:inline">
                   </div>      
                         
                   </td>
                </tr>
          </table>
       </div>
   </div>
   <div class="card card-div-order">
       <div class="card-header">
        Tip
       </div>
       <div class="card-body">
           <button onclick="tip(1)">$1</button>
           <button  onclick="tip(2)">$2</button>
           <button  onclick="tip(3)">$3</button>
           <button  onclick="tip(5)">$5</button>
           <input  type="text" class="" id="tipinput" aria-describedby="emailHelp" placeholder="$0.00">
       </div>

   </div>
   @php
         if (Auth::user() != null) {
           // Cart::clear();
            $userId = Auth::user()->id;
            $con = Cart::getContent($userId);
           
            $subTotal = Cart::getSubTotal();
        } else {
            $con = null;
        }
        $tax=15;
          $subtax=($tax*$subTotal)/100;
            $total=$subtax+$subTotal;
   @endphp
   <div class="card card-div-order">
       <div class="card-header">
           Order Summary
       </div>
       <div class="card-body">
           <h6 style="float:left">Subtotal</h6>
           <h6 style="float:right">${{$subTotal}}</h6>
           <br><hr>
           <h6 style="float:left">Taxes</h6>
           <h6 style="float:right">${{$subtax}}</h6>
           <br><hr>
           <h6 style="float:left">Tip</h6>
           <h6 id="tip" style="float:right"></h6>
           <br><hr>
           <h4 style="float:left">Total</h4>
           <h4 id="totalafter" style="float:right">${{$total}}</h4>
       </div>
   </div>
   <div>
       <button class="btn btn-info" style="width:100%" onclick="completeorder()">Complete Order</button>
   </div>
    
</div>
<style>
    .pickup-cart {
    height: 421px !important;
    background: #eff0f2;
}

</style>
@include('order.checkoutmap')

    <script>
        var m;
          $("#tipinput").keypress(function(){
           // alert(this.value);
            m=this.value;
           console.log(m);
            $.ajax({
                type:'get',
                data:{'tip':m,'total':<?php echo $total ?>},
                url:'{{url('/tipset')}}',
                success:function(data){
                   // console.log(data);
                   data='$'+data;
                  $('#totalafter').html(data);
                }
            })
         });
        function tip(data){
            m=data;
            data='$'+data;
           $('#tip').html(data);
            $.ajax({
                type:'get',
                data:{'tip':m,'total':<?php echo $total ?>},
                url:'{{url('/tipset')}}',
                success:function(data){
                   // console.log(data);
                   data='$'+data;
                  $('#totalafter').html(data);
                }
            })
           
         
        }
    function completeorder(){
      
        $.ajax({
                type:'get',
                data:{'tip':m,'total':<?php echo $total ?>},
                url:'{{url('/completeorder')}}',
                success:function(data){
                  
                  if(data=='success'){
                     console.log(data);
	
                        $('#subscriber_form').delay(1000).fadeIn('slow');  //default Auto after 1 Sec
                    
                        $("#subscriber_form").on('click', function(e){  // Close, when click outside of the box
                            if (e.target !== this)
                                return;
                            else{
                                $(this).hide();
                            }
                        });

                        $("#show_popup").on("click", function() {  // Custom Show button code.
                            $("#subscriber_form").show();
                        });
                        $("#kv_form_close").on('click', function(e){  // close button code. 
                            $('#subscriber_form').fadeOut('slow');
                        });

                  }
                  
                }
            })
        
    }
   
       
    </script>
   
   
   <script src="{{('order/js/bootstrap.min.js')}}"></script>    
  </body>
</html>