@extends('layouts.main.app2')

@section('content')
    <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title">Tour Package</h2>
            <ul class="breadcrumbs-custom-path">
            <li><a href="{{ route('tourguide.dashboard') }}">Home</a></li>
            <li class="active">Tour Package</li>
            </ul>
        </div>
        <div class="box-position" style="background-image: url('/assets/asset2/images/breadcrumbs-bg.jpg');"></div>
        </div>
    </section>
    <!-- Features Start -->
    {{-- <div class="container-fluid feature py-5">
        <div class="container py-5">

            @include('layouts.main.notification')
            <div class="row my-3 wow fadeInUp">
                <a class="btn btn-primary" href="{{ route('tourguide/product.create') }}"><i class="bx bx-plus"></i> Add Product</a>
            </div>
            <div class="row g-4">
                @foreach ($data as $item)
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="feature-item p-4">
                            <div class="d-flex justify-content-center pb-2">
                                <a href="{{ route('tourguide/product.edit', encrypt($item->id)) }}" class="btn btn-sm btn-warning text-white me-1 p-1"><i class="bx bx-edit"></i></a>
                                <form action="{{ route('tourguide/product.destroy', encrypt($item->id)) }}" method="POST" onsubmit="return confirm('Are you sure to delete this product ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger p-1"><i class="bx bx-trash"></i></button>
                                </form>
                            </div>
                            <div class="feature-icon p-4 mb-4">
                                @if ($item->image)
                                    <img src="{{ $item->image }}" alt="">
                                @else
                                    <i class='bx bxs-image text-grey' style="font-size: 100px"></i>
                                @endif
                            </div>
                            <h4 class="text-uppercase">{{ $item->name ?? '-' }}</h4>
                            <h5 class="text-primary small">Rp. {{ number_format($item->price ?? 0) }}</h4>
                            <p class="mb-4">{{ Str::limit($item->deskripsi, 80, '...') }}</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="{{ route('tourguide.checkout', encrypt($item->id)) }}">Get This</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <!-- Features End -->

    <section class="section section-xl bg-default">
        <div class="container">
          <div class="row-sm row-40 row-md-50 justify-content-center">
            @foreach ($data as $item)    
                <div class="col-sm-12 col-md-12 wow fadeInRight">
                <!-- Product Big-->
                <article class="product-big">
                    <div class="unit flex-column flex-md-row align-items-md-stretch">
                    <div class="unit-left"><a class="product-big-figure" href="{{ route('tourguide/product.show', encrypt($item->id)) }}"><img src="{{ asset('assets/asset2/images/product-big-1-600x366.jpg') }}" alt="" width="600" height="366"/></a></div>
                    <div class="unit-body">
                        <div class="product-big-body">
                        <h5 class="product-big-title"><a href="{{ route('tourguide/product.show', encrypt($item->id)) }}">{{ $item->name ?? 'Unknown' }}</a></h5>
                        {{-- <div class="group-sm group-middle justify-content-start">
                            <div class="product-big-rating"><span class="icon material-icons-star"></span><span class="icon material-icons-star"></span><span class="icon material-icons-star"></span><span class="icon material-icons-star"></span><span class="icon material-icons-star_half"></span></div><a class="product-big-reviews" href="#"></a>
                        </div> --}}
                        <p class="product-big-text">{{ Str::limit($item->deskripsi,100, '...') }}</p>
                        <a class="button button-black-outline button-ujarak" href="{{ route('tourguide/product.show', encrypt($item->id)) }}">Detail</a>
                        <div class="product-big-price-wrap"><span class="product-big-price">Rp. {{ number_format($item->price ?? 0) }}</span></div>
                        </div>
                    </div>
                    </div>
                </article>
                </div>
            @endforeach
            <!-- Bootstrap Pagination-->
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item page-item-control disabled"><a class="page-link" href="#" aria-label="Previous"><span class="icon" aria-hidden="true"></span></a></li>
                <li class="page-item active"><span class="page-link">1</span></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item page-item-control"><a class="page-link" href="#" aria-label="Next"><span class="icon" aria-hidden="true"></span></a></li>
              </ul>
            </nav>
          </div>
        </div>
    </section>
@endsection
      