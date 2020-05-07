@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header">{{ __('Profile') }} - <a href="{{ route('profile.edit') }}" class="card-link">{{ __('Edit') }}</a></div>

                    <div class="card-body">
                        @include('users.partials.detail')
                        @if(!$user->is_admin)
                            <form method="POST" action="{{ route('profile.destroy') }}" aria-label="{{ __('Delete') }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
                                <p>{{ __('Delete my account') }}:
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Delete') }}
                                </button>
                                </p>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
