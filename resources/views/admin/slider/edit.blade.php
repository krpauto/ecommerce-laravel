@extends('layouts.admin')

@section('content')

<section class="content-header">
  <h1>
    Page Edit Sliders
  </h1>
</section>

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <div class="pull-left">
        <a href="{{ url('admin/sliders/') }}" class="btn btn-success"><i class="fa fa-arrow-left"></i>
          Back</a>
      </div>
    </div>

    <div class="box-body">
      <table class="table table-bordered">
        <form action="{{ url('admin/sliders/'.$slider->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="box-body">
            <div class="row">

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" value="{{ $slider->title }}" name="title"
                    placeholder="Enter title">
                  @error('title')
                  <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" class="form-control" rows="3">{{ $slider->description }}</textarea>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control" name="image" />
                  <img src="{{ asset($slider->image) }}" style="height: 70px; width: auto;" alt="Slider">
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                    <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>Visible</option>
                    <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Hidden</option>
                  </select>
                  @error('status')
                  <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>
              </div>

            </div>


          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>

        </form>
      </table>
    </div>
  </div>
</section>
@endsection