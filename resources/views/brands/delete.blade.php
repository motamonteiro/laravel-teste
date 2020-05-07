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
                    <div class="card-header">{{ __('Delete') }} {{ __('Brand') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('brands.destroy', ['brand' => $brand->id]) }}" aria-label="{{ __('Delete') }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE" />
                            @include('brands.partials.detail')
                            <p>
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Delete') }}
                                </button>
                            </p>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
