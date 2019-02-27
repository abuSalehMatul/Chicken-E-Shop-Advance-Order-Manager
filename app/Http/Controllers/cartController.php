<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\tbl_product;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\User;

class cartController extends Controller
{
     public function addtocart(Request $request)
    {
        $id = $request->product_id;
        $quantity = $request->quantity;
        $product = tbl_product::where('id', $id)->first();
        $special_instruction=$request->special_instruction;
      
       $a = explode("$", $product->regural_price);
       $tax=15;
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' =>$a[1],
            'quantity' => $quantity,
            'attributes' => array(
                'special_instruction'=>$special_instruction,
            )
        ));

        if (Auth::user() != null) {
           // Cart::clear();
            $userId = Auth::user()->id;
            $con = Cart::getContent($userId);
           
            $subTotal = Cart::getSubTotal();
        } else {
            $con = null;
        }
       // return $subTotal;
        $output="";
        if ($con != null){
            foreach ($con as $con){
            $cart_del_url = route('delcart', $con->id);
            $output.= '<div class="map-section-cart-item" style="padding:15px;border:1px solid #cccccc">'.
                            '<li style="list-style:none">'.
                                        '<h6 style = "display:inline;font-size: 15px;margin-right: 15px;" >'. $con->quantity.'</h6>'.
                                        '<h6 style = "display:inline;font-size:12px" >'.$con->name.'</h6>'.
                                        '<h6 style = "display:inline;margin-left:5px" >$'.$con->price.'</h6>'.
                                        '<span id="cross_button_side" style="float:right;display:inline"><a  style="text-decoration:none;color:red;cursor:pointer;" href="'.$cart_del_url.'" class="fas fa-times-circle"></a></span>' . 
                            '</li>'.
                   
                        '</div>';
                      
                      
                      
            
           }
        }
        if ($con == null) {
            $subTotal = 0;
        }
        if ($subTotal == 0) {
            $tax = 0;
        }
         if($subTotal>.5){
            $output = '<div style="height:230px;overflow-y:scroll">' . $output . '</div>';
             $output.= '<div class="map-subtotal">' .
            '<h4 style="float-left;margin:0px 120px 0px 0px;display:inline;">subtoal</h4>' .
            '<h6 style="display:inline;float-right">$' . $subTotal . '</h6>' .

            '<hr style="margin:0">' .
            '<h6 style="float-left;margin:0px 180px 0px 0px;display:inline;font-size:20px">tax</h6>' .
            '<h6 style="float-right;margin:0px 0px 0px 0px ;display:inline;">$' . $tax . '</h6>' .
            '</div>';

        }
        $output='<div style="height:300px">'.$output.'</div>';
        // $output.= '<div class="map-subtotal">' .
        //     '<h4 style="float-left;margin:0px 100px 0px 0px;display:inline;">subtoal</h4>' .
        //     '<h6 style="display:inline;float-right">' . $subTotal . '</h6>' .

        //     '<hr style="margin:0">' .
        //     '<h6 style="float-left;margin:0px 130px 0px 0px;display:inline;font-size:20px">tax</h6>' .
        //     '<h6 style="float-right;margin:0px 0px 0px 0px ;display:inline;">' . $tax . '$</h6>' .
        //     '</div>';
        if($subTotal<0.5){
            $output.= '<div style = "margin: 14px;font-size: 15px;" >'.
            ' <h6 style = "margin:0" > Order ammount is below $ 0.5 </h6 >'.'<br>'. 
        'Pickup Minimum'.

        '</div>';
        }
        if ($subTotal < .5) {
            $output = '<div style="height:220px;">' . $output . '</div>';
            $output .= '<div style = "margin: 0;font-size: 15px;background:#fcf6f5" >' .
                ' <h6 style = "/* margin:0; */padding: 8xp;/* padding: 2px; */padding-left: 17px;padding-top: 10px;margin: 0;" > Order ammount is below $ 0.5 </h6 >' . '<br>' .
                '<h6 style="font-size: .75rem;margin-left: 11px;margin-top: -8px;padding: 7px;">Pickup Minimum</h6>' .

                '</div>';

        }
        $subtax = ($tax * $subTotal) / 100;
        $total = $subtax + $subTotal;
        $checkurl=url('/ordercheckout');
        if($con==null){
             $output.='<div class="map-checkout">'.

                      '<a  class="btn btn-info" style="width: 100%;height: 50px;background: #48a2df;padding: 5px 5px 24px 112px;padding: 7px 2px 22px 110px;olor: white;text-decoration: none;">Check out<p style="display:inline;margin-left:3px;padding: 7px 14px 20px 1px;background:#2f89c5;color:white;">$'.$total.'</p></a>'
                . '</div>'; 

        }else{
             $output.='<div class="map-checkout">'.

                      '<a href="'.$checkurl. '" class="btn btn-info" style="width: 100%;height: 50px;background: #48a2df;padding: 5px 5px 24px 112px;padding: 7px 2px 22px 110px;olor: white;text-decoration: none;">Check out<p style="display:inline;margin-left:3px;padding: 7px 14px 20px 1px;background:#2f89c5;color:white;">$'.$total.'</p></a>'
                . '</div>'; 

        }
        return $output;
     // return Redirect::to('/orderitem');
    }


    public function addtocartreload(Request $request){
       
        $tax=15;
        if (Auth::user() != null) {
           // Cart::clear();
            $userId = Auth::user()->id;
            $con = Cart::getContent($userId);

            $subTotal = Cart::getSubTotal();
        } else {
            $con = null;
        }
        //return $subTotal;
        $output="";
        if ($con != null){
            foreach ($con as $con){
          // echo $con->id;
           $cart_del_url=route('delcart',$con->id);
            $output.= '<div class="map-section-cart-item" style="padding:15px;border:1px solid #cccccc">'.
                            '<li style="list-style:none">'.
                                        '<h6 style = "display:inline;font-size: 15px;margin-right: 15px;" >'. $con->quantity.'</h6>'.
                                        '<h6 style = "display:inline;font-size:12px" >'.$con->name.'</h6>'.
                                        '<h6 style = "display:inline;margin-left:5px" >$'.$con->price.'</h6>'.
                                        '<span id="cross_button_side" style="float:right;display:inline"><a  style="text-decoration:none;color:red;cursor:pointer;" href="'.$cart_del_url.'" class="fas fa-times-circle"></a></span>' . 
                            '</li>'.
                   
                        '</div>';
                      
                      
                      
            
           }
        }
        if($con==null){
            $subTotal=0;
        }
        if($subTotal==0){
            $tax=0;
        }
        if($subTotal>.5){
            $output = '<div style="height:220px;overflow-y:scroll">' . $output . '</div>';
             $output.= '<div class="map-subtotal">' .
            '<h4 style="float-left;margin:0px 120px 0px 0px;display:inline;">subtoal</h4>' .
            '<h6 style="display:inline;float-right">$' . $subTotal . '</h6>' .

            '<hr style="margin:0">' .
            '<h6 style="float-left;margin:0px 180px 0px 0px;display:inline;font-size:20px">tax</h6>' .
            '<h6 style="float-right;margin:0px 0px 0px 0px ;display:inline;">$' . $tax . '</h6>' .
            '</div>';

        }
       
       
            if($subTotal<.5){
                 $output = '<div style="height:220px;">' . $output . '</div>';
                $output.= '<div style = "margin: 0;font-size: 15px;background:#fcf6f5" >'.
                ' <h6 style = "/* margin:0; */padding: 8xp;/* padding: 2px; */padding-left: 17px;padding-top: 10px;margin: 0;" > Order ammount is below $ 0.5 </h6 >'.'<br>'.
                '<h6 style="font-size: .75rem;margin-left: 11px;margin-top: -8px;padding: 7px;">Pickup Minimum</h6>'.

            '</div>';
           
            }
        $subtax = ($tax * $subTotal) / 100;
        $total = $subtax + $subTotal;
        $checkurl=url('/ordercheckout');
        if($con==null){
             $output.='<div class="map-checkout">'.

                      '<a  class="btn btn-info" style="width: 100%;height: 50px;background: #48a2df;padding: 5px 5px 24px 112px;padding: 7px 2px 22px 110px;olor: white;text-decoration: none;">Check out<p style="display:inline;margin-left:3px;padding: 7px 14px 20px 1px;background:#2f89c5;color:white;">$'.$total.'</p></a>'
                . '</div>'; 

        }else{
             $output.='<div class="map-checkout">'.

                      '<a href="'.$checkurl. '" class="btn btn-info" style="width: 100%;height: 50px;background: #48a2df;padding: 5px 5px 24px 112px;padding: 7px 2px 22px 110px;olor: white;text-decoration: none;">Check out<p style="display:inline;margin-left:3px;padding: 7px 14px 20px 1px;background:#2f89c5;color:white;">$'.$total.'</p></a>'
                . '</div>'; 

        }
        
        
        return $output;
        

    }
    public function addtocartreloadcheckout(Request $request){
        $tax = 15;
        if (Auth::user() != null) {
           // Cart::clear();
            $userId = Auth::user()->id;
            $con = Cart::getContent($userId);

            $subTotal = Cart::getSubTotal();
        } else {
            $con = null;
        }
        $output = "";
        if ($con != null) {
            foreach ($con as $con) {
                $cart_del_url = route('delcart', $con->id);
                $output .= '<div class="map-section-cart-item" style="padding:15px;border:1px solid #cccccc">' .
                    '<li style="list-style:none">' .
                    '<h6 style = "display:inline;font-size: 15px;margin-right: 15px;" >' . $con->quantity . '</h6>' .
                    '<h6 style = "display:inline;font-size:12px" >' . $con->name . '</h6>' .
                    '<h6 style = "display:inline;margin-left:5px" >$' . $con->price . '</h6>' .
                    '<span id="cross_button_side" style="float:right;display:inline"><a  style="text-decoration:none;color:red;cursor:pointer;" href="' . $cart_del_url . '" class="fas fa-times-circle"></a></span>' .
                    '</li>' .

                    '</div>';




            }
        }
        $output = '<div style="height:310px;">' . $output . '</div>';
      //  $output = '<div style="height:100px;background:#f2f3f4">' . $output . '</div>';
        return $output;

    }
    public function delcart($id){
       // echo $id;
        $del_cart=Cart::get($id);
       // echo $del_cart;
        Cart::remove($id);
        return redirect()->back();
    }
    public function tipset(Request $request){
       // return $request;
       $tip=$request->tip;
       $total=$request->total;
       Session::put('tipvalue',$tip);
       $total=$total+$tip;
       return $total;
    }
}
