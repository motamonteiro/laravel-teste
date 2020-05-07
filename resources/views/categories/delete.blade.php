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
                    <div class="card-header">{{ __('Delete') }} {{ __('Category') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.destroy', ['category' => $category->id]) }}" aria-label="{{ __('Delete') }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE" />
                            @include('categories.partials.detail')
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
