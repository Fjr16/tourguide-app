@extends('layouts.main.app')

@section('content')
<div class="container-fluid offer-section py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="tab-content">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('assets/img/offer-1.jpg') }}" class="img-fluid w-100 rounded" alt="">
                    </div>
                    <div class="col-md-6 border">
                        <h2 class="fw-bold mb-4">Product Detail</h2>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis amet sequi molestiae tenetur eum mollitia, blanditiis, magnam illo magni error dolore unde perspiciatis tempore et totam corrupti dignissimos aut praesentium?
                        </p>
                        <div class="mb-3">
                            <table class="table">
                                <tbody class="table-group-divider">
                                  <tr>
                                    <td class="border">Mark</td>
                                    <td class="text-end">@mdo</td>
                                  </tr>
                                  <tr>
                                    <td>Jacob</td>
                                    <td class="text-end">@fat</td>
                                  </tr>
                                  <tr class="table-secondary">
                                    <td>Total Pembayaran</td>
                                    <td class="text-end">@twitter</td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-danger py-2 px-4 me-2" href="">Back</a>
                            <button class="btn btn-primary py-2 px-4" type="submit">Pay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection