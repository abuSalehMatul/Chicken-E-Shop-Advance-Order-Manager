<?php

namespace App\Http\Controllers\Online;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
class UserDashboard extends Controller
{
     function index(Request $request)
    {if(!empty($request->session()->has('id')) && $request->session()->get('role') == 1){
        
            //Necessary Page Data For header Page
            $result = array(
                'page_title' => 'User Dashboard',
                'meta_keywords' => 'user_dashboard',
                'meta_description' => 'user_dashboard',
            );

            //Call Page
            return view('frontend.dashboard', $result);
        }else{
            print_r("<center><h4>Error 404 !!<br> You don't have access of this page<br> Please move back<h4></center>");
        }
    }
}
