<?php
namespace App\Http\Controllers\Admin\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;

class OrdersController extends Controller{
//  public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function allorders(){
        if(!empty(session()->has('id') && session()->get('role') == 0)){
             $result = array(
            'page_title' => 'Orders',
            'meta_keywords' => 'manage_orders',
            'meta_description' => 'manage_orders',
        );
        return view('admin.orders.allorders',$result);

        }else{
             print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
        }
       
    }




	function view_orders(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
            //Necessary Page Data For header Page
            $result = array(
                'page_title' => 'Manage Orders',
                'meta_keywords' => 'manage_orders',
                'meta_description' => 'manage_orders',
            );

            $query = DB::table('tbl_orders')
                            ->select('tbl_orders.*');
            $result['query'] = $query->paginate(8);
            $result['total_records'] = $result['query']->count();               
            
            //Query For Getting Orders
            // $query = DB::table('tbl_orders')
            //              ->select('tbl_orders.id as o_id', 'tbl_orders.order_no', 'tbl_orders.payment_method', 'tbl_orders.ordered_date', 'tbl_orders.status as o_status', 'tbl_order_invoices.status as p_status', 'tbl_users.first_name', 'tbl_users.last_name')
            //              ->leftJoin('tbl_order_invoices', 'tbl_order_invoices.order_id', '=', 'tbl_orders.id')
            //              ->groupBy('tbl_orders.order_no')
            //              ->orderBy('tbl_orders.id', 'DESC');
         	// $result['query'] = $query->paginate(8); 
         	// $result['total_records'] = $result['query']->count(); 

         	//Call Page
            return view('admin.orders.manage', $result);
        }else{
            print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
        }
    }
    



    // this is for order details by some previous dev, I can't see any use of it //
	function details(Request $request, $order_no){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $order_no)){
			//Necessary Page Data For header Page
            $result = array(
                'page_title' => 'View Order Details',
                'meta_keywords' => 'view_order_details',
                'meta_description' => 'view_order_details',
            );

            //Query For Getting Order Products
            $query = DB::table('tbl_orders')
                         ->select('tbl_orders.product_id', 'tbl_orders.quantity', 'tbl_orders.type', 'tbl_products.featured_image', 'tbl_products.name', 'tbl_products.regural_price', 'tbl_products.sale_price', 'tbl_products.sku_code')
                         ->leftJoin('tbl_products', 'tbl_products.id', '=', 'tbl_orders.product_id')
                         ->where('tbl_orders.order_no', $order_no)
                         ->where('tbl_orders.seller_id', $request->session()->get('id'));
            $result['cart_details'] = $query->get();

            //Query For Getting Customer Details
            $query = DB::table('tbl_orders')
                         ->select('tbl_users.first_name', 'tbl_users.last_name', 'tbl_users.country_code_1', 'tbl_users.cell_number1', 'tbl_users.email', 'tbl_countries_phone_code.id', 'tbl_countries_phone_code.code')
                         ->leftJoin('tbl_users', 'tbl_users.id', '=', 'tbl_orders.buyer_id')
                         ->leftJoin('tbl_countries_phone_code', 'tbl_countries_phone_code.id', '=', 'tbl_users.country_code_1')
                         ->where('tbl_orders.order_no', $order_no)
                         ->where('tbl_orders.seller_id', $request->session()->get('id'));
         	$result['customer_details'] = $query->first();
        	
        	//Query For Getting Shipping Details
        	$query = DB::table('tbl_orders')
                         ->select('tbl_orders_shipping_details.name', 'tbl_orders_shipping_details.contact_no', 'tbl_orders_shipping_details.city_id', 'tbl_orders_shipping_details.country_id', 'tbl_orders_shipping_details.address', 'tbl_cities.name as city_name', 'tbl_countries.country_name')
                         ->leftJoin('tbl_orders_shipping_details', 'tbl_orders_shipping_details.order_id', '=', 'tbl_orders.id')
                         ->leftJoin('tbl_cities', 'tbl_cities.id', '=', 'tbl_orders_shipping_details.city_id')
                         ->leftJoin('tbl_countries', 'tbl_countries.country_code', '=', 'tbl_orders_shipping_details.country_id')
                         ->where('tbl_orders.order_no', $order_no)
                         ->where('tbl_orders.seller_id', $request->session()->get('id'));
         	$result['shipping_details'] = $query->first();

         	//Query For Getting Order Summary
         	$query = DB::table('tbl_orders')
                         ->select('tbl_orders.order_no', 'tbl_order_delivery_charges.charges', 'tbl_order_invoices.total', DB::raw('SUM(tbl_order_invoices.total - tbl_order_delivery_charges.charges) as sub_total'))
                         ->leftJoin('tbl_order_delivery_charges', 'tbl_order_delivery_charges.order_id', '=', 'tbl_orders.id')
                         ->leftJoin('tbl_order_invoices', 'tbl_order_invoices.order_id', '=', 'tbl_orders.id')
                         ->where('tbl_orders.order_no', $order_no)
                         ->where('tbl_orders.seller_id', $request->session()->get('id'));
         	$result['order_summary'] = $query->first();

            //Call Page
            return view('admin.orders.details', $result);
		}else{
			print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
		}
	}

    
	function update_payment_status(Request $request, $order_no){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $order_no)){
			//Set Field data according to table column
            $data = array(
                'tbl_order_invoices.status' => $request->input('payment_status'),
            );

			//Query For Updating Data
            $query = DB::table('tbl_orders')
                         ->select('tbl_orders.order_no', 'tbl_order_invoices.order_id', 'tbl_order_invoices.status')
                         ->leftJoin('tbl_order_invoices', 'tbl_order_invoices.order_id', '=', 'tbl_orders.id')
                         ->leftJoin('tbl_users', 'tbl_users.id', '=', 'tbl_orders.buyer_id')
                         ->where('tbl_orders.seller_id', $request->session()->get('id'))
                         ->where('tbl_orders.order_no', $order_no)
                         ->update($data);

            if(!empty($query)){
                //Flash Success Msg
                $request->session()->flash('alert-success', 'Payment status has been updated successfully');
            }else{
                //Flash Erro Msg
                $request->session()->flash('alert-error', "Something wen't wrong");
            }

            //Redirect
            return redirect()->route('manage_seller_orders');
		}
	}

	function update_order_status(Request $request, $order_no){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $order_no)){

			//Set Field data according to table column
            $data = array(
                'status' => $request->input('order_status'),
            );

			//Query For Updating Data
            $query = DB::table('tbl_orders')
                         ->where('order_no', '=', $order_no)
                         ->where('seller_id', '=', $request->session()->get('id'))
                         ->update($data);

            if(!empty($query)){
                //Flash Success Msg
                $request->session()->flash('alert-success', 'Order status has been updated successfully');
            }else{
                //Flash Erro Msg
                $request->session()->flash('alert-error', "Something wen't wrong");
            }

            //Redirect
            return redirect()->route('manage_seller_orders');
		}
	}

	function search(Request $request){
		if(!empty($request->session()->has('id')) && $request->session()->get('role') == 0){
            //Necessary Page Data For header Page
            $result = array(
                'page_title' => 'Search Result',
                'meta_keywords' => 'search_result',
                'meta_description' => 'search_result',
            );

            //Query For Getting Orders
            $query = DB::table('tbl_orders')
                         ->select('tbl_orders.id as o_id', 'tbl_orders.order_no', 'tbl_orders.payment_method', 'tbl_orders.ordered_date', 'tbl_orders.status as o_status', 'tbl_order_invoices.status as p_status', 'tbl_users.first_name', 'tbl_users.last_name')
                         ->leftJoin('tbl_order_invoices', 'tbl_order_invoices.order_id', '=', 'tbl_orders.id')
                         ->leftJoin('tbl_users', 'tbl_users.id', '=', 'tbl_orders.buyer_id')
                         ->where('tbl_orders.seller_id', $request->session()->get('id'));
                         if(!empty($request->input('order_no'))){
                            $query->where('tbl_orders.order_no', $request->input('order_no'));
                         }
                   $query->where('tbl_orders.payment_method', $request->input('payment_type'))
                         ->where('tbl_orders.status', $request->input('order_status'))
                         ->where('tbl_order_invoices.status', $request->input('payment_status'));
                         if(!empty($request->input('order_date'))){
                            $query->where('tbl_orders.ordered_date', date('Y-m-d', strtotime($request->input('order_date'))));
                         }
                       $query->groupBy('tbl_orders.order_no')
                         ->orderBy('tbl_orders.id', 'DESC');
         	$result['query'] = $query->paginate(8); 
         	$result['total_records'] = $result['query']->count();
            
         	//Call Page
            return view('admin.orders.manage', $result);
        }elseif(!empty($request->session()->has('id')) && $request->session()->get('role') == 1){
            //Necessary Page Data For header Page
            $result = array(
                'page_title' => 'Search Result',
                'meta_keywords' => 'search_result',
                'meta_description' => 'search_result',
            );
            
            //Query For Getting Orders
            $query = DB::table('tbl_orders')
                         ->select('tbl_orders.id as o_id', 'tbl_orders.order_no', 'tbl_orders.payment_method', 'tbl_orders.ordered_date', 'tbl_orders.status as o_status', 'tbl_order_invoices.status as p_status')
                         ->leftJoin('tbl_order_invoices', 'tbl_order_invoices.order_id', '=', 'tbl_orders.id')
                         ->where('tbl_orders.buyer_id', $request->session()->get('id'));
                         if(!empty($request->input('order_no'))){
                            $query->where('tbl_orders.order_no', $request->input('order_no'));
                         }
                   $query->where('tbl_orders.payment_method', $request->input('payment_type'))
                         ->where('tbl_orders.status', $request->input('order_status'))
                         ->where('tbl_order_invoices.status', $request->input('payment_status'));
                         if(!empty($request->input('order_date'))){
                            $query->where('tbl_orders.ordered_date', date('Y-m-d', strtotime($request->input('order_date'))));
                         }
                   $query->groupBy('tbl_orders.order_no')
                         ->orderBy('tbl_orders.id', 'DESC');
            $result['query'] = $query->paginate(8); 
            $result['total_records'] = $result['query']->count(); 

            //Call Page
            return view('admin.orders.manage', $result);
        }else{
            print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
        }
	}

    public function detail(Request $request, $id)
    {
        $result = array(
                'page_title' => 'Search Result',
                'meta_keywords' => 'search_result',
                'meta_description' => 'search_result',
            );

        $result['users'] = DB::table('tbl_orders')
                        ->join('tbl_products','tbl_orders.product_id','=','tbl_products.id')
                        ->select('tbl_products.*', 'tbl_orders.*')
                        ->where('tbl_orders.order_no','=',$id)
                        ->get();


        return view('admin.orders.details', $result);             
    }
}