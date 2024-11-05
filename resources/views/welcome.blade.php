@extends("layouts.main")
    <title>Inicio - {{ env("APP_NAME") }}</title>
@section("content")
    @livewire('welcome-component')
@endsection