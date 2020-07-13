@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4" style="heght:100%; width:100%; text-align: center;">Mis posts</h1>
    </div>
</div>
<div class="container">
@if (count($publicaciones) > 0)
    @foreach( $publicaciones as $publicacion)
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
            <form action="{{ action('PostController@destroy') }}" method="post">
                <input type="hidden" name="id" value="{{ $publicacion->id }}">
                <input class="btn btn-danger mt-2" type="submit" value="Delete" />
                @method('delete')
                @csrf
            </form>
        </div>
    </div>
    @endforeach
@else
    <h1>No has realizado publicaciones aún</h1>
@endif
</div>
@endsection