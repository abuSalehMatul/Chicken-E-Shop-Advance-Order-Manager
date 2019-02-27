<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Client\Response\Response;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
use App\tbl_categories_for_product;
use App\User;
use App\cart_table;
use App\tbl_order;
use Cart;
class CustomerOrderController extends Controller
{
   public function index(){
       return view('order.order_index');
   }
   public function checkout(){
       return view('order.checkout');
   }
   public function item(){
	//    $table=tbl_categories_for_product::all();
	//   // print_r($table);
	//   foreach($table as $table){
	// 	  print_r($table->id);
	//   }
     return view('order.order_item');
   }
   public function mapsection(){
	   return view('order.mapsection');
   }
   public function loginpagestart(){
	   return view('order.loginStart');
   }
   public function selectedProduct($id){
	   return view('order.quantity')->with('product_id',$id);
   }
  public function setshop(Request $request){
	  $shop_id=$request->shop_id;
	  Session::put('shop_id',$shop_id);
  }
  public function profile(){
	  return view('order.profile');
  }
  public function logoutcustomer(){
	  Session::flush();
	  return Redirect::to('/makeorder');
  }
  public function selected_time(Request $request){
	  $selected_day=$request->selected_day;
	  $selected_weekday=$request->selected_weekday;
	  $selected_weekday=$selected_weekday-1;
	  $selected_month=$request->selected_month;
	//   echo $selected_month;
	//   exit();
	  Session::put('selected_month',$selected_month);
	  Session::put('selected_day',$selected_day);
	  Session::put('selected_weekday',$selected_weekday);
  }
  public function completeorder(Request $request){
	$tip=$request->tip;
	$selected_day=Session::get('selected_day');
	$selected_weekday=Session::get('selected_weekday');
	$selected_month=Session::get('selected_month');
	$shop_id=Session::get('shop_id');
	$later_time=$selected_day.','.$selected_weekday.','.$selected_month;
	$userId = Auth::user()->id;
	$con = Cart::getContent($userId);
	$subTotal = Cart::getSubTotal();
		$tax = 15;
		$total_tax = ($tax * $subTotal) / 100;
		$total = $total_tax + $subTotal+$tip;
	//return $subTotal;
	$neworder= new tbl_order;	
	$neworder->tip=$tip;
	$neworder->later_date=$later_time;
	$neworder->subtotal=$subTotal;
	$neworder->total_tax=$total_tax;
	$neworder->total=$total;
	$neworder->status=1;
	$neworder->user_id= $userId;
	$neworder->payment_method=0;
	$neworder->shop_id=$shop_id;
	$neworder->save();

	foreach($con as $con){
		$newcart = new cart_table;
		$newcart->product_id = $con->id;
		$newcart->name = $con->name;
		$newcart->price=$con->price;
		$newcart->quantity=$con->quantity;
		$newcart->order_id=$neworder->id;
		$newcart->special_instruction=$con->attributes['special_instruction'];
		$newcart->save();

	}
	//Session::forget('');
	Cart::clear();
	return 'success';
	

	
  }
   public function pickup(Request $request){
      $output="";
      $data=$request->id;
       $time=['10:45AM','11:00AM','11:15AM','11:30AM','11:45AM','12:00AM','12:15PM','12:30PM','12:45PM','1:00PM','1:15PM','1:30PM','1:45PM','2:00PM','2:15PM','2:30PM','2:45PM','3:00PM'];
       for($i=0;$i<sizeof($time);$i++){
        $output.='<div id="time'.$i.'" onClick="changedesign('.$i.')" class="order-ahead-times">'.
						'<div class="time-picker">'.
							'<div class="spinner-overlay">'.
								'<div class="spinner">'.'</div>'.
							'</div>'.
							'<ul>'.
								'<a>'.
									'<li>'.
                                        '<span  onClick="settime('.$data.')">'.$time[$i].'</span>'.
                                         '<input value="'.$data.'" type="hidden">'.
										'<ul class="time-picker-methods">'.
											'<li>'.
												'<i class="fa fa-check-square"></i>'.
												'<strong>pickup</strong>'.
											'</li>'.
										'</ul>'.
									'</li>'.
								'</a>'.
							'</ul>'.
						'</div>'.
					'</div>';
	   }
	  
       return Response($output);
      

   }
   public function pickupchangedesign(Request $request){
     $output="";
      $data=$request->id;
		$time = ['10:45AM', '11:00AM', '11:15AM', '11:30AM', '11:45AM', '12:00AM', '12:15PM', '12:30PM', '12:45PM', '1:00PM', '1:15PM', '1:30PM', '1:45PM', '2:00PM', '2:15PM', '2:30PM', '2:45PM', '3:00PM'];
       for($i=0;$i<sizeof($time);$i++){
         if($i==$data){
              $output.= '<div style="margin:0;transform:none" onClick="confirmorder()" id="time'.$i.'"  class="order-ahead-times ">'.
						'<div class="time-picker">'.
							'<div class="spinner-overlay">'.
								'<div class="spinner">'.'</div>'.
							'</div>'.
							'<ul style="margin:0 " >'.
								'<a>'.
									'<li class="bg-success" style="padding:3px;">'.
                                        '<span  onClick="settime('.$data.')">Confirm '.$time[$i].'</span>'.
                                         '<input value="'.$data.'" type="hidden">'.
										'<ul class="time-picker-methods">'.
											'<li>'.
												'<i class="fa fa-check-square"></i>'.
												'<strong>pickup</strong>'.
											'</li>'.
										'</ul>'.
									'</li>'.
								'</a>'.
							'</ul>'.
						'</div>'.
					'</div>';

         }  else{
             $output.='<div id="time'.$i.'"  onClick="changedesign('.$i.')"  class="order-ahead-times">'.
						'<div class="time-picker">'.
							'<div class="spinner-overlay">'.
								'<div class="spinner">'.'</div>'.
							'</div>'.
							'<ul>'.
								'<a>'.
									'<li>'.
                                        '<span  onClick="settime('.$data.')">'.$time[$i].'</span>'.
                                         '<input value="'.$data.'" type="hidden">'.
										'<ul class="time-picker-methods">'.
											'<li>'.
												'<i class="fa fa-check-square"></i>'.
												'<strong>pickup</strong>'.
											'</li>'.
										'</ul>'.
									'</li>'.
								'</a>'.
							'</ul>'.
						'</div>'.
					'</div>';
         }
       
       }
       return Response($output);
   }
}
