<!doctype html>
<html lang="en">
<head>
        
      
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Frito Chicken</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<!-- Dropzone -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.21/moment-timezone-with-data-2012-2022.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        'user' =>  auth()->user()
    ]) !!};
          
 </script>

 
  <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  

    @include('order.orderpartialcss')
    
    <script>
    var matulailla;
    var quantity=0;
  var product_id={{$product_id}}
    </script>
</head>
<body style="background:#cccccc">
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
	width: 240px;  
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
 	 	 	<div style="height:100px">
                   <h6>Please login before place order</h6>
            </div>
 	 </div>
</div>




<!--end of popup -->
   
<div class="col-md-5 float-left checkout-whole-div" style="width:35%;background:#ffffff;margin:0;height:630px;overflow-y:scroll">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a style="color:cornflowerblue;text-decoration:none;font-size: 19px;font-weight: 600;" class="navbar-brand" href="{{url('/orderitem')}}"> 
                <i style="font-size:16px" class="fas fa-less-than"></i>Menu
            </a>
             @include('order.orderheader2')
    </nav>
	
		<div class="">
			<div class="wrap-padding">
                @php
                     $product=App\tbl_product::where('id',$product_id)->first(); 
				@endphp
				<div style="margin:50px 2px 60px 16px;">
			    <h2 style="font-size: 24px;display:inline;margin: 0px 35px 0px 0px;">{{$product->name}}</h2>
				<h3 style="display:inline">{{$product->regural_price}}</h3>
				</div>
				<div class="counterdown">
                                
                    <div id="field1">Quantity
                        <button type="button" id="sub" class="sub" style="height: 40px;width:40px" >-</button>
                        <input type="number" id="1" value="0" min="0" max="300" class="form-control" style="height:35px;width: 15%;display: inline;" />
                        <button type="button" id="add" class="add" style="height: 40px;width:40px">+</button>
                    </div>
					
				</div>
				<div class="instruction" style="padding:6px">
					<span><i class="fa fa-edit"></i></span>
					<span class="title1">Special Instructions (Optional)</span>
					<div class="container">
						<input id="specialins" type="text" name="instruction" class="form-control" style="height: 50px;width:400px" >
					</div>
                </div>
                @if(Auth::user()!=null)
				<div class="order" style="padding:20px;margin-left:0%">
					<button style="width:400px;height:60px;background:#53a653;color:white;" onclick=" add_to_cart() " class="btn btn-success ">Add to order</button>
                </div>
                @else 
                <div class="order" style="padding:20px;margin-left:0%">
					<button style="width:400px;height:60px;background:#53a653;color:white;" onclick=" popupforlogin() " class="btn btn-success ">Add to order</button>
                </div>
                @endif
			</div>
		</div>
	   

</div> 

@include('order.mapsection')


<script>
var specialins;
$('.add').click(function () {
		if ($(this).prev().val() < 300) {
    	$(this).prev().val(+$(this).prev().val() + 1);
         quantity=quantity+1;
		}
});
$('.sub').click(function () {
		if ($(this).next().val() > 0) {
    	if ($(this).next().val() > 0) {$(this).next().val(+$(this).next().val() - 1);
         quantity=quantity-1;
         }
		}console.log(quantity);
});
$("#specialins").keyup(function(){
    // alert(this.value);
    specialins=this.value;
    console.log(specialins);
   
 });
function add_to_cart(){
        $.ajax({
            type:'get',
            url:'{{URL::to('addtocart')}}',
            data:{'quantity':quantity,'product_id':product_id,'special_instruction':specialins},
            success:function(data){
                // console.log('su');
                console.log(data);
                $('#pickup-cart').html(data);
                
            }
        });
    }

</script>
<script>
function popupforlogin(){
	
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
};
</script>


</body>
</html>