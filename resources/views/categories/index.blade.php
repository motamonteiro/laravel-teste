@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Categories') }}  | <a href="{{ route('categories.create') }}" class="card-link">{{ __('New') }}</a></div>

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
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->updated_at->format('d/m/Y H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="card-link">{{ __('Detail') }}</a>
                                        <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="card-link">{{ __('Edit') }}</a>
                                        <a href="{{ route('categories.delete', ['category' => $category->id]) }}" class="card-link">{{ __('Delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination"> {!! $categories->render() !!} </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
