@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">

                        @include('layouts.partials.alert')

                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Mail') }}</th>
                                <th>{{ __('Role') }}</th>
                                <th>{{ __('Updated at') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ __($user->role) }}</td>
                                    <td>{{ $user->updated_at->format('d/m/Y H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="card-link">{{ __('Detail') }}</a>
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="card-link">{{ __('Edit') }}</a>
                                        @if(!$user->is_admin)
                                            <a href="{{ route('users.delete', ['user' => $user->id]) }}" class="card-link">{{ __('Delete') }}</a>
                                            <a href="{{ route('user-permissions.edit', ['user' => $user->id]) }}" class="card-link">{{ __('Permissions') }}</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination"> {!! $users->render() !!} </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
