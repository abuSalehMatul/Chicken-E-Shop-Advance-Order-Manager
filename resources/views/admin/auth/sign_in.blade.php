<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="keywords" content="{{ $meta_keywords }}">
    <meta name="description" content="{{ $meta_description }}">
    <title>{{ $page_title }}</title>
    @include('admin.layouts.style')
</head>
<body data-open="click" data-menu="vertical-menu-modern" data-col="1-column" class="vertical-layout vertical-menu-modern 1-column menu-expanded blank-page blank-page">
	<div class="app-content content">
      	<div class="content-wrapper">
        	<div class="content-header row"></div>
				<div class="content-body">
				    <section class="flexbox-container">
				    	<div class="col-12 d-flex align-items-center justify-content-center">
				            <div class="col-md-4 col-10 box-shadow-2 p-0">
				            	@include('admin.layouts.messages')
				                <div class="card border-grey border-lighten-3 m-0">
				                    <div class="card-header border-0">
				                        <div class="card-title text-center">
				                            <div class="p-1">
				                            	@if(!empty($query->footer_image))
				                            	 	<img src="{{ asset('assets/admin/images/settings/logo/'.$query->footer_image) }}" class="brand-logo" alt="Footer Logo">
			                            	 	@else 
			                            	 		Laravel Ecommerce Store 
			                            	 	@endif
				                            </div>
				                        </div>
				                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Login with @if(!empty($query->store_name)) {{ $query->store_name }} @else Laravel Ecommerce Store @endif</span></h6>
				                    </div>
				                    <div class="card-content">
				                        <div class="card-body">
				                            <form class="form-horizontal form-simple" action="{{ route('admin_credentials_validation') }}" method="post">
				                            	{{ csrf_field() }}
				                                <fieldest class="form-group position-relative has-icon-left mb-0">
				                                    <input type="text" id="email" name="email" class="form-control" placeholder="Your Username">
				                                    <div class="form-control-position">
				                                        <i class="ft-user"></i>
				                                    </div>
				                                </fieldset>
				                                <fieldset class="form-group position-relative has-icon-left">
				                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
				                                    <div class="form-control-position">
				                                         <i class="fa fa-key"></i>
				                                    </div>
				                                </fieldset>
				                                <button type="submit" class="btn btn-primary"><i class="ft-unlock"></i> Login</button>
				                            </form>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </section>
			    </div>
			</div>
		</div>
	</div>
</body>
@include('admin.layouts.footer')
</html>