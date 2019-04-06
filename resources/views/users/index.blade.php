@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Usuários</div>

                    <div class="card-body">

                        @include('layouts.partials.alert')

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Tipo</th>
                                <th>Criado em</th>
                                <th>Atualizado em</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at->format('d/m/Y H:i:s') }}</td>
                                    <td>{{ $user->updated_at->format('d/m/Y H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="card-link">Detalhar</a>
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="card-link">Editar</a>
                                        <a href="#" class="card-link">Excluir</a>
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
