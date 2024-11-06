@extends("layouts.main")
    <title>Documentos - {{ env("APP_NAME") }}</title>
@section("content")
    @livewire('departments-component')
@endsection