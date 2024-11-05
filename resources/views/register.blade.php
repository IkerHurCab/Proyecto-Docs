@extends('layouts.main')
<title>Registro - {{ env('APP_NAME') }}</title>

@section('content')
   @livewire('register-component')
@endsection