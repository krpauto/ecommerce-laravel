@extends('layouts.app')

@section('title', 'My Orders')

@section('content')

<div class="py-3 py-md-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="shadow bg-white p-3">
          <h4 class="mb-4">My Orders</h4>
          <hr>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <th>No</th>
                <th>Tracking No</th>
                <th>Username</th>
                <th>Payment Mode</th>
                <th>Ordered Date</th>
                <th>Status Message</th>
                <th>Action</th>
              </thead>
              <tbody>

                @forelse ($orders as $order)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $order->tracking_no }}</td>
                  <td>{{ $order->fullname }}</td>
                  <td>{{ $order->payment_mode }}</td>
                  <td>{{ $order->created_at->format('d-m-Y H:i:s') }}</td>
                  <td>{{ $order->status_message }}</td>
                  <td>
                    <a href="{{ url('orders/' . $order->id) }}" class="btn btn-primary btn-sm">View</a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="8">No Orders Found!</td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div>
              {{ $orders->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection