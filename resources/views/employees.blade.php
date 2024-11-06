@extends("layouts.main")
    <title>Empleados - {{ env("APP_NAME") }}</title>
@section("content")
    @livewire('employees-component')
@endsection