<?php

namespace App\Http\Controllers\Online;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
class OrderController extends Controller
{
    function index(Request $request)
    {
    	return view('frontend.chicken');

    }
     function login(Request $request){
        if(!empty($request->session()->has('id') && $request->session()->get('role') == 1)){
            //Redirect to dashboard
            return redirect()->route('user_dashboard');
        }else{
            $result = array(
                'page_title' => 'Sign In',
                'meta_keywords' => 'sign_in',
                'meta_description' => 'sign_in',
            );

            //Query For Getting Logo and Store Name
            $query = DB::table('tbl_store_settings')
                         ->select('tbl_store_settings.store_name', 'tbl_store_images.footer_image')
                         ->leftJoin('tbl_store_images', 'tbl_store_images.user_id', '=', 'tbl_store_settings.user_id');
            $result['query'] = $query->first();

            //call page
            return view('frontend.chicken', $result); 
        }
    }
     function userinsert(Request $request){
        //Inputs Validation
        $input_validations = $request->validate([
            'first' => 'required|String',
            'last' => 'required|String',
            'email' => 'required|unique:tbl_users|email|String',
            'pass1' => 'required|min:5|regex:/^((?=.*[a-z]))((?=.*[0-9])).+$/',
        ]);

        $data = [
            'first_name' => $request->input('first'),
            'last_name' => $request->input('last'),
            'email' => $request->input('email'),
            'password' => sha1($request->input('pass1')),
            'role' => 1,
            'status' => 0,
            'created_date' => date('Y-d-m'),
            'created_time' => date('h:i:s'),
        ];

        //check user email and password in table
        $query = DB::table('tbl_users')
                     ->insertGetid($data);

      
        //if user data found then sign in else redirect with error msg
        if(!empty($query)){
            //Flash Error Msg
            $request->session()->flash('alert-success', 'Your account has been created successfully');

            //Redirect to dashboard
            return redirect()->back();
        }else{
            //Flash Error Msg
            $request->session()->flash('alert-danger', "Their is something wrong !!");

            //Redirect to sign up page
            return redirect()->back();
        }
     }

    function validating_user(Request $request){
        //if(!empty($request->input('email1') && $request->input('pass'))){
            if($request->input('btn3')){
                $inputs = [
                    $email_address = $request->input('email1'),
                    $password = sha1($request->input('pass')),
                ];
            
                //Inputs Validation
                $input_validations = $request->validate([
                    'email1' => 'required|email|String',
                    'pass' => 'required|min:5|regex:/^((?=.*[a-z]))((?=.*[0-9])).+$/',
                ]);

                //check user email and password in table
                $query = DB::table('tbl_users')
                             ->select('*')
                             ->where('email', $email_address)
                             ->where('password', $password)
                             ->where('role', 1)
                             ->where('status', 0);
                $result = $query->first();

              
                //if user data found then sign in else redirect with error msg
                if($result){
                    //User data
                    $user_id = $result->id;
                    $user_role = $result->role;
                    $user_email = $result->email;

                    //Flash Erro Msg
                    $request->session()->flash('alert-success', 'You are login successfully');
                   
                    //Set data accordings to table columns
                    $data = array(
                        'user_id' => $user_id,
                        'status' => 0,
                        'date' => date('Y-m-d'),
                        'time' => date('H:i:s'),
                    );

                    //Insert data in table
                    $query = DB::table('tbl_login_activities')
                                 ->insertGetId($data);

                    //Storing User Id In session
                    $store_session = session([
                        'id' => $user_id, 
                        'role' => $user_role,
                    ]);
                    
                    //Redirect to dashboard
                   return redirect()->route('user_dashboard');
                }else{
                    //Flash Error Msg
                    $request->session()->flash('alert-danger', 'You are using wrong credentials for sign in');
                    //Redirect to sign up page
                    return redirect()->back();
                }
            }

            if($request->input('btn4')){
                //Inputs Validation
                $input_validations = $request->validate([
                    'first' => 'required|String',
                    'last' => 'required|String',
                    'email2' => 'required|unique:tbl_users|email|String',
                    'pass1' => 'required|min:5|regex:/^((?=.*[a-z]))((?=.*[0-9])).+$/',
                ]);

                $data = [
                    'first_name' => $request->input('first'),
                    'last_name' => $request->input('last'),
                    'email' => $request->input('email2'),
                    'password' => sha1($request->input('pass1')),
                    'created_date' => date('Y-d-m'),
                    'created_time' => date('h:i:s'),
                ];

                //check user email and password in table
                $query = DB::table('tbl_users')
                             ->insertGetid($data);

              
                //if user data found then sign in else redirect with error msg
                if(!empty($query)){
                    //Flash Error Msg
                    $request->session()->flash('alert-success', 'Your account has been created successfully');

                    //Redirect to dashboard
                    return redirect()->back();
                }else{
                    //Flash Error Msg
                    $request->session()->flash('alert-danger', "Their is something wrong !!");

                    //Redirect to sign up page
                    return redirect()->back();
                }
            }
        /*}else{
            //Flash Erro Msg
            $request->session()->flash('alert-danger', 'Enter Credentials First !!');

            //Redirect to sign up page
           return view('frontend.chicken'); 
        }  */ 
    } 

    function sign_out(Request $request){
        //Set data accordings to table columns
        $data = array(
            'user_id' => $request->session()->has('id'),
            'status' => 1,
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
        );

        //Insert data in table
        $query = DB::table('tbl_login_activities')
                     ->insertGetId($data);

        //Delete Session
        $request->session()->flush();
        
        //Redirect
        return redirect()->route('userlogin');
    }
    function orderinsert(Request $request)
    {

    }
     function category(Request $request)
    {
       
        $query= DB::table('tbl_categories_for_products')
                     ->select('id','name')
                     ->where('parent_categories',0);
        $result['data'] = $query->get();

        $date = date('Y-m-j');
        $newdate = strtotime ( '+1 day' , strtotime ( $date ) ) ;
        $newdate = date ( 'j' , $newdate );

        $newdate2 = strtotime ( '+2 day' , strtotime ( $date ) ) ;
        $newdate2 = date ( 'j' , $newdate2 );

        $newdate3 = strtotime ( '+3 day' , strtotime ( $date ) ) ;
        $newdate3 = date ( 'j' , $newdate3 );

        $newdate4 = strtotime ( '+4 day' , strtotime ( $date ) ) ;
        $newdate4 = date ( 'j' , $newdate4 );

        $newdate5 = strtotime ( '+5 day' , strtotime ( $date ) ) ;
        $newdate5 = date ( 'j' , $newdate5 );

        $newdate6 = strtotime ( '+6 day' , strtotime ( $date ) ) ;
        $newdate6 = date ( 'j' , $newdate6 );

        $newdate7 = strtotime ( '+7 day' , strtotime ( $date ) ) ;
        $newdate7 = date ( 'j' , $newdate7 );



        $day2 = strtotime ( '+2 day' , strtotime ( $date ) ) ;
        $day2 = date ( 'D' , $day2 );

        $day3 = strtotime ( '+3 day' , strtotime ( $date ) ) ;
        $day3 = date ( 'D' , $day3 );

        $day4 = strtotime ( '+4 day' , strtotime ( $date ) ) ;
        $day4 = date ( 'D' , $day4 );

        $day5 = strtotime ( '+5 day' , strtotime ( $date ) ) ;
        $day5 = date ( 'D' , $day5 );

        $day6 = strtotime ( '+6 day' , strtotime ( $date ) ) ;
        $day6 = date ( 'D' , $day6 );

        $day7 = strtotime ( '+7 day' , strtotime ( $date ) ) ;
        $day7 = date ( 'D' , $day7 );

        return view('frontend.chicken', [
            'data' => $result['data'],
            'newdate' => $newdate,
            'newdate2' => $newdate2,
            'newdate3' => $newdate3,
            'newdate4' => $newdate4,
            'newdate5' => $newdate5,
            'newdate6' => $newdate6,
            'newdate7' => $newdate7,
            'day2' => $day2,
            'day3' => $day3,
            'day4' => $day4,
            'day5' => $day5,
            'day6' => $day6,
            'day7' => $day7,
        ]);


    }
     function getcategory(Request $request, $id)
    {
        /* $query= DB::table('tbl_products')
                     ->LEFTjoin('tbl_product_categories','tbl_products.id', '=', 'tbl_product_categories.product_id')
                     ->select('name','description','regural_price')
                    ->where('tbl_product_categories.category_id', $id);
        $result['data'] = $query->get();
        $ajax_response_data =  array(
            'Error'='false';
            'data' = '';
        );

        $html='';
       if(!empty($result)){
      $html .='<div id="submenu" data-id='.$row->id. '">';
            @foreach($data as $row){
         $html .='  <li class="label-input105" onclick="shows_form_part(4)">
              <a href=' .$row->id. '>'.$row->name.'<br>'.$row->description. '<br>' .$row->regural_price.' <hr></a>
            </li>';
            
            } @endforeach
              
         $html .= '   </li>
            
            </ul>
        
            </div>'; 

        }*/
    }
   
    
}
