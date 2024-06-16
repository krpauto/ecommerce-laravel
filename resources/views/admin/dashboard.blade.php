@extends('layouts.admin')

@section('content')

<section class="content-header">
  @if(@session('message'))
  <h1>
    {{ session('message') }}
  </h1>
  @endif
</section>

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Title</h3>
    </div>
</section>
@endsection