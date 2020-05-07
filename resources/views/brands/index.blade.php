@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Brands') }}  | <a href="{{ route('brands.create') }}" class="card-link">{{ __('New') }}</a></div>

                    <div class="card-body">

                        @include('layouts.partials.alert')

                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Updated at') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->updated_at->format('d/m/Y H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('brands.show', ['brand' => $brand->id]) }}" class="card-link">{{ __('Detail') }}</a>
                                        <a href="{{ route('brands.edit', ['brand' => $brand->id]) }}" class="card-link">{{ __('Edit') }}</a>
                                        <a href="{{ route('brands.delete', ['brand' => $brand->id]) }}" class="card-link">{{ __('Delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination"> {!! $brands->render() !!} </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
