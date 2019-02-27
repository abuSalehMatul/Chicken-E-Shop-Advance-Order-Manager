<?php 
use Illuminate\Contracts\View\View;
namespace App\Http\Composers;
use Session;
use DB;

class PanelHeaderComposer{
    function index($view){
        //Query For Getting User data
    	$query = DB::table('tbl_users')
                     ->select('*')
                     ->leftJoin('tbl_store_settings', 'tbl_store_settings.user_id', '=', 'tbl_users.id')
                     ->where('tbl_users.id', session::get('id'));
        $result = $query->first();

        //Return Data
        $view->with('result', $result);
    }
}