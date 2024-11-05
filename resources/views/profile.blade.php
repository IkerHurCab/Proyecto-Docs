@extends("layouts.main")
    <title>Perfil - {{ env("APP_NAME") }}</title>
@section('content')
    @livewire('profile-component')
@endsection