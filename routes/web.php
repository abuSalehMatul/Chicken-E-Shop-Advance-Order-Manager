<?php

Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');
	//Admin Panel Routes
	//user route
	Route::get('/', 'CustomerOrderController@index')->name('online');
//	Route::get('/', 'Online\OrderController@category')->name('view');
	Route::get('/edit/{id?}', 'Online\OrderController@category')->name('');
    Route::get('/category/{id?}', 'Online\OrderController@getcategory')->name('getcategory');
    Route::POST('/user/signup', 'Online\OrderController@userinsert')->name('usersignup');
    Route::get('/user/login', 'Online\OrderController@login')->name('userlogin');
    Route::post('/user/validating', 'Online\OrderController@validating_user')->name('User_validation');
    Route::get('/user/sign-out', 'Online\OrderController@sign_out')->name('sign_out');
	
    Route::get('/user/dashboard',  'Online\UserDashboard@index')->name('user_dashboard');
    Route::POST('/user/login', 'Online\Ordercontroller@validating_user')->name('validuser');

	//Admin Auth Routes
  
	Route::get('/user/sign-out', 'Admin\Auth\AuthController@sign_out')->name('sign_out');
	
	Route::get('/user/admin/sign-in', 'Admin\Auth\AuthController@index')->name('admin_sign_in');
	Route::post('/user/admin/validating-credentials', 'Admin\Auth\AuthController@validating_admin_credentials')->name('admin_credentials_validation');

	//Dashboard Route
	Route::get('/user/admin/dashboard', 'Admin\Dashboard\DashboardController@index')->name('admin_dashboard');

	//Ecommerce Section Start
	//Categories Routes
	Route::get('/user/admin/ecommerce/categories/manage', 'Admin\Ecommerce\CategoriesController@index')->name('manage_categories');
	Route::get('/user/admin/ecommerce/categories/add', 'Admin\Ecommerce\CategoriesController@add')->name('add_categories');
	Route::post('/user/admin/ecommerce/categories/insert', 'Admin\Ecommerce\CategoriesController@insert')->name('insert_categories');
	Route::get('/user/admin/ecommerce/categories/edit/{id?}', 'Admin\Ecommerce\CategoriesController@edit')->name('edit_categories');
	Route::post('/user/admin/ecommerce/categories/update/{id?}', 'Admin\Ecommerce\CategoriesController@update')->name('update_categories');
	Route::get('/user/admin/ecommerce/categories/delete/{id?}', 'Admin\Ecommerce\CategoriesController@delete')->name('delete_categories');
	Route::get('/user/admin/ecommerce/categories/search/', 'Admin\Ecommerce\CategoriesController@search')->name('search_categories');

	//Products Routes
	Route::get('/user/admin/ecommerce/products/manage', 'Admin\Ecommerce\ProductsController@index')->name('manage_products');
	Route::get('/user/admin/ecommerce/products/add', 'Admin\Ecommerce\ProductsController@add')->name('add_products');
	Route::post('/user/admin/ecommerce/products/insert', 'Admin\Ecommerce\ProductsController@insert')->name('insert_products');
	Route::get('/user/admin/ecommerce/products/edit/{id?}', 'Admin\Ecommerce\ProductsController@edit')->name('edit_products');
	Route::get('/user/admin/ecommerce/products/images/ajax-delete-image/{id?}', 'Admin\Ecommerce\ProductsController@delete_images')->name('delete_images');
	Route::post('/user/admin/ecommerce/products/update/{id?}', 'Admin\Ecommerce\ProductsController@update')->name('update_products');
	Route::get('/user/admin/ecommerce/products/delete/{id?}', 'Admin\Ecommerce\ProductsController@delete')->name('delete_products');
	Route::get('/user/admin/ecommerce/products/search/', 'Admin\Ecommerce\ProductsController@search')->name('search_products');
	//Ecommerce Section End

	//Order Section Start
	//Order Routes
	Route::get('/user/admin/orders/manage/', 'Admin\Orders\OrdersController@view_orders')->name('manage_seller_orders');
	Route::get('/user/admin/orders/details/{order_no?}', 'Admin\Orders\OrdersController@details')->name('order_details_seller');
	Route::get('/user/admin/orders/search/', 'Admin\Orders\OrdersController@search')->name('search_seller_orders');

	//order route by matul

	Route::get('/allorders', 'Admin\Orders\OrdersController@allorders')->name('allorders');

	//end of order rotue by matul

	//Update Order Status Route
	Route::post('/user/admin/orders/update-order-status/{order_no?}', 'Admin\Orders\OrdersController@update_order_status')->name('update_seller_order_status');
	//Update Payment Status Route
	Route::post('/user/admin/orders/update-payment-status/{order_no?}', 'Admin\Orders\OrdersController@update_payment_status')->name('update_seller_payment_status');
	//Order Section End

	//Setting Section Start
	//Profile Settings Routes
	Route::get('/user/admin/settings/profile/edit/', 'Admin\Settings\ProfileController@edit')->name('admin_profile_settings');
	Route::post('/user/admin/settings/profile/update/', 'Admin\Settings\ProfileController@update')->name('update_admin_profile_settings');

	//Store Settings Routes
	Route::get('/user/admin/settings/store/edit/', 'Admin\Settings\StoreController@edit')->name('edit_store_setting');
	Route::get('/user/admin/settings/store/countries-list/', 'Admin\Settings\StoreController@countries_list')->name('countries_list');
	Route::get('/user/admin/settings/store/cities-list/{id?}', 'Admin\Settings\StoreController@cities_list');
	Route::post('/user/admin/settings/store/update/', 'Admin\Settings\StoreController@update')->name('update');

	//Setting Section End

	//Payment Section Start
	//Invoices Routes
	Route::get('/user/admin/payments/invoices/manage/', 'Admin\Payments\InvoicesController@index')->name('manage_admin_invoices');
	Route::get('/user/admin/payments/invoices/details/{order_no?}', 'Admin\Payments\InvoicesController@details')->name('manage_admin_invoices_details');
	//Payment Section End

	// product 
	Route::get('fetchproduct','Admin\Ecommerce\ProductsController@fetchproduct');


	Route::get('product/variation/{id}','Admin\Ecommerce\ProductsController@fetch_variation');


	Route::get('fetchvariation','Admin\Ecommerce\ProductsController@fetchvariation');
	
	Route::get('fetchproductdata','Admin\Ecommerce\ProductsController@fetchproductdata');


	Route::get('storeorder','Admin\Ecommerce\ProductsController@storeorder');

	Route::get('/user/admin/ecommerce/orders/detail/{id?}', 'Admin\Orders\OrdersController@detail')->name('detail');




// order by mtf...............................
//matul order route ..............
Route::get('/makeorder', 'CustomerOrderController@index');
Route::get('/ordercheckout', 'CustomerOrderController@checkout');
Route::get('/orderitem', 'CustomerOrderController@item');
Route::get('/pickup', 'CustomerOrderController@pickup')->name('pickup');
Route::get('/pickupchangedesign', 'CustomerOrderController@pickupchangedesign')->name('pickupchangedesign');
Route::get('/mapsection','CustomerOrderController@mapsection');
Route::get('/loginpagestart', 'CustomerOrderController@loginpagestart');
Route::get('/selectedProduct/{id}', 'CustomerOrderController@selectedProduct');
Route::get('/addtocart', 'cartController@addtocart');
Route::get('/setshop', 'CustomerOrderController@setshop');
Route::get('/selected_time', 'CustomerOrderController@selected_time');
Route::get('/addtocartreload', 'cartController@addtocartreload');
Route::get('/addtocartreloadcheckout', 'cartController@addtocartreloadcheckout');
Route::get('/delcart/{id}', 'cartController@delcart')->name('delcart');
Route::get('/profile', 'CustomerOrderController@profile');
Route::get('//logoutcustomer','CustomerOrderController@logoutcustomer');
Route::get('/tipset', 'cartController@tipset');
Route::get('/completeorder', 'CustomerOrderController@completeorder');
Route::get('/create_account','userController@register');
Route::post('/create_account', 'userController@create');
Route::post('/logincustomer', 'userController@logincustomer');
//tushar route
Route::get('/tusharorder',function(){
	return view('order/loginStart');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


