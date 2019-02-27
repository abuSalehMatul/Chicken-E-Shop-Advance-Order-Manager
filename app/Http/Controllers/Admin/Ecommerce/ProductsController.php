<?php
namespace App\Http\Controllers\Admin\Ecommerce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
use App\FetchProduct;

class ProductsController extends Controller{
	function index(Request $request){
        if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
            //Header Data
            $result = array(
                'page_title' => 'Manage Products',
                'meta_keywords' => 'manage_products',
                'meta_description' => 'manage_products',
            );

            //Query For Getting Tags
            $query = DB::table('tbl_products')
                         ->select('id', 'featured_image', 'name', 'status')
                         ->where('user_id', $request->session()->get('id'))
                         ->orderBy('id', 'DESC');
            $result['query'] = $query->paginate(8);
            $result['total_records'] = $result['query']->count();

            //call page
            return view('admin.ecommerce.products.manage', $result); 
        }else{
            print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
        }
    }

    function add(Request $request){
    	if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
        	//Header Data
	    	$result = array(
	            'page_title' => 'Add Products',
	            'meta_keywords' => 'add_products',
	            'meta_description' => 'add_products',
	        );

            //Query For Getting Categories
            $query = DB::table('tbl_categories_for_products')
                         ->select('id', 'name', 'status')
                         ->where('status', 0)
                         ->where('user_id', $request->session()->get('id'))
                         ->orderBy('id', 'DESC');
            $result['categories'] = $query->get();

	        //call page
	        return view('admin.ecommerce.products.add', $result); 
        }else{
        	print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
    	}
    }


    function insert(Request $request){

    	if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
    		//Get All Inputs
        	$user_id = $request->session()->get('id');
            $name = $request->input('name', '');
            $slug = $request->input('slug', '');
            $regural_price = $request->input('regural_price');
            if(!empty($request->input('sale_price'))){
                $sale_price = $request->input('sale_price');
            }else{
                $sale_price = '';    
            }
            if(!empty($request->input('details'))){
                $details = $request->input('details');
            }else{
                $details = 'unnamed';
            }
            $variation = $request->input('variation');
            $on_sale = $request->input('on_sale', '1');
            $status = $request->input('status', '1');
            $stock = $request->input('stock', '0');
            $brands = $request->input('brands', '0');
            $categories = $request->input('categories');
            $product_images = $request->file('product_images');
            $featured_image = $request->file('featured_image');
            $meta_keywords = $request->input('meta_keywords');
            $meta_description = $request->input('meta_description');
        	$created_date = date('Y-m-d');
            $created_time = date('H:i:s');

        	//Inputs Validation
	        $input_validations = $request->validate([
	            'name' => 'nullable|unique:tbl_products',
	            'slug' => 'nullable|unique:tbl_products',
	            'regural_price' => 'nullable',
                'variation' => 'nullable',
	            'sale_price' => 'nullable',
	            'details' => 'nullable',
	            'on_sale' => 'nullable',
	            'status' => 'nullable',
	            'stock' => 'nullable',
	            'brands' => 'nullable',
	            'categories' => 'nullable',
	            'product_images' => 'nullable',
	            'featured_image' => 'nullable',
	            'meta_keywords' => 'nullable',
	            'meta_description' => 'nullable',
            ]);

            if(!empty($featured_image)){
                //Upload Product Featured Image
                $p_f_image = time().'.'.$featured_image->guessExtension();
                $p_f_image_path = $featured_image->move(public_path().'/assets/admin/images/ecommerce/products/', $p_f_image);

    	        //Set Field data according to table zcolumns
                $data = array(
                    'user_id' => $user_id,
                    'featured_image' => $p_f_image,
                    'name' => $name,
                    'slug' => $slug,
                    'description' => $details,
                    'regural_price' => $regural_price,
                    'variation' => $variation,
                    'sale_price' => $sale_price,
                    'on_sale' => $on_sale,
                    'status' => $status,
                    'created_date' => $created_date,
                    'created_time' => $created_time,
                );

                //Query For Inserting Data
                $product_id = DB::table('tbl_products')
                             ->insertGetId($data);
            }else{
                //Set Field data according to table columns
                $data = array(
                    'user_id' => $user_id,
                    'featured_image' => '',
                    'name' => $name,
                    'slug' => $slug,
                    'description' => $details,
                    'regural_price' => $regural_price,
                    'variation' => $request->variation,
                    'sale_price' => $sale_price,
                    'on_sale' => $on_sale,
                    'status' => $status,
                    'created_date' => $created_date,
                    'created_time' => $created_time,
                );

                //Query For Inserting Data
                $product_id = DB::table('tbl_products')
                             ->insertGetId($data);
            }

           
            
            if(!empty($categories)){
                //Insert Multi Categories
                foreach($categories as $row){
                    //Set Field data according to table columns
                    $data = array(
                        
                        'user_id' => $user_id,
                        'product_id' => $product_id,
                        'category_id' => $row,
                    );

                    //Query For Inserting Data
                    $category_id = DB::table('tbl_product_categories')
                                 ->insertGetId($data);
                }  
            }

            if(!empty($product_images)){
                //Insert Multi Images
                foreach($product_images as $row){
                    //Upload Product Image
                    $p_images = uniqid().'.'.$row->guessExtension();
                    $p_images_path = $row->move(public_path().'/assets/admin/images/ecommerce/products/', $p_images);

                    //Set Field data according to table columns
                    $data = array(
                        
                        'user_id' => $user_id,
                        'product_id' => $product_id,
                        'image' => $p_images,
                    );

                    //Query For Inserting Data
                    $image_id = DB::table('tbl_products_images')
                                 ->insertGetId($data);
                }
            }

            if(!empty($meta_keywords && $meta_description)){
                //Set Field data according to table columns
                $data = array(
                    
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'meta_keywords' => $meta_keywords,
                    'meta_description' => $meta_description,
                );

                //Query For Inserting Data
                $seo_options_id = DB::table('tbl_products_seo_options')
                             ->insertGetId($data);
            }elseif(!empty($meta_keywords)){
                //Set Field data according to table columns
                $data = array(
                    
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'meta_keywords' => $meta_keywords,
                    'meta_description' => 'unnamed',
                );

                //Query For Inserting Data
                $seo_options_id = DB::table('tbl_products_seo_options')
                             ->insertGetId($data);
            }elseif(!empty($meta_description)){
                //Set Field data according to table columns
                $data = array(
                    
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'meta_keywords' => 'unnamed',
                    'meta_description' => $meta_description,
                );

                //Query For Inserting Data
                $seo_options_id = DB::table('tbl_products_seo_options')
                             ->insertGetId($data);
            }else{
                //Set Field data according to table columns
                $data = array(
                    
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'meta_keywords' => 'unnamed',
                    'meta_description' => 'unnamed',
                );

                //Query For Inserting Data
                $seo_options_id = DB::table('tbl_products_seo_options')
                             ->insertGetId($data);
            }

            if(!empty($seo_options_id)){
                //Flash Erro Msg
                $request->session()->flash('alert-success', 'Product has been added successfully');
            }else{
                //Flash Erro Msg
                $request->session()->flash('alert-error', 'Something went wrong !!');
            }

            //Redirect
            return redirect()->route('add_products');

        }else{
        	print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
    	}
    }

    function edit(Request $request, $id){
        if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
            //Header Data
            $result = array(
                'page_title' => 'Edit Products',
                'meta_keywords' => 'edit_products',
                'meta_description' => 'edit_products',
            );

            //Query For Getting this Product details
            $query = DB::table('tbl_products')
                         ->select('*')
                         ->where('user_id', $request->session()->get('id'))
                         ->where('id', $id);
            $result['query_product'] = $query->first();

          


            //Query For Getting Categories of this Product
            $query = DB::table('tbl_product_categories')
                         ->select('tbl_product_categories.product_id', 'tbl_product_categories.category_id', 'tbl_categories_for_products.id', 'tbl_categories_for_products.name')
                         ->leftJoin('tbl_categories_for_products', 'tbl_categories_for_products.id', '=', 'tbl_product_categories.category_id')
                         ->where('tbl_product_categories.user_id', $request->session()->get('id'))
                         ->where('tbl_product_categories.product_id', $id);
            $result['query_categories'] = $query->get();

            //Query For Getting Images of this Product
            $query = DB::table('tbl_products_images')
                         ->select('*')
                         ->where('product_id', $id);
            $result['query_images'] = $query->get();

            //Query For Getting Seo data of this Product
            $query = DB::table('tbl_products_seo_options')
                         ->select('*')
                         ->where('product_id', $id);
            $result['query_seo'] = $query->first();

            

            //Query For Getting Categories
            $query = DB::table('tbl_categories_for_products')
                         ->select('id', 'name', 'status')
                         ->where('user_id', $request->session()->get('id'))
                         ->where('status', 0)
                         ->orderBy('id', 'DESC');
            $result['categories'] = $query->get();

            if(!empty($result['query_product'])){
                //call page
                return view('admin.ecommerce.products.edit', $result); 
            }else{
                print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
            }
        }else{
            print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
        }
    }

    function delete_images(Request $request, $id){
        if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
            //initializing Generate data variables
            $ajax_response_data = array(
                'ERROR' => 'FALSE',
                'DATA' => '',
            );

            //Query For Deleting Image 
            $query = DB::table('tbl_products_images')
                         ->where('user_id', $request->session()->get('id'))
                         ->where('id', $id)
                         ->delete();

            //check either image is deleted or not
            if(!empty($query)){
                $ajax_response_data = array(
                    'ERROR' => 'FALSE',
                    'DATA' => 'Image has been deleted successfully',
                );
                echo json_encode($ajax_response_data);
            }else{
                $ajax_response_data = array(
                    'ERROR' => 'TRUE',
                    'DATA' => "Something wen't wrong",
                );
                echo json_encode($ajax_response_data); 
            }
            die;
        }else{
            print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
        }
    }

    function update(Request $request, $id){
        if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
            //Get All Inputs
            $user_id = $request->session()->get('id');
            $ip_address = $request->ip();
            $name = $request->input('name', '');
            $slug = $request->input('slug', '');
            $regural_price = $request->input('regural_price');
            if(!empty($request->input('sale_price'))){
                $sale_price = $request->input('sale_price');
            }else{
                $sale_price = '';    
            }
            if(!empty($request->input('details'))){
                $details = $request->input('details');
            }else{
                $details = 'unnamed';
            }
            $variation = $request->input('variation');
            $on_sale = $request->input('on_sale', '1');
            $status = $request->input('status', '1');
            $stock = $request->input('stock', '0');
            $brands = $request->input('brands', '0');
            $categories = $request->input('categories');
            $product_images = $request->file('product_images');
            $featured_image = $request->file('featured_image');
            $meta_keywords = $request->input('meta_keywords');
            $meta_description = $request->input('meta_description');
            $created_date = date('Y-m-d');
            $created_time = date('H:i:s');

            //Inputs Validation
            $input_validations = $request->validate([
                'name' => 'nullable|unique:tbl_products,id,'.$id,
                'slug' => 'nullable|unique:tbl_products,id,'.$id,
                'regural_price' => 'nullable',
                'variation' => 'nullable',
                'sale_price' => 'nullable',
                'details' => 'nullable',
                'status' => 'nullable',
                'stock' => 'nullable',
                'brands' => 'nullable',
                'categories' => 'nullable',
                'product_images' => 'nullable',
                'featured_image' => 'nullable',
                'meta_keywords' => 'nullable',
                'meta_description' => 'nullable',
            ]);

            if(!empty($featured_image)){
                //Upload Product Featured Image
                $p_f_image = time().'.'.$featured_image->guessExtension();
                $p_f_image_path = $featured_image->move(public_path().'/assets/admin/images/ecommerce/products/', $p_f_image);

                //Set Field data according to table columns
                $data = array(
                    
                    'user_id' => $user_id,
                    'featured_image' => $p_f_image,
                    'name' => $name,
                    'slug' => $slug,
                    'description' => $details,
                    'regural_price' => $regural_price,
                    'variation' => $variation,
                    'sale_price' => $sale_price,
                    'on_sale' => $on_sale,
                    'status' => $status,
                    'created_date' => $created_date,
                    'created_time' => $created_time,
                );

                //Query For Updating Data
                $product_id = DB::table('tbl_products')
                             ->where('id', $id)
                             ->where('user_id', $request->session()->get('id'))
                             ->update($data);
            }else{
                //Set Field data according to table columns
                $data = array(
                    
                    'user_id' => $user_id,
                    'name' => $name,
                    'slug' => $slug,
                    'description' => $details,
                    'regural_price' => $regural_price,
                     'variation' => $variation,
                    'sale_price' => $sale_price,
                    'on_sale' => $on_sale,
                    'status' => $status,
                    'created_date' => $created_date,
                    'created_time' => $created_time,
                );

                //Query For Updating Data
                $product_id = DB::table('tbl_products')
                             ->where('id', $id)
                             ->where('user_id', $request->session()->get('id'))
                             ->update($data);
            }

           
            

            //Deleting current categories of this product
            $query = DB::table('tbl_product_categories')
                         ->where('product_id', $id)
                         ->where('user_id', $request->session()->get('id'))
                         ->delete();

            if(!empty($categories)){
                //Insert Multi Categories
                foreach($categories as $row){
                    //Set Field data according to table columns
                    $data = array(
                        
                        'user_id' => $user_id,
                        'product_id' => $id,
                        'category_id' => $row,
                    );

                    //Query For Inserting Data
                    $category_id = DB::table('tbl_product_categories')
                                 ->insertGetId($data);
                }  
            }

            if(!empty($product_images)){
                //Insert Multi Images
                foreach($product_images as $row){
                    //Upload Product Image
                    $p_images = uniqid().'.'.$row->guessExtension();
                    $p_images_path = $row->move(public_path().'/assets/admin/images/ecommerce/products/', $p_images);

                    //Set Field data according to table columns
                    $data = array(
                        
                        'user_id' => $user_id,
                        'product_id' => $id,
                        'image' => $p_images,
                    );

                    //Query For Inserting Data
                    $image_id = DB::table('tbl_products_images')
                                 ->insertGetId($data);
                }
            }

            if(!empty($meta_keywords && $meta_description)){
                //Set Field data according to table columns
                $data = array(
                    
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'meta_keywords' => $meta_keywords,
                    'meta_description' => $meta_description,
                );

                //Query For Updating Data
                $seo_options_id = DB::table('tbl_products_seo_options')
                                      ->where('id', $id)
                                      ->where('user_id', $request->session()->get('id'))
                                      ->update($data);
            }elseif(!empty($meta_keywords)){
                //Set Field data according to table columns
                $data = array(
                    
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'meta_keywords' => $meta_keywords,
                    'meta_description' => 'unnamed',
                );

                //Query For Updating Data
                $seo_options_id = DB::table('tbl_products_seo_options')
                                      ->where('id', $id)
                                      ->where('user_id', $request->session()->get('id'))
                                      ->update($data);
            }elseif(!empty($meta_description)){
                //Set Field data according to table columns
                $data = array(
                    
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'meta_keywords' => 'unnamed',
                    'meta_description' => $meta_description,
                );

                //Query For Updating Data
                $seo_options_id = DB::table('tbl_products_seo_options')
                                      ->where('id', $id)
                                      ->where('user_id', $request->session()->get('id'))
                                      ->update($data);
            }else{
                //Set Field data according to table columns
                $data = array(
                    
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'meta_keywords' => 'unnamed',
                    'meta_description' => 'unnamed',
                );

                //Query For Updating Data
                $seo_options_id = DB::table('tbl_products_seo_options')
                                      ->where('id', $id)
                                      ->where('user_id', $request->session()->get('id'))
                                      ->update($data);
            }

            if(!empty($seo_options_id == 0)){
                //Flash Erro Msg
                $request->session()->flash('alert-success', 'Product has been updated successfully');
            }else{
                //Flash Erro Msg
                $request->session()->flash('alert-error', 'Something went wrong !!');
            }

            //Redirect
            return redirect()->route('edit_products', $id);

        }else{
            print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
        }
    }

    function delete(Request $request, $id){
        if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
            //Query For Deleting details of this product
            $p_id = DB::table('tbl_products')
                         ->where('id', $id)
                         ->where('user_id', $request->session()->get('id'))
                         ->delete();

            
            //Query for Deleting categories of this product
            $c_id = DB::table('tbl_product_categories')
                         ->where('product_id', $id)
                         ->where('user_id', $request->session()->get('id'))
                         ->delete();

            //Query for Deleting images of this product
            $i_id = DB::table('tbl_products_images')
                         ->where('product_id', $id)
                         ->where('user_id', $request->session()->get('id'))
                         ->delete();

            //Query for Deleting seo options of this product
            $seo_id = DB::table('tbl_products_seo_options')
                         ->where('product_id', $id)
                         ->where('user_id', $request->session()->get('id'))
                         ->delete();

            if($seo_id){
                //Flash Erro Msg
                $request->session()->flash('alert-success', 'Product has been deleted successfully');
            }else{
                //Flash Erro Msg
                $request->session()->flash('alert-error', 'Something went wrong !!');
            }

            //Redirect
            return redirect()->route('manage_products');
        }else{
            print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
        }             
    }

    function search(Request $request){
        if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
            //Header Data
            $result = array(
                'page_title' => 'Search Records',
                'meta_keywords' => 'search_records',
                'meta_description' => 'search_records',
            ); 

            //Get All Inputs
            $name = $request->input('name');
            $status = $request->input('status');
            
            //Query For Getting Search Data
            $query = DB::table('tbl_products')
                         ->select('id', 'featured_image', 'name', 'status')
                         ->where('name', 'Like', '%'. $name .'%')
                         ->where('slug', 'Like', '%'. $name .'%')
                         ->where('status', $status)
                         ->where('user_id', $request->session()->get('id'))
                         ->orderBy('id', 'DESC');
            $result['query'] = $query->paginate(8);
            $result['total_records'] = $result['query']->count();

            //call page
            return view('admin.ecommerce.products.manage', $result); 
        }else{
            print_r("<center><h4>Error 404 !!<br> You don't have accees of this page<br> Please move back<h4></center>");
        }
    }


    public function fetchproduct(Request $request)
    {
        $arr = [];
        
        $users = DB::table('tbl_product_categories')
            ->join('tbl_categories_for_products', 'tbl_product_categories.category_id', '=', 'tbl_categories_for_products.id')
            ->join('tbl_products', 'tbl_product_categories.product_id', '=', 'tbl_products.id')
            ->select('tbl_product_categories.*', 'tbl_products.*', 'tbl_categories_for_products.id')
            ->where('tbl_product_categories.category_id','=',$request->id)
            ->get();

        $i = 0;
        foreach($users as $row)
        {
            $arr[$i] = $row;
            $i++;
        }

        echo json_encode($arr);

    }

    public function fetchvariation(Request $request){
        $query = DB::table('tbl_products')
                        ->select('variation','id')
                        ->where('id',$request->id);
        $result1 = $query->first();

        //initializing Generate data variables
        $ajax_response_data = array(
            'DATA' => '',
            'Id' => '',
        );

        $result = explode(',', $result1->variation);

        foreach($result as $row){
            $variation[] = '
                <label class="radio-inline varradio">
                    <input type="radio" name="val" class="varcheck" value="'.$row.'">'.$row.'
                    <input type="hidden" class="productId" value="'.$request->id.'">
                </label>
            ';
        }

        $ajax_response_data = array(
            'DATA' => $variation,
            'Id' => $request->id,
        );
        echo json_encode($ajax_response_data); die;

    }

    public function fetchproductdata(Request $request)
    {
        $query =  DB::table('tbl_products')
                        ->where('id',$request->id);

        $result1 = $query->get();

        return $result1;
    }

    public function storeorder(Request $request)
    {
        $number = mt_rand(1000000, 9999999);

        for($x=0; $x < sizeof($request->productid); $x++)
        {
            $data = array(
                'buyer_id' => $request->session()->get('id'),
                'product_id' => $request->productid[$x],
                'quantity' => $request->qty[$x],
                'order_no' => $number,
                'status' => '1',
                'product_amount' => $request->total,
                'ordered_date' => date('Y-m-d'),
                'ordered_time' => date('h:i:s'),
            );

            $query = DB::table('tbl_orders')
                         ->insert($data);
                         
            echo json_encode('CheckOut'); die;
        }
    }



}