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
      <table class="table table-bordered">
        <tbody>
          <tr>
            <th style="width: 10px">No</th>
            <th>Category</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          @forelse ($products as $product)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              @if($product->category)
              {{ $product->category->name }}
              @else
              No Category
              @endif
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ \App\Helpers\CurrencyHelper::formatRupiah($product->selling_price) }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->status == '1' ? 'Hidden' : 'Visible' }}</td>
            <td>
              <a href="{{ url('admin/products/' . $product->id . '/edit') }}" class="btn btn-primary btn-xs">Edit</a>
              <a href="{{ url('admin/products/' . $product->id . '/delete') }}"
                onclick="return confirm('Are you sure you want to delete this product?')"
                class="btn btn-danger btn-xs">Delete</a>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="7">No Products Data Found!></td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection