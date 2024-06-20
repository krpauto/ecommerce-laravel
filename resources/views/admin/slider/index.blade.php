@extends('layouts.admin')

@section('content')

<section class="content">

  @if(session('message'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
    {{ session('message') }}
  </div>
  @endif

  <div class="callout callout-info">
    <h4 style="color: black">Page Sliders</h4>
    <p style="color: black">This page sliders</p>
  </div>

  <div class="box">
    <div class="box-header with-border">
      <div class="pull-left">
        <div class="pull-left">
          <a href="{{ url('admin/sliders/create') }}" class="btn btn-success"><i class="fa fa-plus"></i>
            Create
            Slider</a>
        </div>
      </div>
    </div>

    <div class="box-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <th style="width: 10px">No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          @foreach ($sliders as $slider)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $slider->title }}</td>
            <td>{{ $slider->description }}</td>
            <td>
              <img src="{{ asset($slider->image) }}" alt="Slider" style="height: 70px; width: auto;">
            </td>
            <td>{{ $slider->status == '1' ? 'Hidden' : 'Visible' }}</td>
            <td>
              <a href="{{ url('admin/sliders/' . $slider->id . '/edit') }}" class="btn btn-primary btn-xs">Edit</a>
              <a href="{{ url('admin/sliders/' . $slider->id . '/delete') }}"
                onclick="return confirm('Are you sure you want to delete this slider?')"
                class="btn btn-danger btn-xs">Delete</a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection