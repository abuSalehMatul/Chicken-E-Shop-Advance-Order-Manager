@include('admin.layouts.header')
<style type="text/css">
    
    .bootstrap-tagsinput {
        width: 100% !important;
        height: 40px;
        padding: 2%;
    }

</style>
    <section id="basic-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <form class="form form-horizontal form-bordered" action="{{ route('insert_products') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <h4 class="form-section">Add Products</h4>
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
                                                        <input type="text" id="name" name="name" class="form-control" placeholder="Product Name" value="{{ old('name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row last">
                                                        <label class="label-control">Product Slug</label>
                                                        <input type="text" id="slug" name="slug" class="form-control" placeholder="Product Slug" value="{{ old('slug') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="label-control">Product Price</label>
                                                        <input type="text" id="regural_price" name="regural_price" class="form-control" placeholder="Product Price" value="{{ old('regural_price') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="label-control">Variations</label>
                                                        <input type="text" id="variation" name="variation" class="form-control" placeholder="Add Variations" value="{{ old('variation') }}" data-role="tagsinput" style="height: 28px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="label-control">On Sale</label>
                                                        <div class="input-group">
                                                            <label class="d-inline-block custom-control custom-radio ml-1">
                                                                <input type="radio" id="on_sale" name="on_sale" class="custom-control-input" value="0" @if(old('on_sale') == '0') checked @endif>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description ml-0">Yes</span>
                                                            </label>
                                                            <label class="d-inline-block custom-control custom-radio">
                                                                <input type="radio" id="on_sale" name="on_sale" class="custom-control-input" value="1" @if(old('on_sale') == '1') checked @endif>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description ml-0">No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row last" id="sale_price"></div>
                                                </div>
                                            </div>
                                            <div class="row"> 
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label-control">Product Details</label>
                                                        <textarea id="details" name="details" class="form-control ckeditor" rows="5" placeholder="Product Details">{{ old('details') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row last">
                                                        <label class="label-control">Product Status</label>
                                                        <div class="input-group">
                                                            <label class="d-inline-block custom-control custom-radio ml-1">
                                                                <input type="radio" id="status" name="status" class="custom-control-input" value="0" @if(old('status') == '0') checked @endif>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description ml-0">Active</span>
                                                            </label>
                                                            <label class="d-inline-block custom-control custom-radio">
                                                                <input type="radio" id="status" name="status" class="custom-control-input" value="1" @if(old('on_sale') == '1') checked @endif>
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description ml-0">Inactive</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="stock" role="tabpanel" aria-labelledby="stock-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="label-control">Product Stock Quantity</label>
                                                        <input type="text" id="stock" name="stock" class="form-control" placeholder="Product Stock Quantity" value="{{ old('stock') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="brands" role="tabpanel" aria-labelledby="brands-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="label-control">Product Brand</label>
                                                        @if(!empty($brands))
                                                            <select id="brand" name="brands" class="form-control multi_select" style="width: 100%">
                                                                <option>No Brand selected</option>
                                                                @foreach($brands as $row)
                                                                    <option value="{{ $row->id }}" @if(old('brands') == $row->id) selected @endif>{{ $row->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        @else
                                                            <select id="brand" name="brands" class="form-control multi_select" style="width: 100%">
                                                                <option>No Brands Found</option>
                                                            </select>
                                                        @endif
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
                                                                    <option value="{{ $row->id }}" @if(old('categories[]') == $row->id) selected @endif>{{ $row->name }}</option>
                                                                @endforeach
                                                            </select> 
                                                        @else
                                                            <select id="categories" name="categories[]" class="form-control multi_select" multiple style="width: 100%">
                                                                <option>No cateogry found</option>
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
                                                        <div class="col-md-12" id="preview_images"></div>
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
                                                            <img id="preview_image1" alt="Brand Image" style="width:150px; height:150px"/>
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
                                                        <textarea id="meta_keywords" name="meta_keywords" class="form-control" rows="5" placeholder="Product Meta Keywords">{{ old('meta_keywords') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"> 
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="label-control">Product Meta Description</label>
                                                        <textarea id="meta_description" name="meta_description" class="form-control" rows="5" placeholder="Product Meta Description">{{ old('meta_description') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Add
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