@extends("layouts.main")

@section('content')
    <div class="flex flex-col justify-left h-screen m-8">
        <h1 class="text-5xl font-bold" style="color: #b60000;">Bienvenido/a, {{ Auth::user()->username }}!</h1>
        <div class="bg-white border-1 border-black p-8 font-montserrat max-w-md w-full mx-auto mt-10 shadow-lg rounded-lg">
            <h2 class="text-3xl font-bold" style="color: #b60000;">Tus departamentos:</h2>
        </div>
    </div>  
@endsection
