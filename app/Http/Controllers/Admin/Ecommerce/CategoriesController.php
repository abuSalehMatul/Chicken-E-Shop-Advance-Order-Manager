<?php
namespace App\Http\Controllers\Admin\Ecommerce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;

class CategoriesController extends Controller{
	function index(Request $request){
    	if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
        	//Header Data
	    	$result = array(
	            'page_title' => 'Manage Categories',
	            'meta_keywords' => 'manage_categories',
	            'meta_description' => 'manage_categories',
	        );

	    	//Query for Getting Data
	    	$query = DB::table('tbl_categories_for_products')
	    	             ->select('id', 'name', 'status')
	    	             ->where('user_id', $request->session()->get('id'))
	    	             ->orderBy('id', 'DESC');
     		$result['query'] = $query->paginate(8);
     		$result['total_records'] = $result['query']->count();

	        //call page
	        return view('admin.ecommerce.categories.manage', $result); 
        }else{
        	print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
    	}
    }

    function add(Request $request){
    	if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
        	//Header Data
	    	$result = array(
	            'page_title' => 'Add Categories',
	            'meta_keywords' => 'add_categories',
	            'meta_description' => 'add_categories',
	        );

	    	//Query For Getting Categories
	        $query = DB::table('tbl_categories_for_products')
	        			 ->select('id', 'name')
	        			 ->where('user_id', $request->session()->get('id'))
	        			 ->orderBy('id', 'DESC');
		 	$result['parent_categories'] = $query->get();

	        //call page
	        return view('admin.ecommerce.categories.add', $result); 
        }else{
        	print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
    	}
    }

    function insert(Request $request){
    	if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $request->input('name'))){
	    	//Get All Inputs
        	$user_id = $request->session()->get('id');
        	$ip_address = $request->ip();
            $name = $request->input('name', 'unnamed');
        	$slug = $request->input('slug', 'unnamed');
        	if(!empty($request->input('parent_categories'))){
            	$parent_categories = implode(',', $request->input('parent_categories'));
            }else{
            	$parent_categories = 0;
            }
            $meta_keywords = $request->input('meta_keywords', 'unnamed');
            $meta_description = $request->input('meta_description', 'unnamed');
            $status = $request->input('status', '0');
            $created_date = date('Y-m-d');
            $created_time = date('H:i:s');

	        //Inputs Validation
	        $input_validations = $request->validate([
	            'name' => 'nullable|unique:tbl_categories_for_products',
	            'slug' => 'nullable|unique:tbl_categories_for_products',
	            'parent_categories' => 'nullable',
	            'meta_keywords' => 'nullable',
	            'meta_description' => 'nullable',
	            'status' => 'nullable',
	        ]);

	        //Set Field data according to table column
	        $data = array(
	        	'user_id' => $user_id,
	        	'parent_categories' => $parent_categories,
	            'name' => $name,
	        	'slug' => $slug,
	        	'meta_keywords' => $meta_keywords,
	        	'meta_description' => $meta_description,
	            'status' => $status,
	            'created_date' => $created_date,
	        	'created_time' => $created_time,
	        );

	        //Query For Inserting Data
	    	$query = DB::table('tbl_categories_for_products')
	    	             ->insertGetId($data);

	     	//Check either data inserted or not
	     	if(!empty($query)){
	     		//Flash Success Message
	     		$request->session()->flash('alert-success', 'Category has been added successfully');
	     	}else{
	     		//Flash Error Message
	     		$request->session()->flash('alert-danger', 'Something went wrong !!');
	     	}

	     	//Redirect 
	     	return redirect()->route('add_categories');
	    }else{
    		print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
    	}
	}

	function edit(Request $request, $id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
        	//Header Data
	    	$result = array(
	            'page_title' => 'Edit Categories',
	            'meta_keywords' => 'edit_categories',
	            'meta_description' => 'edit_categories',
	        );

	    	//Query for Getting Data
	    	$query = DB::table('tbl_categories_for_products')
	    	             ->select('*')
	    	             ->where('user_id', $request->session()->get('id'))
	    	             ->where('id', $id);
         	$result['query'] = $query->first();
         	
         	//Query for Getting Categories
     		$query = DB::table('tbl_categories_for_products')
	        			 ->select('id', 'name')
	        			 ->where('user_id', $request->session()->get('id'))
	        			 ->orderBy('id', 'DESC');
		 	$result['parent_categories'] = $query->get();

         	if(!empty($result['query'])){
         		//explode parent categories of this category
         		$result['query_categories'] = explode(',', $result['query']->parent_categories);

		        //call page
		        return view('admin.ecommerce.categories.edit', $result); 
	    	}else{
	    		print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
	    	}
        }else{
        	print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
    	}
	}

	function update(Request $request, $id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
			//Get All Inputs
        	$user_id = $request->session()->get('id');
            $name = $request->input('name', 'unnamed');
        	$slug = $request->input('slug', 'unnamed');

        	if(empty($request->input('parent_categories'))){
        		$parent_categories = $request->input('parent_categories');
        	}else{
        		$parent_categories = 0;
        	}

        	$meta_keywords = $request->input('meta_keywords', 'unnamed');
            $meta_description = $request->input('meta_description', 'unnamed');
            $status = $request->input('status', '0');
            $created_date = date('Y-m-d');
            $created_time = date('H:i:s');

	        //Inputs Validation
	        $input_validations = $request->validate([
	            'name' => 'nullable|unique:tbl_categories_for_products,id,'.$id,
	            'slug' => 'nullable|unique:tbl_categories_for_products,id,'.$id,
	            'parent_categories' => 'nullable',
	            'meta_keywords' => 'nullable',
	            'meta_description' => 'nullable',
	            'status' => 'nullable',
	        ]);

	        //Set Field data according to table column
	        $data = array(
	        	'user_id' => $user_id,
	        	'parent_categories' => $parent_categories,
	            'name' => $name,
	        	'slug' => $slug,
	        	'meta_keywords' => $meta_keywords,
	        	'meta_description' => $meta_description,
	            'status' => $status,
	            'created_date' => $created_date,
	        	'created_time' => $created_time,
	        );
	        
	        //Query For Updating Data
	    	$query = DB::table('tbl_categories_for_products')
	    	             ->where('id', $id)
	    	             ->where('user_id', $request->session()->get('id'))
	    	             ->update($data);

	     	//Check either data updated or not
	     	if(!empty($query)){
	     		//Flash Success Message
	     		$request->session()->flash('alert-success', 'Category has been updated successfully');
	     	}else{
	     		//Flash Error Message
	     		$request->session()->flash('alert-danger', 'Something went wrong !!');
	     	}

	     	//Redirect 
	     	return redirect()->route('edit_categories', $id);
		}else{
        	print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
    	}
	}

	function delete(Request $request, $id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
			//Query For Deleting Data
			$query = DB::table('tbl_categories_for_products')
			             ->where('id', $id)
			             ->where('user_id', $request->session()->get('id'))
			             ->delete();

         	//Check either data deleted or not
	     	if(!empty($query)){
	     		//Flash Success Message
	     		$request->session()->flash('alert-success', 'Category has been deleted successfully');
	     	}else{
	     		//Flash Error Message
	     		$request->session()->flash('alert-danger', 'Something went wrong !!');
	     	}

	     	//Redirect 
	     	return redirect()->route('manage_categories');
		}else{
        	print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
    	}
	}

	function search(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Necessary Page Data For header Page
	        $result = array(
	            'page_title' => 'Search Records',
	            'meta_keywords' => 'search_records',
	            'meta_description' => 'search_records',
	        ); 

			//Get All Inputs
			$name = $request->input('name');
			$status = $request->input('status');

			//Query For Getting Search Data
			$query = DB::table('tbl_categories_for_products')
	                     ->select('*')
	                     ->where('name', 'Like', '%'. $name .'%')
	                     ->where('status', $status)
	                     ->where('user_id', $request->session()->get('id'))
	                     ->orderBy('id', 'DESC');
	        $result['query'] = $query->paginate(8);
     		$result['total_records'] = $result['query']->count();

	        //call page
	 		return view('admin.ecommerce.categories.manage', $result); 
 		}else{
        	print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
    	}
	}
}