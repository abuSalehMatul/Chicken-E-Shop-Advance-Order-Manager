@include('admin.layouts.header')
    <div class="content-body">
        <section id="basic-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form form-horizontal form-bordered">
                                    <div class="form-body">
                                        <h4 class="form-section">Invoice Details</h4>
                                    </div><br><br>
                                    <div id="invoice-company-details" class="row">
                                        <!-- Company Details Start -->
                                            <div class="col-md-6 col-sm-12 text-center text-md-left">
                                                <div class="media">
                                                    <img src="@if(!empty($header_details->footer_image)) {{ asset('assets/admin/images/settings/logo/'. $header_details->footer_image) }} @endif" id="preview_image2" alt="Store Logo" style="width:150px; height:150px"/>
                                                    <div class="media-body">
                                                        <ul class="ml-2 px-0 list-unstyled">
                                                            <li class="text-bold-800">@if(!empty($header_details->store_name)) {{ $header_details->store_name }} @endif</li>
                                                            <li>@if(!empty($header_details->store_address)) {{ $header_details->store_address }} @endif</li>
                                                            <li>@if(!empty($header_details->zip_code)) {{ $header_details->zip_code }} @endif</li>
                                                            <li>@if(!empty($header_details->city_name)) {{ $header_details->city_name }} @endif</li>
                                                            <li>@if(!empty($header_details->country_name)) {{ $header_details->country_name }} @endif</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Company Details End -->
                                        <!-- Invoice Details Start -->
                                            <div class="col-md-6 col-sm-12 text-center text-md-right">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h2>Invoice Details</h2>
                                                        <ul class="ml-2 px-0 list-unstyled">
                                                            <li class="text-bold-800">
                                                                <label>No# :</label> @if(!empty($invoice_and_customer_details->order_no)) {{ $invoice_and_customer_details->order_no }} @endif
                                                            </li>
                                                            <li class="text-bold-800">
                                                                <label>Date :</label> @if(!empty($invoice_and_customer_details->ordered_date)) {{ date('d-m-Y', strtotime($invoice_and_customer_details->ordered_date)) }} @endif
                                                            </li>
                                                            <li class="text-bold-800">
                                                                <label>Transaction ID :</label> @if(!empty($invoice_and_customer_details->transaction_id)) {{ $invoice_and_customer_details->transaction_id }} @endif
                                                            </li>
                                                            <li class="text-bold-800">
                                                                <label>Total Amount :</label> @if(!empty($invoice_and_customer_details->total)) {{ $invoice_and_customer_details->total }} @endif
                                                            </li>
                                                            <li class="text-bold-800">
                                                                <label>Order Status :</label> 
                                                                @if($invoice_and_customer_details->order_status == 0)
                                                                    <span class="badge badge-success">Delivered</span>
                                                                @elseif($invoice_and_customer_details->order_status == 1)
                                                                    <span class="badge badge-primary">Active</span>
                                                                @elseif($invoice_and_customer_details->order_status == 2)
                                                                    <span class="badge badge-warning">In Process</span>
                                                                @else
                                                                    <span class="badge badge-danger">Rejected</span>
                                                                @endif
                                                            </li>
                                                            <li class="text-bold-800">
                                                                <label>Payment Status :</label> 
                                                                @if($invoice_and_customer_details->payment_status == 0)
                                                                    <span class="badge badge-default badge-success">Paid</span>
                                                                @else
                                                                    <span class="badge badge-default badge-danger">Unpaid</span>
                                                                @endif
                                                            </li>
                                                        </ul>
                                                        <h2>Customer Details</h2>
                                                        <ul class="ml-2 px-0 list-unstyled">
                                                            <li class="text-bold-800">
                                                                <label>Name :</label> @if(!empty($invoice_and_customer_details->first_name && $invoice_and_customer_details->last_name)) {{ $invoice_and_customer_details->first_name }} {{ $invoice_and_customer_details->last_name }} @endif
                                                            </li>
                                                            <li class="text-bold-800">
                                                                <label>Contact :</label> @if(!empty($invoice_and_customer_details->code && $invoice_and_customer_details->cell_number1)) {{ $invoice_and_customer_details->code }}{{ $invoice_and_customer_details->cell_number1 }} @endif
                                                            </li>
                                                            <li class="text-bold-800">
                                                                <label>Email :</label> @if(!empty($invoice_and_customer_details->email)) {{ $invoice_and_customer_details->email }} @endif
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Invoice Details End -->
                                    </div>
                                    <br><br>
                                    <div class="table-responsive">          
  										<table class="table">
											<thead>
			                                    <tr>
                                                    <th>Product Name</th>
			                                        <th>Product Type</th>
                                                    <th>Product Quantity</th>
                                                    <th>Product Amount</th>
                                                    <th>Total Amount</th>
			                                    </tr>
			                                </thead>
			                                <tbody>
                                                @if(!empty($order_details))
                                                    @foreach($order_details as $row)
                                                        <tr>
                                                            <td>{{ $row->product_name }}</td>
                                                            <td>@if($row->type == 0) On Sale @elseif($row->type == 1) Normal @endif</td>
                                                            <td>{{ $row->product_quantity }}</td>
                                                            <td>{{ $row->product_price }}</td>
                                                            <td>{{ $row->total_amount }}</td>
        				                               	</tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
										</table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7 col-sm-12"></div>
                                        <div class="col-md-5 col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Sub Total</td>
                                                            <td class="text-right">{{ $subtotal }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Discount</td>
                                                            <td class="text-right">{{ $discount }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-800">Total</td>
                                                            <td class="text-bold-800 text-right">{{ $total }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@include('admin.layouts.footer')