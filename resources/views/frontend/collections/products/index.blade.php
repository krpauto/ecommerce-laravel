@extends('layouts.app')

@section('title')
{{ $category->meta_title }}
@endsection

@section('meta_keyword')
{{ $category->meta_keyword }}
@endsection

@section('meta_description')
{{ $category->meta_description }}
@endsection

@section('content')

<div class="py-3 py-md-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="mb-4">Our Products</h4>
      </div>

      @forelse ($products as $productItem)

      <div class="col-md-3">
        <div class="product-card">
          <div class="product-card-img">
            @if($productItem->quantity > 0)
            <label class="stock bg-success">In Stock</label>
            @else
            <label class="stock bg-daenger">Out of Stock</label>
            @endif

            @if ($productItem->productImages->count() > 0)
            <a href="{{ url('/collections/'.$category->slug.'/'.$productItem->slug) }}">
              <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
            </a>
            @endif

          </div>
          <div class="product-card-body">
            <p class="product-brand">{{ $productItem->brand }}</p>
            <h5 class="product-name">
              <a href="{{ url('/collections/'.$category->slug.'/'.$productItem->slug) }}">
                {{ $productItem->name }}
              </a>
            </h5>
            <div>
              <span class="selling-price">Rp {{ number_format($productItem->selling_price, 0, ',', '.') }}</span>
            </div>
            <div>
              <span class="original-price">Rp {{ number_format($productItem->original_price, 0, ',', '.') }}</span>
            </div>
            {{-- <div class="mt-2">
              <a href="" class="btn btn1">Add To Cart</a>
              <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
              <a href="" class="btn btn1"> View </a>
            </div> --}}
          </div>
        </div>
      </div>
      @empty
      <div class="co-md-12">
        <div class="p-2">
          <h5>No Products Available for {{ $category->name }}</h5>
        </div>
      </div>
      @endforelse


    </div>
  </div>
</div>

@endsection