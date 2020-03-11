@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header">{{ __('Profile') }} - <a href="{{ route('profile.edit') }}" class="card-link">{{ __('Edit') }}</a></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('users.partials.detail')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
