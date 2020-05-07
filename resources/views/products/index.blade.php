@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}  | <a href="{{ route('products.create') }}" class="card-link">{{ __('New') }}</a></div>

                    <div class="card-body">

                        @include('layouts.partials.alert')

                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Brand') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Updated at') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->updated_at->format('d/m/Y H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('products.show', ['product' => $product->id]) }}" class="card-link">{{ __('Detail') }}</a>
                                        <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="card-link">{{ __('Edit') }}</a>
                                        <a href="{{ route('products.delete', ['product' => $product->id]) }}" class="card-link">{{ __('Delete') }}</a>
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
