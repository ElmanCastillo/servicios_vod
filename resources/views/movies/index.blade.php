@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">movies
                @can('movie-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('movies.create') }}">New movie</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $movie)
                            <tr>
                                <td>{{ $movie->id }}</td>
                                <td>{{ $movie->nombre }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('movies.show',$movie->id) }}">Add a Deseos</a>
                                    @can('movie-edit')
                                        <a class="btn btn-primary" href="{{ route('movies.edit',$movie->id) }}">Ver Ahora</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>
@endsection