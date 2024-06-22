@extends('layouts.admin')

@section('content')

<section class="content-header">
  <h1>
    Page Create Sliders
  </h1>
</section>

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <div class="pull-left">
        <a href="{{ url('admin/sliders') }}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    </div>

    <div class="box-body">
      <table class="table table-bordered">
        <form action="{{ url('admin/sliders/create') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            <div class="row">

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Enter title">
                  @error('title')
                  <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control" name="image" />
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

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>

        </form>
      </table>
    </div>
  </div>
</section>
@endsection