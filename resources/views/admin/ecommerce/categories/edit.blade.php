@include('admin.layouts.header')
    <div class="content-body">
        <section id="basic-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form form-horizontal form-bordered" action="{{ route('update_categories', $query->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <h4 class="form-section">Edit Category</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="label-control">Category Name</label>
                                                    <input type="text" id="name" name="name" class="form-control" placeholder="Category Name" value="{{ $query->name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row last">
                                                    <label class="label-control">Category Slug</label>
                                                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Category Slug" value="{{ $query->slug }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="label-control">Parent Categories</label>
                                                    <select id="parent_categories[]" name="parent_categories[]" class="form-control multi_select" multiple>
                                                        <option value="0" @if(old('parent_categories') == '0') selected @endif>No parent cateogry</option>
                                                        @if(!empty($parent_categories))
                                                            @foreach($parent_categories as $row)
                                                                <option value="{{ $row->id }}" @if(old('parent_categories') == $row->id) selected @endif @foreach($query_categories as $categories) @if($categories == $row->id) selected @endif @endforeach>{{ $row->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="label-control">Meta Keywords</label>
                                                    <textarea id="meta_keywords" name="meta_keywords" rows="5" class="form-control" placeholder="Meta Keywords">{{ $query->meta_keywords }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row last">
                                                    <label class="label-control">Meta Description</label>
                                                    <textarea id="meta_description" name="meta_description" rows="5" class="form-control" placeholder="Meta Description">{{ $query->meta_description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row last">
                                                    <label class="label-control">Category Status</label>
                                                    <div class="input-group">
                                                        <label class="d-inline-block custom-control custom-radio ml-1">
                                                            <input type="radio" id="status" name="status" class="custom-control-input multi_select" value="0" @if($query->status == '0') checked @endif>
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description ml-0">Active</span>
                                                        </label>
                                                        <label class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" id="status" name="status" class="custom-control-input multi_select" value="1" @if($query->status == '1') checked @endif>
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description ml-0">Inactive</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-check-square-o"></i> Update
                                        </button>
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