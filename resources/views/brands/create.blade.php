@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-12 btn-row">
                        <a href="{{ route('brands.index') }}" class="btn btn-primary">{{ __('Brands') }}</a>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">{{ __('Create') }} {{ __('Brand') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('brands.store') }}" aria-label="{{ __('Create') }}">
                            @csrf
                            <input type="hidden" name="_method" value="POST" />
                            @include('brands.partials.fields')
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                    <a href="{{ route('brands.index') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
