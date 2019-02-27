<!DOCTYPE html>
<html>
<head>
	<title>ChowNow</title>
	<!-- Meta tag -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Link tag -->
	<link rel="stylesheet" type="text/css" href="{{URL::to('tushar/css/bootstrap.min.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="tushar/css/style.css">
	<style>
		

		.tusharmenu{
			
			background: #fff;
			height: 100%;
		}
		.tusharmenu .tusharwrapcat{
			padding: 15px 45px 30px;
		}

		.menus-actions {
			width: 100%;
		}
		.menus-actions-btn {
			text-align: right;
		}
		.menus-actions-btn ul{
			list-style-type:none;
		}
		.menus-actions-btn>li {
			display: inline-block;
			font-weight: 600;
			margin-left: 5px;
		}
		.menus-actions .a{
			font-size:14px;
			color:#3498db;
		}

		.tusmenu {
			margin-top: 15px;
		}
		.menu-category {
			color: #1C494D;
			display: block;
			font-size: 22px;
		}
		.tusharheading {
			font-family: jaf-bernino-sans-condensed,Helvetica,Arial,sans-serif;
		}

		.pull-right{
			float:right;
		}
		.tus-menu-item {
			color: #1C494D;
			display: block;
			line-height: 1.4;
			margin: 0 -30px 0 -45px;
			position: relative;
			padding: 7px 100px 7px 45px;
			text-decoration: none!important;
		}
		.tus-menu-item .tusharheading {
			font-size: 16px;
		}
		.menu-items-tus .tusharheading {
			color: #1C494D;
			display: block;
			margin-bottom: 2px;
		}
		.tushar-heading-link {
			color: #3498db;
			font-size: 18px;
			font-weight: 600;
		}
		.tus-menu-item-description{
			font-size: 13px;
    		margin: 0;
		}

		.tus-menu-item .price {
			font-size: 18px;
			position: absolute;
			right: 30px;
			top: 7px;
		}
	</style>
</head>
<body>
	<div class="welcome">
		<div class="main-layout" style="width:1111px;">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <a class="navbar-brand" href="#"> 
			  	<img src="{{('order/img/logo.png')}}"></a>

			    <ul class="navbar-nav ml-auto">
			      <li class="nav-item">
			        <a class="nav-link" href="#">Hi, Samiha. <i class="fa fa-user"></i> <span class="sr-only">(current)</span></a>
			      </li>
			    </ul>
			</nav>
			<div class="tusharmenu">
				<div class="tusharwrapcat">
					<div class="menus-actions">
						<ul class="menus-actions-btn" >
							<li >
								<span>/</span><a href="#">ExpandAll</a>
							</li>
							<li >
								<span>\</span><a href="#">CollapseAll</a>
							</li>
						</ul>
					</div>
					{{-- Category list --}}
					<?php
					$i=1;?>
					<div class="category1" class="tuscategoryview tusmenu">
						<a class="tusharheading menu-category" onclick="displayproduct(<?php echo $i;?>)">
							<span class="menu-category-name">Carosol Chicken</span>
							<span class="ss-gizmo pull-right ss-navigateright">^</span>
						</a>
						<hr>
						<ul class="menu-items-tus" id="product1" style="display:none">
							<li>
								<a class="tus-menu-item">
									<span class="tusharheading tushar-heading-link">1/4 Chicken Dark Meat</span>
									<p class="tus-menu-item-description">Served with two side orders.</p>
									<span class="price">$18</span>
								</a>
							</li>
							<li>
								<a class="tus-menu-item">
									<span class="tusharheading tushar-heading-link">1/4 Chicken Dark Meat</span>
									<p class="tus-menu-item-description">Served with two side orders.</p>
									<span class="price">$18</span>
								</a>
							</li>
							<li>
								<a class="tus-menu-item">
									<span class="tusharheading tushar-heading-link">1/4 Chicken Dark Meat</span>
									<p class="tus-menu-item-description">Served with two side orders.</p>
									<span class="price">$18</span>
								</a>
							</li>
						</ul>
					</div>
					<?php $i++;?>
					<div class="category1" class="tuscategoryview tusmenu">
						<a class="tusharheading menu-category" onclick="displayproduct(<?php echo $i;?>)">
							<span class="menu-category-name">Carosol Chicken</span>
							<span class="ss-gizmo pull-right ss-navigateright">^</span>
						</a>
						<hr>
						<ul class="menu-items-tus" id="product<?php echo $i;?>" style="display:none">
							<li>
								<a class="tus-menu-item">
									<span class="tusharheading tushar-heading-link">1/4 Chicken Dark Meat</span>
									<p class="tus-menu-item-description">Served with two side orders.</p>
									<span class="price">$18</span>
								</a>
							</li>
							<li>
								<a class="tus-menu-item">
									<span class="tusharheading tushar-heading-link">1/4 Chicken Dark Meat</span>
									<p class="tus-menu-item-description">Served with two side orders.</p>
									<span class="price">$18</span>
								</a>
							</li>
							<li>
								<a class="tus-menu-item">
									<span class="tusharheading tushar-heading-link">1/4 Chicken Dark Meat</span>
									<p class="tus-menu-item-description">Served with two side orders.</p>
									<span class="price">$18</span>
								</a>
							</li>
						</ul>
					</div>


				</div>
			</div>
		</div>
	</div>
	



	<!-- Script tag -->
	<script src="{{('order/js/jquery.min.js')}}"></script>
    <script src="{{('order/js/bootstrap.min.js')}}"></script>
	<script>
	function displayproduct(value){
		$('#product'+value).toggle();
	}
	</script>
</body>
</html>