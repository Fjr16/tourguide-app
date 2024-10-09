@extends('layouts.main.app')

@section('content')
<div class="container-fluid offer-section py-5">
    <div class="container py-5">
        <div class="card">
            <div class="row">
                <div class="col col-12">
                    <div class="card-body">
                        <div class="p-4 bg-white dark:bg-gray-800 shadow">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  --}}
            <div class="row">
                <div class="col col-6">
                    <div class="card-body  ">
                        <div class="p-4 bg-white dark:bg-gray-800 shadow">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-6">
                    <div class="card-body  ">
                        <div class="p-4 bg-white dark:bg-gray-800 shadow">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection