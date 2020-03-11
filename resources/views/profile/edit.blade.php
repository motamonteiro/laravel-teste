@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-12 btn-row">
                        <a href="{{ route('profile.show') }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">{{ __('Edit') }} {{ __('Profile') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}" aria-label="{{ __('Editar') }}">
                            @csrf
                            @include('users.partials.fields')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
