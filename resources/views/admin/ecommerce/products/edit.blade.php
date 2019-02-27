@include('admin.layouts.header')
    <section id="basic-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <form class="form form-horizontal form-bordered" action="{{ route('update_products', $query_product->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <h4 class="form-section">Edit Products</h4>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Product Details</a>
                                        </li>
                    
                            
                                        <li class="nav-item">
                                            <a class="nav-link" id="categories-tab" data-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="false">Product Categories</a>
                                        </li>
                
                                        <li class="nav-item">
                                            <a class="nav-link" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-controls="images" aria-selected="false">Product Images</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">Product SEO Options</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="label-control">Product Name</label>
                                                        <input type="text" id="name" name="name" class="form-control" placeholder="Product Name" value="{{ $query_product->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row last">
                                                        <label class="label-control">Product Slug</label>
                                                        <input type="text" id="slug" name="slug" class="form-control" placeholder="Product Slug" value="{{ $query_product->slug }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="label-control">Product Price</label>
                                                        <input type="text" id="regural_price" name="regural_price" class="form-control" placeholder="Product Price" value="{{ $query_product->regural_price }}">
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="label-control">Variations</label>
                                                        <input type="text" id="variation" name="variation" class="form-control" data-role="tagsinput" placeholder="Add Variations" value="{{$query_product->variation }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="label-control">Is Product On sale</label>
                                                        <div class="input-group">
                                                            <label class="d-inline-block custom-control custom-radio ml-1">
                                                                <input type="radio" id="on_sale" name="on_sale" class="custom-control-input" value="0" @if(old('on_sale') == '0') checked @endif @if($query_product->on_sale == '0') checked @endif>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description ml-0">Yes</span>
                                                            </label>
                                                            <label class="d-inline-block custom-control custom-radio">
                                                                <input type="radio" id="on_sale" name="on_sale" class="custom-control-input" value="1" @if(old('on_sale') == '1') checked @endif @if($query_product->on_sale == '1') checked @endif>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description ml-0">No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row last" id="sale_price">
                                                        @if(!empty($query_product->on_sale == 0))
                                                            <label class="label-control">Product Sale Price</label>
                                                            <input type="text" id="sale_price" name="sale_price" class="form-control" placeholder="Product Sale Price" value="{{ $query_product->sale_price }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"> 
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label-control">Product Details</label>
                                                        <textarea id="details" name="details" class="form-control ckeditor" rows="5" placeholder="Product Details">{{ $query_product->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row last">
                                                        <label class="label-control">Product Status</label>
                                                        <div class="input-group">
                                                            <label class="d-inline-block custom-control custom-radio ml-1">
                                                                <input type="radio" id="status" name="status" class="custom-control-input" value="0" @if(old('status') == '0') checked @endif @if($query_product->status == '0') checked @endif>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description ml-0">Active</span>
                                                            </label>
                                                            <label class="d-inline-block custom-control custom-radio">
                                                                <input type="radio" id="status" name="status" class="custom-control-input" value="1" @if(old('status') == '1') checked @endif @if($query_product->status == '1') checked @endif>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description ml-0">Inactive</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="label-control">Product Categories</label>
                                                        @if(!empty($categories))
                                                            <select id="categories[]" name="categories[]" class="form-control multi_select" multiple style="width: 100%">
                                                                <option>No cateogry selected</option>
                                                                @foreach($categories as $row)
                                                                    <option value="{{ $row->id }}" @if(old('categories[]') == $row->id) selected @endif @foreach($query_categories as $cat_id) @if($cat_id->category_id == $row->id) selected @endif @endforeach>{{ $row->name }}</option>
                                                                @endforeach
                                                            </select> 
                                                        @endif  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                                
                                        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="label-control">Product Images</label>
                                                        <div class="col-md-12">
                                                            <label id="image" class="file center-block">
                                                                <input type="file" id="multi_image" name="product_images[]" multiple>
                                                                <span class="file-custom"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row last">
                                                        <label class="label-control">Image Preview</label>
                                                        <div class="col-md-12" id="preview_images">
                                                            @foreach($query_images as $row)
                                                                <span class="pip" data-id="{{ $row->id }}">     
                                                                <img src="{{ asset('public/assets/admin/images/ecommerce/products/'.$row->image) }}" alt="Product Images" style="width:184px; height:100px"/> 
                                                                <span class="remove remove_product_image" data-id="{{ $row->id }}">Remove</span>
                                                                </span>
                                                            @endforeach 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="label-control">Featured Image</label>
                                                        <div class="col-md-12">
                                                            <label id="image1" class="file center-block">
                                                                <input type="file" id="image" name="featured_image">
                                                                <span class="file-custom"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row last">
                                                        <label class="label-control">Image Preview</label>
                                                        <div class="col-md-12">
                                                            <img src="{{ asset('public/assets/admin/images/ecommerce/products/'.$query_product->featured_image) }}" id="preview_image1" alt="Brand Image" style="width:150px; height:150px"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                                            <div class="row"> 
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label-control">Product Meta Keywords</label>
                                                        <textarea id="meta_keywords" name="meta_keywords" class="form-control" rows="5" placeholder="Product Meta Keywords">{{ $query_seo->meta_keywords }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"> 
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label-control">Product Meta Description</label>
                                                        <textarea id="meta_description" name="meta_description" class="form-control" rows="5" placeholder="Product Meta Description">{{ $query_seo->meta_description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Update
                                                </button>
                                            </div>
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
@include('admin.layouts.footer')