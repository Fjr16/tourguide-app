@extends('layouts.main.app2')

@section('content')
<section class="breadcrumbs-custom-inset">
  <div class="breadcrumbs-custom context-dark bg-overlay-60">
    <div class="container">
      <h2 class="breadcrumbs-custom-title">Order Lists</h2>
      <ul class="breadcrumbs-custom-path">
        <li><a href="{{ route('tourguide.dashboard') }}">Home</a></li>
        <li class="active">Order Lists</li>
      </ul>
    </div>
    <div class="box-position" style="background-image: url(images/breadcrumbs-bg.jpg);"></div>
  </div>
</section>
<section class="section section-sm section-top-0 section-fluid section-relative bg-gray-4">
    <div class="container-fluid">
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
</section>
@endsection
