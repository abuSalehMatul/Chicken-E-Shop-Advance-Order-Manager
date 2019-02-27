<!doctype html>
<html lang="en">
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
        var matulailla;
        </script>
</head>
<body style="background:#cccccc">
<style>
  #subproduct:hover{
    color:#55a9e1;
    box-shadow: #cccccc 1px 1px;
  }
 
</style>   

<div class="col-md-5 float-left checkout-whole-div" style="width:1111px;background:#ffffff;margin:0;height:1200px;overflow-y:scroll">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a style="color:cornflowerblue;text-decoration:none;font-size: 19px;font-weight: 600;" class="navbar-brand" href="{{url('/makeorder')}}"> 
                <i style="font-size:16px" class="fas fa-less-than"></i>Location
            </a>
             @include('order.orderheader2')
    </nav>
    <div>
     <h6 onClick="expendall()" style="margin-left:56%;display:inline">Expend All</h6><i onClick="expendall()" style="font-size:15px;padding-left:5px" class="fas fa-expand-arrows-alt alink"></i>
     <h6 onClick="collapseall()" style="display:inline;margin-left:10px;">Collapse All</h6><i onClick="collapseall()" style="font-size:15px;padding-left:5px" class="fas fa-compress-arrows-alt alink"></i>
    </div>
    <hr style="">
   @php
       $cat_table=App\tbl_categories_for_product::all();
        $i=0;
        $j=0;
   @endphp
  <ul>
    @foreach($cat_table as $cat_table)
      <li class="cat-list-style"  style="cursor:pointer">
        <?php $i++; ?>
          <h3>{{$cat_table->name}}<i onclick="showsub(<?php echo $i ?>)"  class="fas fa-angle-right float-right right-font alink"></i></h3>
      </li>
      <ul id="sub<?php echo $i ?>" style="display:none">
       @php
         $allproduct =App\FetchProduct::where('category_id',$cat_table->id)->get(); 
       @endphp
       
      @foreach ($allproduct as $allproduct)
         @php
         $product=App\tbl_product::where('id',$allproduct->product_id)->first(); 
         $j=$product->id;  
         $productcont=App\tbl_product::where('id',$allproduct->product_id)->count();   
        // echo $productcont;
         @endphp

         @if($productcont==0)
         <li><h3>No product till Now</h3></li>
         @else
           <a style="text-decoration:none;color:black;" href="{{url('/selectedProduct/'.$j)}}">
              <li style="cursor:pointer;margin: 3px 0px 18px 0px;" id="subproduct" >
                  <h3 style="font-size:.95rem;display:inline;cursor:pointer">{{$product->name}}</h3>
                  <h4 style="/* margin:0px 20px 0px 150px; */display:inline;position: absolute;right: 30px;">{{$product->regural_price}}</h4>
              </li>
           </a>
          
          @endif
       @endforeach
      
      </ul>
      
    @endforeach 
  </ul>
 
</div>
<div style="">
@include('order.mapsection')
</div>
<script>
function showsub(id){
 // console.log(id);
  $('#sub'+id).toggle();
 
}

function expendall(){
    for(var id=0;id<200;id++){
      $('#sub'+id).show();
    }
}
function collapseall(){
   for(var id=0;id<200;id++){
      $('#sub'+id).hide();
    }
}  
</script>



<script src="{{('order/js/bootstrap.min.js')}}"></script>

   
  </body>
</html>