@extends('layouts.admin')

@section('content')
<section class="content-header">
  <h1>
    Page Create Products
  </h1>
</section>

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <div class="pull-left">
        <div class="pull-left">
          <a href="{{ url('admin/products') }}" class="btn btn-success"><i class="fa fa-arrow-left"></i>
            Back</a>
        </div>
      </div>
    </div>

    <div class="box-body">

      @if ($errors->any())
      <div class="alert alert-warning">
        @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
      </div>
      @endif

      <div class="nav-tabs-custom">
        <form action="{{ url('admin/products') }}" method="post" enctype="multipart/form-data">
          @csrf
          <ul class="nav nav-tabs">
            <li class="active"><a href="#home-tab" data-toggle="tab" aria-expanded="true">Home Product</a></li>
            <li class=""><a href="#seotag-tab" data-toggle="tab" aria-expanded="false">SEO Tags Product</a></li>
            <li class=""><a href="#details-tab" data-toggle="tab" aria-expanded="false">Details Product</a></li>
            <li class=""><a href="#image-tab" data-toggle="tab" aria-expanded="false">Image Product</a></li>
          </ul>
          <div class="tab-content" style="padding: 10px !important;">

            <div class="tab-pane active" id="home-tab">
              <div class="row">

                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label>Name Product</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label>Slug Product</label>
                    <input type="text" name="slug" class="form-control">
                    @error('slug')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                      <option value="" selected>-- Select Category --</option>
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                    @error('category_id')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label>Brand</label>
                    <select class="form-control" name="brand">
                      <option value="" selected>-- Select Brand --</option>
                      @foreach ($brands as $brand)
                      <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                      @endforeach
                    </select>
                    @error('brand')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label>Small Description (500 Words)</label>
                    <textarea class="form-control" name="small_description" rows="4"></textarea>
                    @error('small_description')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="4"></textarea>
                    @error('category')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

              </div>
            </div>

            <div class="tab-pane" id="seotag-tab">
              <div class="row">

                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                    @error('meta_title')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <label>Meta Keyword</label>
                    <textarea class="form-control" name="meta_keyword" rows="4"></textarea>
                    @error('meta_keyword')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <label>Meta Description</label>
                    <textarea class="form-control" name="meta_description" rows="4"></textarea>
                    @error('meta_description')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

              </div>
            </div>

            <div class="tab-pane" id="details-tab">
              <div class="row">

                <div class="col-md-4 mb-3">
                  <div class="form-group">
                    <label>Original Price</label>
                    <input type="text" name="original_price" class="form-control">
                    @error('original_price')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-4 mb-3">
                  <div class="form-group">
                    <label>Selling Price</label>
                    <input type="text" name="selling_price" class="form-control">
                    @error('selling_price')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-4 mb-3">
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control">
                    @error('quantity')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label>Trending</label>
                    <select class="form-control" name="trending">
                      <option value="0">Not Trending</option>
                      <option value="1">Trending</option>
                    </select>
                    @error('trending')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="0">Visible</option>
                      <option value="1">Hidden</option>
                    </select>
                    @error('status')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

              </div>
            </div>

            <div class="tab-pane" id="image-tab">
              <div class="row">

                <div class="col-md-4 mb-3">
                  <div class="form-group">
                    <label>Upload Product Image</label>
                    <input type="file" name="image[]" multiple class="form-control">
                    @error('original_price')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

              </div>
            </div>

          </div>
      </div>
      <div>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</section>
@endsection