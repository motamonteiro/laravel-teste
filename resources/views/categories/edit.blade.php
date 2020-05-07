@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-12 btn-row">
                        <a href="{{ route('categories.index') }}" class="btn btn-primary">{{ __('Categories') }}</a>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">{{ __('Edit') }} {{ __('Category') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}" aria-label="{{ __('Edit') }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" />
                            @include('categories.partials.fields')
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                    <a href="{{ route('categories.index') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
