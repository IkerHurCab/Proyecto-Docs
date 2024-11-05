@extends("layouts.main")
    <title>Departmentos - {{ env("APP_NAME") }}</title>
@section('content')
    @livewire('department-component')
@endsection