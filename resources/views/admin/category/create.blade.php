@extends('layouts.admin')

@section('content')

<section class="content-header">
  <h1>
    Page Create Categories
  </h1>
</section>

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <div class="pull-left">
        <a href="{{ url('admin/category') }}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    </div>

    <div class="box-body">
      <table class="table table-bordered">
        <form action="{{ url('admin/category') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            <div class="row">

              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <label>Name Category</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter name category">
                  @error('name')
                  <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <label>Slug</label>
                  <input type="text" class="form-control" name="slug" placeholder="Enter slug">
                  @error('slug')
                  <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" class="form-control" rows="3"></textarea>
                  @error('description')
                  <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control" name="image">
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

              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <label>Meta Title</label>
                  <input type="text" class="form-control" name="meta_title" placeholder="Enter meta title">
                  @error('meta_title')
                  <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <label>Meta Keywords</label>
                  <input type="text" class="form-control" name="meta_keyword" placeholder="Enter meta keywords">
                  @error('meta_keyword')
                  <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <label>Meta Description</label>
                  <input type="text" class="form-control" name="meta_description" placeholder="Enter meta description">
                  @error('meta_description')
                  <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>
              </div>

            </div>


          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>

        </form>
      </table>
    </div>
  </div>
</section>
@endsection