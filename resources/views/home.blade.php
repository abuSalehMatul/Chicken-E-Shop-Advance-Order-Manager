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
        var quantity=0;
        var product_id={{$product_id}};
        </script>
</head>
<body style="background:#cccccc">

<div class="main-layout" style="width:1111px;float-left">
	@include('order.orderheader2')
	
		<div class="item-details-main">
			<div class="wrap-padding">
                @php
                     $product=App\tbl_product::where('id',$product_id)->first(); 
                @endphp
				<div class="heading-lg">{{$product->name}}</div>
				<span class="price">{{$product->regural_price}}</span>
				
				<div class="counterdown">
                                
                    <div id="field1">Quantity
                        <button type="button" id="sub" class="sub" >-</button>
                        <input type="number" id="1" value="0" min="0" max="300" />
                        <button type="button" id="add" class="add" >+</button>
                    </div>
					
				</div>
				<div class="instruction">
					<span><i class="fa fa-edit"></i></span>
					<span class="title1">Special Instructions (Optional)</span>
					<div class="container">
						<input type="text" name="instruction" class="form-control">
					</div>
				</div>
				<div class="order">
					<li style="list-style:none;cursor:pointer" onclick=" add_to_cart() " class="btn btn-success btn-block">Add to order</li>
				</div>
			</div>
		</div>
	   
 @include('order.mapsection')
</div>




 


<script src="{{('order/js/bootstrap.min.js')}}"></script>
<script>

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
    function add_to_cart(){
            $.ajax({
                type:'get',
                url:'{{URL::to('addtocart')}}',
                data:{'quantity':quantity,'product_id':product_id},
                success:function(data){
                   // console.log('su');
                    console.log(data);
                   
                }
            });
        }

</script>


</body>
</html>