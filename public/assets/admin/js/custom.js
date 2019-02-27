$(document).ready(function(){
	//give sale price input
	$(document).on('change', '#on_sale', function(){
		value = $(this).val();
		$('#sale_price').empty();
		if(value == 0){
			$('#sale_price').append('<label class="label-control">Product Sale Price</label><input type="text" id="sale_price" name="sale_price" class="form-control" placeholder="Product Sale Price">');
		}
	});

	//Multi Images Preview Start
        $(document).on('change', '#multi_image', function(e){
        	e.preventDefault();
        	if(window.File && window.FileList && window.FileReader){
	            var files = e.target.files,
	            filesLength = files.length;
	            for(var i = 0; i < filesLength; i++){
	                var f = files[i]
	                var fileReader = new FileReader();
	                fileReader.onload = (function(e){
	                    var file = e.target;
	                    $('#preview_images').append("<span class='pip'>" 
	                    	+"<img src= "+e.target.result+" alt='Product Images' style='width:184px; height:100px'/>"
	                    	+"<span class='remove'>Remove</span>"
	                    	+"</span>");
	                    $(".remove").click(function(){
	                        $(this).parent("").remove();
	                    });
	                });
	                fileReader.readAsDataURL(f);
	            }
        	}
        })
	//Multi Images Preview End

	//Single Image Preview Start
		$(document).on('change', '#image1', function(e){
			e.preventDefault();
			if(window.File && window.FileList && window.FileReader){
	            var files = e.target.files,
	            filesLength = files.length;
	            for(var i = 0; i < filesLength; i++){
	                var f = files[i]
	                var fileReader = new FileReader();
	                fileReader.onload = (function(e){
	                    var file = e.target;
	                    $('#preview_image1').attr('src', e.target.result);
	                });
	                fileReader.readAsDataURL(f);
	            }
        	}
		})

		$(document).on('change', '#image2', function(e){
			e.preventDefault();
			if(window.File && window.FileList && window.FileReader){
	            var files = e.target.files,
	            filesLength = files.length;
	            for(var i = 0; i < filesLength; i++){
	                var f = files[i]
	                var fileReader = new FileReader();
	                fileReader.onload = (function(e){
	                    var file = e.target;
	                    $('#preview_image2').attr('src', e.target.result);
	                });
	                fileReader.readAsDataURL(f);
	            }
        	}
		})

		$(document).on('change', '#image3', function(e){
			e.preventDefault();
			if(window.File && window.FileList && window.FileReader){
	            var files = e.target.files,
	            filesLength = files.length;
	            for(var i = 0; i < filesLength; i++){
	                var f = files[i]
	                var fileReader = new FileReader();
	                fileReader.onload = (function(e){
	                    var file = e.target;
	                    $('#preview_image3').attr('src', e.target.result);
	                });
	                fileReader.readAsDataURL(f);
	            }
        	}
		})
	//Single Image Preview End
		
	//Filter Section Start
		//Show Filter
		$(document).on('click', '#add_filter', function(){
            var current_url = $('#search_url').val();
            if(window.location.pathname.split('user')[1] == '/admin/orders/manage'){
            	$('#filter_section').append('<br><form action='+current_url+' method="get">'
					+'<div class="row"><div class="col-md-1"></div><div class="col-md-2">'
					+'<input type="text" id="order_no" name="order_no" class="form-control" placeholder="Order NO# or Customer Name"></div>'
					+'<div class="col-md-2"><select id="payment_type" name="payment_type" class="custom-select block multi_select">'
					+'<option value="0">Paypal</option><option value="1">Stripe</option><option value="2">Bank Transaction</option><option value="3">Cash on delivery</option></select>'
					+'</div>'
					+'<div class="col-md-2"><select id="order_status" name="order_status" class="custom-select block multi_select">'
					+'<option value="0">Delivered</option><option value="1">Active</option><option value="2">In Process</option><option value="3">Rejected</option></select>'
					+'</div>'
					+'<div class="col-md-2"><select id="payment_status" name="payment_status" class="custom-select block multi_select">'
					+'<option value="0">Paid</option><option value="1">Unpaid</option></select>'
					+'</div>'
					+'<div class="col-md-2"><input type="date" id="order_date" name="order_date" class="form-control"></div>'
					+'<div class="col-md-1"><button type="submit" class="btn btn-primary">'
					+'<i class="ft-search"></i></button></div></div>'
					+'</form>');
				$('#add_filter').remove();
				$('#filter_button').append('<a href="javascript::void(0)" id="remove_filter"> X</a>');
            }else if(window.location.pathname.split('user')[1] == '/admin/orders/search'){
            	$('#filter_section').append('<br><form action='+current_url+' method="get">'
					+'<div class="row"><div class="col-md-1"></div><div class="col-md-2">'
					+'<input type="text" id="order_no" name="order_no" class="form-control" placeholder="Order NO# or Customer Name"></div>'
					+'<div class="col-md-2"><select id="payment_type" name="payment_type" class="custom-select block multi_select">'
					+'<option value="0">Paypal</option><option value="1">Stripe</option><option value="2">Bank Transaction</option><option value="3">Cash on delivery</option></select>'
					+'</div>'
					+'<div class="col-md-2"><select id="order_status" name="order_status" class="custom-select block multi_select">'
					+'<option value="0">Delivered</option><option value="1">Active</option><option value="2">In Process</option><option value="3">Rejected</option></select>'
					+'</div>'
					+'<div class="col-md-2"><select id="payment_status" name="payment_status" class="custom-select block multi_select">'
					+'<option value="0">Paid</option><option value="1">Unpaid</option></select>'
					+'</div>'
					+'<div class="col-md-2"><input type="date" id="order_date" name="order_date" class="form-control"></div>'
					+'<div class="col-md-1"><button type="submit" class="btn btn-primary">'
					+'<i class="ft-search"></i></button></div></div>'
					+'</form>');
				$('#add_filter').remove();
				$('#filter_button').append('<a href="javascript::void(0)" id="remove_filter"> X</a>');
            }else if(window.location.pathname.split('user')[1] == '/orders/manage'){
            	$('#filter_section').append('<br><form action='+current_url+' method="get">'
					+'<div class="row"><div class="col-md-1"></div><div class="col-md-2">'
					+'<input type="text" id="order_no" name="order_no" class="form-control" placeholder="Order NO#"></div>'
					+'<div class="col-md-2"><select id="payment_type" name="payment_type" class="custom-select block multi_select">'
					+'<option value="0">Paypal</option><option value="1">Stripe</option><option value="2">Bank Transaction</option><option value="3">Cash on delivery</option></select>'
					+'</div>'
					+'<div class="col-md-2"><select id="order_status" name="order_status" class="custom-select block multi_select">'
					+'<option value="0">Delivered</option><option value="1">Active</option><option value="2">In Process</option><option value="3">Rejected</option></select>'
					+'</div>'
					+'<div class="col-md-2"><select id="payment_status" name="payment_status" class="custom-select block multi_select">'
					+'<option value="0">Paid</option><option value="1">Unpaid</option></select>'
					+'</div>'
					+'<div class="col-md-2"><input type="date" id="order_date" name="order_date" class="form-control"></div>'
					+'<div class="col-md-1"><button type="submit" class="btn btn-primary">'
					+'<i class="ft-search"></i></button></div></div>'
					+'</form>');
				$('#add_filter').remove();
				$('#filter_button').append('<a href="javascript::void(0)" id="remove_filter"> X</a>');
            }else if(window.location.pathname.split('user')[1] == '/orders/search'){
            	$('#filter_section').append('<br><form action='+current_url+' method="get">'
					+'<div class="row"><div class="col-md-1"></div><div class="col-md-2">'
					+'<input type="text" id="order_no" name="order_no" class="form-control" placeholder="Order NO#"></div>'
					+'<div class="col-md-2"><select id="payment_type" name="payment_type" class="custom-select block multi_select">'
					+'<option value="0">Paypal</option><option value="1">Stripe</option><option value="2">Bank Transaction</option><option value="3">Cash on delivery</option></select>'
					+'</div>'
					+'<div class="col-md-2"><select id="order_status" name="order_status" class="custom-select block multi_select">'
					+'<option value="0">Delivered</option><option value="1">Active</option><option value="2">In Process</option><option value="3">Rejected</option></select>'
					+'</div>'
					+'<div class="col-md-2"><select id="payment_status" name="payment_status" class="custom-select block multi_select">'
					+'<option value="0">Paid</option><option value="1">Unpaid</option></select>'
					+'</div>'
					+'<div class="col-md-2"><input type="date" id="order_date" name="order_date" class="form-control"></div>'
					+'<div class="col-md-1"><button type="submit" class="btn btn-primary">'
					+'<i class="ft-search"></i></button></div></div>'
					+'</form>');
				$('#add_filter').remove();
				$('#filter_button').append('<a href="javascript::void(0)" id="remove_filter"> X</a>');
            }else if(window.location.pathname.split('user')[1] == '/wishlist/products/manage'){
				$('#filter_section').append('<form action='+current_url+' method="get">'
					+'<div class="row"><div class="col-md-7"></div><div class="col-md-4">'
					+'<input type="text" id="name" name="name" class="form-control"></div>'
					+'<div class="col-md-1"><button type="submit" class="btn btn-primary">'
					+'<i class="ft-search"></i></button></div></div>'
					+'</form>');
				$('#add_filter').remove();
				$('#filter_button').append('<a href="javascript::void(0)" id="remove_filter"> X</a>');
			}else if(window.location.pathname.split('user')[1] == '/wishlist/products/search'){
				$('#filter_section').append('<form action='+current_url+' method="get">'
					+'<div class="row"><div class="col-md-7"></div><div class="col-md-4">'
					+'<input type="text" id="name" name="name" class="form-control"></div>'
					+'<div class="col-md-1"><button type="submit" class="btn btn-primary">'
					+'<i class="ft-search"></i></button></div></div>'
					+'</form>');
				$('#add_filter').remove();
				$('#filter_button').append('<a href="javascript::void(0)" id="remove_filter"> X</a>');
			}else{
				$('#filter_section').append('<form action='+current_url+' method="get">'
					+'<div class="row"><div class="col-md-7"></div><div class="col-md-2">'
					+'<input type="text" id="name" name="name" class="form-control"></div>'
					+'<div class="col-md-2"><select id="status" name="status" class="custom-select block multi_select">'
					+'<option value="0">Active</option><option value="1">Inactive</option></select>'
					+'</div><div class="col-md-1"><button type="submit" class="btn btn-primary">'
					+'<i class="ft-search"></i></button></div></div>'
					+'</form>');
				$('#add_filter').remove();
				$('#filter_button').append('<a href="javascript::void(0)" id="remove_filter"> X</a>');
			}
		});

		//Remove Filter
		$(document).on('click', '#remove_filter', function(){
			$('#filter_section').empty();
			$('#remove_filter').remove();
			$('#filter_button').append('<a href="javascript::void(0);" id="add_filter"><i class="ft-filter"></i> Filter</a>');
		});
	//Filter Section End

	//multiple email




	//Remove Products Images Start
		$(document).on('click', '.remove_product_image', function(){
			if(confirm('Are you sure, you want to delete this image?')){
				var id = $(this).attr('data-id');
				var url = document.location.href.split('edit')[0].toString()+'images/ajax-delete-image/'+id;
				$('span[data-id="'+$(this).attr('data-id')+'"]').hide();
				$.ajax({
		            url : url,
		            type : 'GET',
		            success:function(response){
		                json_data = $.parseJSON(response);
		                if(json_data.ERROR == true){
		                	$('span[data-id="'+$(this).attr('data-id')+'"]').show();
		                	alert(json_data.DATA);
		                }else{
		                   	$('span[data-id="'+$(this).attr('data-id')+'"]').remove();
		                	alert(json_data.DATA);
		                }
		            }
		        });
			}
		});
	//Remove Products Images End

	//initialize ck_editor
    var ckeditor_url = '/assets/ckeditor';

	//Select2 Inputs Start
		$('.multi_select').select2();
	//Select2 Inputs End
});