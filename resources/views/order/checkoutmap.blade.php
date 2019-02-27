<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Frito Chicken</title>
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
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' =>  auth()->user()
        ]) !!};
       
    </script>

   
</head>
<body>
    <?php
        $tax=15;
    ?>
<div class="float-left" style="width:21%;" id="map">
    <div class="map-section-map">
    </div>
    <div class="map-section-name">
        @php
            $shop=Session::get('shop_id');
        @endphp
        @if($shop==1)
        <h3 style="margin:0;font-size: 20px;">Frito Chicken</h3>
        <h6 style="margin-top: 7px;font-size: 12px;">44650 Waxpool<br> Rd #100 Ashburn VA 20147 
        </h6>
        @endif
        @if($shop==2)
        <h3 style="margin:0;font-size: 20px;">Frito Chicken</h3>
        <h6 style="margin-top: 7px;font-size: 12px;">6007 Centreville<br> Crest Lane Centreville VA 20121 
       
        </h6>
        @endif
        @if($shop==3)
        <h3 style="margin:0;font-size: 20px;">Frito Chicken</h3>
        <h6 style="margin-top: 7px;font-size: 12px;">6699 B Frontier<br> Dr Springfield VA 22150
      
        </h6>
        @endif
       
    </div>
    <hr style="margin:0;">
    <div class="pickup-date">
    @php
        $day=['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
        $selected_day=Session::get('selected_day');
        $selected_weekday=Session::get('selected_weekday');
        $selected_month=Session::get('selected_month');
       // echo $selected_month;
        $month=['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec'];

    @endphp
    @if($selected_day!=null || $selected_month!=null || $selected_weekday!=null)
    <h4 style="display:inline;font-size:1.2rem;">Pickup -</h4>
    <h5 style="display:inline;font-size:.98rem;">
        {{$day[$selected_weekday]}} At  {{$month[$selected_month]}} {{$selected_day}}
    </h5>
     @endif
    
    </div>
    <div class="pickup-cart" id="pickup-cart" >
    </div>
</div> 

<script>
$('#map').hide();
$(document).ready(function(){
$('#map').show(1999);
})
</script>
<script>
    //  ('#cross_button_side').hide();
    // function cross_show(){
    //      ('#cross_button_side').show();
    // }
   
   

</script>
 
<script src="{{('order/js/bootstrap.min.js')}}"></script>
 <script>
$(document).ready(function(){
   
        console.log('hi');
         $.ajax({
                type:'get',
                
                url:'{{url('/addtocartreloadcheckout')}}',
                success:function(data){
                  $('#pickup-cart').html(data);
                }
            })
   
});
	
</script>
</body>