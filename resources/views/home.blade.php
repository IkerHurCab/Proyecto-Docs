@extends("layouts.main")
    <title>Workspace - {{ env("APP_NAME") }}</title>
@section('content')
    @livewire('home-component')
@endsection
