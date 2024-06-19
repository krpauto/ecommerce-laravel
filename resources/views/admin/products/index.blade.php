@extends('layouts.admin')

@section('content')
<section class="content-header">
  <h1>
    Page List Products
  </h1>
</section>

<section class="content">
  @if(session('message'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
    {{ session('message') }}
  </div>
  @endif
  <div class="box">
    <div class="box-header with-border">
      <div class="pull-left">
        <div class="pull-left">
          <a href="{{ url('admin/products/create') }}" class="btn btn-success"><i class="fa fa-plus"></i>
            Create
            Product</a>
        </div>
      </div>
    </div>

    <div class="box-body">
    </div>
  </div>
</section>
@endsection