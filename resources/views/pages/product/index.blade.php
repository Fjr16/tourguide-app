@extends('layouts.main.app')

@section('content')
    <!-- Features Start -->
    <div class="container-fluid feature py-5">
        <div class="container py-5">

            @include('layouts.main.notification')

            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Products</h4>
                <h1 class="display-5 mb-4">Connecting businesses, ideas, and people for greater impact.</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
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
    </div>
    <!-- Features End -->

@endsection
      