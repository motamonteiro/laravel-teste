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
                    <div class="card-header">{{ __('Delete') }} {{ __('User') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}" aria-label="{{ __('Delete') }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE" />
                            @include('users.partials.detail')
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
