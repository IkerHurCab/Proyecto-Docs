@extends("layouts.main")
    <title>Panel de Control - {{ env("APP_NAME") }}</title>
@section('content')
    @livewire('controlPanel-component')
@endsection