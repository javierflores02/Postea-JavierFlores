@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4" style="heght:100%; width:100%; text-align: center;">Posts generales</h1>
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
    <div class="row mb-4 justify-content-md-center">
        <h4>Cantidad de posts mostrados: {{ $posts->count() }}</h4>
    </div>
    <div class="row mb-4 justify-content-md-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection



