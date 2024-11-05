@extends("layouts.main")
    <title>Iniciar sesión - {{ env("APP_NAME") }}</title>
@section("content")
    @livewire('login-component')
@endsection