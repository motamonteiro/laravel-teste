@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    {{ __('Hello') }}, {{ app()['auth']->user()->name }}

                    @if(app()['auth']->user()->is_admin)
                        <br>{{ __('You are the system admin') }}
                    @endif
                    <br>
                    <ul>
                    @foreach($permissions as $permission)
                        <li>
                            <a href="{{ route($permission->route) }}" class="card-link">{{ __($permission->name) }}</a>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
