@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-12 btn-row">
                        <a href="{{ route('users.index') }}" class="btn btn-primary">{{ __('Users') }}</a>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">{{ __('Users detail') }}</div>

                    <div class="card-body">
                        @include('users.partials.detail')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
