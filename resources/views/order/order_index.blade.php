<!DOCTYPE html>
<html>
<head>
   
  
    @include('order.JS')
    <!-- Styles -->
  
    {{-- <link rel="stylesheet" type="text/css" href="{{('order/css/style.css')}}"> --}}
    <style>
           @include('inc.productsviewstyle');
    </style>

     @include('order.orderpartialcss')
   

   
</head>
<body style="background:#cccccc">
<?php 
$day=[];
$c_h=date('H');
// echo $c_h;
//Session::flush();
?>
<!-- order now unavailable style -->
  <style>
     #subscriber_form{ display:none; }
#subscriber_form {
	margin: 0;
    width: 100%;
    z-index: 4;
    height: 100%;
    max-height: 1080px;
    position: fixed;
    background: rgba(70, 71, 72, 0.69);
}
#sub_div_form { 
	width: 600px;  
	height: 650px;
    margin: 0 auto;
    background: white;
    margin-top: 1%;
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


<div id="subscriber_form" > 
 	 <div id="sub_div_form"> 
  	 	<span id="kv_form_close"> X </span>
            <div style="height:500px;width:500px">
                <h4>Not Taking order right now </h4>
                <h5>Pickup hours</h5>
              <table class="table table-striped">
                  <tr>
                      <td><h6>Sunday</h6></td>
                      <td><h6>10:30 am - 9:15 pm</h6></td>
                  </tr>
                  <tr>
                      <td><h6>Monday</h6></td>
                      <td><h6>10:30 am - 9:15 pm</h6></td>
                  </tr>
                  <tr>
                      <td><h6>Tuesday</h6></td>
                      <td><h6>10:30 am - 9:15 pm</h6></td>
                  </tr>
                  <tr>
                      <td><h6>Wednesday</h6></td>
                      <td><h6>10:30 am - 9:15 pm</h6></td>
                  </tr>
                  <tr>
                      <td><h6>Thusday</h6></td>
                      <td><h6>10:30 am - 9:15 pm</h6></td>
                  </tr>
                  <tr>
                      <td><h6>Friday</h6></td>
                      <td><h6>10:30 am - 9:15 pm</h6></td>
                  </tr>
                  <tr>
                      <td><h6>Saturday</h6></td>
                      <td><h6>10:30 am - 9:15 pm</h6></td>
                  </tr>
                 
              </table>
            </div>
 	 </div>
</div>
<!-- order now unavailable style -->


<div class="welcome">
    <div class="main-layout" style="width:1111px;background:#ffffff">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
             <a class="navbar-brand" href="#"> 
               
            </a>
             @include('order.orderheader2')
        </nav>
           {{-- // @include('inc.productsview') --}}
           
			<div id="accordion">
			   <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button onClick="setshopnew()"  class="btn btn-link collapsed" style="text-decoration:none"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <span><i class="fa fa-map-marker-alt"></i></span>
                            <span class="onhover-blue" style="font-size: 25px;color: #222;margin-left: 10px;
                            font-style: normal;">Frito Chicken</span>
                            <span><i class="fa fa-pencil-alt"></i></span>
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body" id="shop_name_id" style="display:block">
                            <div id="m1" class="shop-name">
                                <h5 onClick="setShop(1)">Frito Chicken</h5>
                                <address>44650 Waxpool Rd # 100 Ashburn VA 20147</address>
                            </div>
                            <div id="m2" class="shop-name">
                                <h5 onClick="setShop(2)">Frito Chicken</h5>
                                <address>6007 Centreville Crest lane Centreville VA 20121</address>
                            </div>
                            <div id="m3" class="shop-name">
                                <h5 onClick="setShop(3)">Frito Chicken</h5>
                                <address>6699 B Frontier Dr Springfield VA 22150</address>
                            </div>
                        </div>
                    </div>
			  </div>

			  <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link onhover-blue" style="text-decoration:none" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <span><i class="far fa-clock"></i></span>
                            <span class="onhover-blue" style="font-size: 25px;color: #fff;margin-left: 9px;font-family: 'Roboto', sans-serif;">Choose a Time</span>
                            </button>
                        </h5>
                    </div>

			    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
			      <div class="card-body" style="padding:0">
			        <ul class="accordion-menu">
                        <li class="listOne" style="padding:0">
                            @if($c_h> 10 && $c_h< 21)
			        		<li onclick="orderavailable()" data-toggle="modal" style="margin: 20px 5px 0px 30px;cursor:pointer;color:#58aae1">
			        			<span class="heading"><p style="margin:0;font-weight: 600;">Order for Now</p></span>
			        			<p style="color:black">Order for Now is available at this time.</p>
                            </li>
                            @else
			        		<li onclick="orderUnavailable()" data-toggle="modal" style="margin: 20px 5px 0px 30px;cursor:pointer;color:#58aae1">
			        			<span class="heading"><p style="margin:0;font-weight: 600;">Order for Now (Unavailable)</p></span>
			        			<p style="color:black">Order for Now is not available at this time. Click here to see hours.</p>
                            </li>
                            @endif
							<!-- Modal -->
							
                          
                            <!-- end -->
			        	</li>
			        	<li class="listTwo" >
			        		<p id="order-for-late"  style="cursor:pointer;margin:0;">
			        			<span class="heading"><p onClick="calendershow()" style="margin:0;font-weight: 600;cursor:pointer">Order for Later</p></span>
			        			<p style="margin-bottom:0;color:black;">Have your order prepared at a specified future date & time.</p>
                            </p>
                        </li>
                        <div id="order-for-late-date" class="body" style="height: 155px;background: #f0f0f0;display:none">
                            <div class="order-ahead-days">
                                <div class="order-ahead-header">
                                    <span>Choose a Date & Time</span>
                                    <a onClick="calendershow()" style="float: right;cursor:pointer;text-decoration">
                                        <i style="cursor:pointer" class="fa fa-less-than"> BACK</i>
                                    </a>
                                </div>
                                <ul class="day-picker">
                                <?php
                                    for($j=0;$j<7;$j++){?>
                                
                                    <li class="active">
                                        <a  onClick="gettime(<?php echo $j ?>)">
                                            <span  class="day-word"><h6 id="w<?php echo $j?>"></h6></span>
                                            <span id="d<?php echo $j ?>" class="day-number"></span>
                                        </a>
                                    </li>
                                    
                                    <?php

                                    }
                                    ?>
                                </ul>
                                
                            
                            </div>
                       

                         </div>
			        </ul>
			      </div>
			    </div>
			  </div>
					
        </div>
		 <div id="gtime" class="gtime-before" style="">

         </div>
         <div id="pickup" style="cursor:pointerd">
			  <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed onhover-blue" style="text-decoration:none" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            <span><i class="fa fa-utensils"></i></span>
                            <span class="onhover-blue" style="font-size: 25px;color: #777;margin-left: 9px;font-family: jaf-bernino-sans-condensed,Helvetica,Arial,sans-serif;">Pickup</span>
                            </button>
                        </h5>
                    </div>
			  </div>
         </div>
         <div class="pickupitem" style="display:none;margin-left:60px"  id="pickupitemnull">
             <h2 style="color:#55a9e1;cursor:pointer;font-size:1.1rem;" onClick="pickthisitem()">Pickup</h2>
             <p onClick="pickthisitem()">Pick up your order at Frito Chicken.</p>
         </div>  
         <div id="confirm-and-view-manu">
             <a href="{{url('/orderitem')}}" style="width:100%" class="btn btn-info">Confirm and View Menu</a>
         </div>
    </div>
</div>	
	<!---->  




	<!-- Script tag -->
	{{-- <script src="{{('order/js/jquery.min.js')}}"></script> --}}
    <script src="{{('order/js/bootstrap.min.js')}}"></script>
    <script>
        $('#confirm-and-view-manu').hide();
        function calendershow(){
            $('#order-for-late-date').toggle(300);
            var date = new Date();
            var month=date.getMonth();
            var weekday=date.getDay();
           // console.log(weekday);
            var monthlist=['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec'];
            var daylist=['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
            var pore=0;
            var aropore=0;
            var previous_day=0;
            var d;
            var i;
            for(i=0;i<7;i++){
                d=(date.getDate() + i);
               
                if(weekday>6){
                    weekday=weekday-7;
                }
                if(i==0){
                     document.getElementById("w"+i).innerHTML = "Today";
                }else{
                     document.getElementById("w"+i).innerHTML = daylist[weekday];
                }
               
                weekday++;
                if(month == 1 && d>28){
                   var year=date.getYear();
                    year=year+1900;
                    console.log(year);
                     date = new Date();
                   if(year/4==0){
                        if(d>29){
                            previous_day=d-1;
                            month++;
                            d=d-29;
                        }
                   }else{
                       previous_day=d-1;
                       month++;
                       d=d-28;
                   }
                }
                if(month==0 || month==2 || month==4 || month==6 || month==7 || month==9 ||month==11){
                    if(previous_day>0){
                        d=d-previous_day;
                    }
                    if(pore==1){
                        previous_day=d-1;
                        month++;
                        d=d-31;
                    }
                    if(d==31){
                        pore=1;
                    }
                }
                else{
                     if(previous_day>0){
                        d=d-previous_day;
                    }
                    if(aropore==1){
                        previous_day=d-1;
                        month++;
                        d=d-30;
                    }
                    if(d==30){
                        aropore=1;
                    }
                }
                 console.log(monthlist[month]);
                 document.getElementById("d"+i).innerHTML = d;
                // console.log(d);
            }
            


        }
        function gettime(id){
           // console.log(id);
            $.ajax({
                type:'get',
                url:'{{URL::to('pickup')}}',
                data:{'id':id},
                success:function(data){
                  //  console.log(data);
                    $('#gtime').html(data);
                    $('#gtime').addClass('gtime-after');
                }
            })
        }
        function settime(id){
           console.log(id);
         // $('#time'+id).hide();
            var selected_day;
            var selected_weekday;
            var selected_month;

            var date = new Date();
            var month=date.getMonth();
            var weekday=date.getDay();
           // console.log(weekday);
            var monthlist=['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec'];
            var daylist=['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
            var pore=0;
            var aropore=0;
            var previous_day=0;
            var d;
            var i;
            for(i=0;i<7;i++){
                d=(date.getDate() + i);
               
                if(weekday>6){
                    weekday=weekday-7;
                }
             
               
                weekday++;
                if(month == 1 && d>28){
                   var year=date.getYear();
                    year=year+1900;
                  //  console.log(year);
                     date = new Date();
                   if(year/4==0){
                        if(d>29){
                            previous_day=d-1;
                            month++;
                            d=d-29;
                        }
                   }else{
                       previous_day=d-1;
                       month++;
                       d=d-28;
                   }
                }
                if(month==0 || month==2 || month==4 || month==6 || month==7 || month==9 ||month==11){
                    if(previous_day>0){
                        d=d-previous_day;
                    }
                    if(pore==1){
                        previous_day=d-1;
                        month++;
                        d=d-31;
                    }
                    if(d==31){
                        pore=1;
                    }
                }
                else{
                     if(previous_day>0){
                        d=d-previous_day;
                    }
                    if(aropore==1){
                        previous_day=d-1;
                        month++;
                        d=d-30;
                    }
                    if(d==30){
                        aropore=1;
                    }
                }
                 //console.log(monthlist[month]);
                // document.getElementById("d"+i).innerHTML = d;
                // console.log(d);
                 if(i==id){
                     selected_weekday=weekday;
                     selected_day=d;
                     selected_month=month;
                     break;
                 }
            }
            console.log(selected_day);
            console.log(selected_weekday-1);
            console.log(selected_month);
            $.ajax({
                type:'get',
                data:{'selected_day':selected_day,'selected_weekday':selected_weekday,'selected_month':selected_month},
                url:'{{url('/selected_time')}}',
                success:function(data){
                    console.log(data);
                }
            });

        }
        function orderavailable(){
             var date = new Date();
            var selected_month=date.getMonth();
            var selected_weekday=date.getDay();
            var selected_day=date.getDate()
            $.ajax({
                type:'get',
                data:{'selected_day':selected_day,'selected_weekday':selected_weekday,'selected_month':selected_month},
                url:'{{url('/selected_time')}}',
                success:function(data){
                    console.log(data);
                }
            });
        }
        function changedesign(id){
            $.ajax({
                type:'get',
                url:'{{URL::to('pickupchangedesign')}}',
                data:{'id':id},
                success:function(data){
                  //  console.log(data);
                    $('#gtime').html(data);
                }
            })
        }
        function confirmorder(){
            $("#collapseTwo").css("height","100%");
              $('#order-for-late-date').toggle();
              $('#gtime').hide();
               $('#collapseTwo').hide();
              $('.pickupitem').show();
              
        }
    </script>
   
    <script>
        function displayproduct(value){
            $('#product'+value).toggle();
        }


        function pickthisitem(){
            console.log("submit");
            $('#confirm-and-view-manu').show();
            $('#pickupitemnull').hide();
           
        }
        function orderUnavailable(){
            $('#exampleModal').toggle(1000);
        }
        function setShop(id){
           $('#m1').removeClass('shopBack');
           $('#m2').removeClass('shopBack');
           $('#m3').removeClass('shopBack');
           $('#m'+id).addClass('shopBack');
           $('#shop_name_id').toggle();
            $.ajax({
                type:'get',
                data:{'shop_id':id},
                url:'{{url('/setshop')}}',
                success:function(data){
                    console.log('success');
                }
            })
        }
        function setshopnew(){
             $('#shop_name_id').show();
        }
       
    
    </script>


<script>
function orderUnavailable(){
	
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