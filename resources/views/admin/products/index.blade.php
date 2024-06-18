@extends('layouts.admin')

@section('content')
<section class="content-header">
  <h1>
    Page List Products
  </h1>
</section>

<section class="content">
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