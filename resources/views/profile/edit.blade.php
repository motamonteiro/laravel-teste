@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-12 btn-row">
                        <a href="{{ route('profile.show') }}" class="btn btn-primary">{{ __('Back') }}</a>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">{{ __('Edit') }} {{ __('Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update', ['user' => $user->id]) }}" aria-label="{{ __('Edit') }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" />
                            @include('profile.partials.fields')
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                    <a href="{{ route('profile.show') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
