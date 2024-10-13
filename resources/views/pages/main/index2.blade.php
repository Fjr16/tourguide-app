@extends('layouts.main.app2')

@section('content')
    <!-- Swiper-->
    @include('pages.main.partials.swiper')
    <!-- Section Box Categories-->
    @include('pages.main.partials.boxCategories')
    <!-- Discover New Horizons-->
    @include('pages.main.partials.newHorizon')
    <!--Our Services-->
    @include('pages.main.partials.ourService')
    <!-- Hot tours-->
    @include('pages.main.partials.hotTours')
    <!-- meet the team-->
    @include('pages.main.partials.team')
    <!-- Section Subscribe-->
    @include('pages.main.partials.subscribe')
    <!--Gallery-->
    @include('pages.main.partials.gallery')
@endsection