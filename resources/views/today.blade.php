@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-5" style="margin: auto auto;">Publicaciones de hoy</h1>
    </div>
</div>
<div class="container">
    @foreach( $posts as $publicacion)
        <div class="row mb-4 justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ action('PostController@show', $publicacion->id) }}">{{ $publicacion->title}}</a>
                        </h5>
                    </div>
                    <img src="{{ asset($publicacion->image) }}" class="card-img-top" alt="...">
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection