@extends('layouts.main.app')

@section('content')
<div class="container-fluid offer-section py-5">
    <div class="container py-5">
      <div class="row">
          <h4 class="mb-2 p-0">Order Lists</h4>
          <table class="table table-striped" id="dataTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Custumer Name</th>
                <th scope="col">Custumer Email</th>
                <th scope="col">Product Name</th>
                <th scope="col">Total Payment</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $item->user->name ?? 'unknown' }}</td>
                  <td>{{ $item->user->email ?? 'unknown' }}</td>
                  <td>{{ $item->product->name ?? '-' }}</td>
                  <td>{{ number_format($item->gross_amount) ?? 'error' }}</td>
                  <td>{{ $item->status ?? '-' }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection
