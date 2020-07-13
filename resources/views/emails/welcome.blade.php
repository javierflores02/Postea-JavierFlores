@component('mail::message')
# Hola, {{$user->name}} !

Te damos la bienvenida a Postea.

Gracias por unirte a la comunidad,<br>
{{ config('app.name') }}
@endcomponent
