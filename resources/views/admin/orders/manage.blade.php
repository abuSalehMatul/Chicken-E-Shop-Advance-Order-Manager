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
                        			<h4 class="form-section">Manage Orders</h4>
                        			<div class="row">
                        			    <div class="col-md-10">
                        					@if($total_records < 10)
                        			            Total {{ $total_records }} Record Found
                        			        @elseif($total_records > 9)
                        			            Total {{ $total_records }} Record Found
                        			        @else
                        			            No records found
                        			        @endif 
                        			    </div>
                        			    <div id="filter_section"></div>
                        			</div><br><br>
                        			<div class="table-responsive">
                        				<table class="table">
                        					<thead>
                        					    <tr>
	                                                <th>Order Number</th>
	                        	                    <th>Quantity</th>
	                        			            <th>Action</th>
                        					    </tr>
                        					</thead>
                        					<tbody>
                        						@if(!empty($query))
                        						@foreach($query as $row)
                        							<tr>
                        								<td>{{ $row->order_no }}</td>
                        								<td>{{ $row->quantity }}</td>
     	                                                <td>
     	                                                  	<div role="group" class="btn-group">
     	                              					    <button id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-outline-primary dropdown-toggle dropdown-menu-right"><i class="ft-edit icon-left"></i> Action</button>
     	                              					    <div aria-labelledby="btnGroupDrop1" class="dropdown-menu">
     	                              					    <a href="{{ route('detail', $row->order_no) }}" class="dropdown-item">Detail</a>
     	            								    	<a href="{{ route('detail', $row->id) }}" class="dropdown-item">Delete</a>		   </div>
     	                       								</div>
     	                           							</td>
                        							</tr>
                        						@endforeach
                        						@else
                        						    No Data Found
                        						@endif
                        					</tbody>
                        				</table>
                        			</div>
                        		</div>
                        		{{ $query->links() }}
                        	</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    
@include('admin.layouts.footer')