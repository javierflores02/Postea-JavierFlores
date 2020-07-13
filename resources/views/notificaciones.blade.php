@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4" style="heght:100%; width:100%; text-align: center;">Notificaciones</h1>
    </div>
</div>
<div class="container my-5">
    <h2>Nuevas notificaciones</h2>
    @if (count($novistas) > 0)
        @foreach( $novistas as $novista)
        <div class="card text-white bg-primary my-3">
            <h5 class="card-header">{{ $novista->data['user_name'] }} acaba de comentar tu post: <i>{{ $novista->data['post_title'] }}</i></h5>
            <div class="card-body">
                <p class="card-text"><i>{{ $novista->data['content'] }}</i></p>
                <p align="right">{{ $novista->created_at->toDateTimeString() }}</p>
                <a href="{{ route('postnoti', ['id'=>$novista->_id]) }}" class="btn btn-light">Ver</a>
            </div>
        </div>
        @endforeach
    @else
        <div class="alert alert-primary" role="alert">
            No tienes nuevas notificaciones!
        </div>
    @endif
</div>
<div class="container my-5">
    <h2>Antiguas notificaciones</h2>
    @if (count($vistas) > 0)
        @foreach( $vistas as $vista)
        <div class="card">
            <h5 class="card-header">{{ $vista->data['user_name'] }} comentó tu post: <i>{{ $vista->data['post_title'] }}</i></h5>
            <div class="card-body">
                <p class="card-text"><i>{{ $vista->data['content'] }}</i></p>
                <p align="right">{{ $vista->created_at->toDateTimeString() }}</p>
                <a href="{{ route('postnoti', ['id'=>$novista->_id]) }}" class="btn btn-primary">Ver</a>
            </div>
        </div>
        @endforeach
    @else
        <div class="alert alert-dark" role="alert">
            No tienes notificaciones antiguas!
        </div>
    @endif
</div>
@endsection