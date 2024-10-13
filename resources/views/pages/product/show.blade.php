@extends('layouts.main.app2')

@section('content')
    <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title">{{ $item->name ?? 'Unknown' }}</h2>
            <ul class="breadcrumbs-custom-path">
            <li><a href="{{ route('tourguide.dashboard') }}">Tour Package</a></li>
            <li class="active">Tour {{ $item->name ?? 'Unknown' }}</li>
            </ul>
        </div>
        <div class="box-position" style="background-image: url('/assets/asset2/images/breadcrumbs-bg.jpg');"></div>
        </div>
    </section>

    <section class="section section-sm section-first bg-default">
        <div class="container">

            <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> 

        <div class="row row-50 justify-content-center">
            <div class="col-md-6 col-lg-7">
            <div class="row row-30 row-lg-40" data-lightgallery="group">
                <div class="col-12">
                    <div class="oh-desktop">
                        <!-- Thumbnail Joan-->
                        <article class="thumbnail thumbnail-joan wow slideInRight"><a class="thumbnail-joan-figure" href="{{ asset('assets/asset2/images/fullwidth-gallery-6-1200x800-original.jpg') }}" data-lightgallery="item"><img src="images/project-22-700x518.jpg" alt="" width="700" height="518"/></a>
                        <div class="thumbnail-joan-caption">
                            <h5 class="thumbnail-joan-title">Photo name #1</h5>
                        </div>
                        </article>
                    </div>
                </div>
                <div class="col-12">
                    <div class="oh-desktop">
                        <!-- Thumbnail Joan-->
                        <article class="thumbnail thumbnail-joan wow slideInLeft"><a class="thumbnail-joan-figure" href="images/gallery-image-4-1200x800-original.jpg" data-lightgallery="item"><img src="images/project-23-700x518.jpg" alt="" width="700" height="518"/></a>
                        <div class="thumbnail-joan-caption">
                            <h5 class="thumbnail-joan-title">Photo name #2</h5>
                        </div>
                        </article>
                    </div>
                </div>
                <div class="col-12">
                    <div class="oh-desktop">
                        <!-- Thumbnail Joan-->
                        <article class="thumbnail thumbnail-joan wow slideInRight"><a class="thumbnail-joan-figure" href="images/masonry-gallery-7-1200x800-original.jpg" data-lightgallery="item"><img src="images/project-24-700x518.jpg" alt="" width="700" height="518"/></a>
                        <div class="thumbnail-joan-caption">
                            <h5 class="thumbnail-joan-title">Photo name #3</h5>
                        </div>
                        </article>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-6 col-lg-5 position-relative">
            <div class="single-project single-project-4">
                <div class="single-tour-title">
                <h4 class="title-decoration-lines-bottom">Pulau Spongebob {{-- $item->name??'Unknown' --}}, <br class="d-none d-lg-block"> Indonesia<span></span></h4>
                </div>
                <div class="single-tour-price">
                <div class="product-big-price-wrap"><span class="product-big-price">Rp. {{ number_format($item->price ?? 0) }}</span></div>
                </div>
                <p class="text-gray-500">{{ $item->deskripsi ?? '...' }}</p>
                <div class="divider divider-30"></div>
                <ul class="list list-description d-inline-block d-md-block">
                <li><span>Package Name:</span><span>{{ $item->name ?? 'Unknown' }}</span></li>
                <li><span>Cost:</span><span>Rp. {{ number_format($item->price ?? 0) }}</span></li>
                {{-- <li><span>Type:</span><span>Seasonal</span></li> --}}
                {{-- <li><span>Category:</span><span>Exotic Tours</span></li> --}}
                </ul>
                <div class="divider divider-30"></div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-danger py-2 px-4 me-2" onclick="history.back()" >Back</button>
                    <form action="{{ route('tourguide/checkout.process', encrypt($item->id)) }}" method="POST">
                      @csrf
                      {{-- total harga --}}
                      <input type="hidden" name="gross_amount" value="{{ $item->price }}">
                      <button class="btn btn-primary py-2 px-4" type="submit">Checkout</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('scripts')
    @if (session('snapToken'))
      <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
      <script type="text/javascript">
          // document.getElementById('pay-button').onclick = function(){
            // SnapToken acquired from previous step
            snap.pay('{{ session("snapToken") }}', {
                onSuccess: function(result){
                    /* You may add your own implementation here */
                    alert("payment success!"); 
                    console.log(result);
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                onPending: function(result){
                    /* You may add your own implementation here */
                    alert("wating your payment!"); 
                    console.log(result);
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                onError: function(result){
                    /* You may add your own implementation here */
                    alert("payment failed!"); console.log(result);
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                onClose: function(){
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            });
          // };
      </script>
    @endif
@endsection