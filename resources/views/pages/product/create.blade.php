@extends('layouts.main.app')

@section('content')
    <!-- Features Start -->
    <div class="container-fluid feature py-5">
        <div class="container py-5">

            @include('layouts.main.notification')

            <div class="row">
                <h4 class="text-dark fw-bold">Add Product</h4>
            </div>
            <hr>
            <form action="{{ route('tourguide/product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-8">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                            <input type="text" name="product_name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Product Price</label>
                            <input type="number" name="product_price" class="form-control" id="exampleFormControlInput1" placeholder="Price">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Product description</label>
                            <textarea class="form-control" name="product_desc" id="exampleFormControlTextarea1" rows="3" placeholder="Description about your product"></textarea>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3 d-flex justify-content-center">
                            <input class="form-control image-input" name="product_img" type="file">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success me-2"><i class="bx bx-file"></i> Save</button>
                    <a class="btn btn-danger" href="{{ route('tourguide.product') }}"><i class="bx bx-left-arrow"></i> Back</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Features End -->

@endsection
      