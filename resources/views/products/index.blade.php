@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Produtos | <a href="#" class="card-link">Novo</a></div>

                <div class="card-body">
                    @include('layouts.partials.alert')
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Marca</th>
                            <th>Categoria</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->brand->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <a href="#" class="card-link">Editar</a>
                                    <a href="#" class="card-link">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination"> {!! $products->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
