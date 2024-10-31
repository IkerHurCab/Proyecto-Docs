@extends("layouts.main")

@section("content")
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="bg-white border-1 border-black p-8 font-montserrat max-w-md w-full mx-auto mt-10 shadow-lg rounded-lg">
            <h2 class="text-2xl text-center text-red-600 mb-6">Iniciar Sesión</h2>
            <form action="{{ route('login') }}" method="POST" class="flex flex-col">
                @csrf
                <label for="email" class="text-black mb-2">Correo electrónico</label>
                <input type="email" name="email" id="email" class="border-1 p-2 rounded @error('email') border-red-600 @else border-black @enderror" >
                @error('email')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
                <br>

                <label for="password" class="text-black mb-2">Contraseña</label>
                <input type="password" name="password" id="password" class="border-1 p-2 rounded @error('password') border-red-600 @else border-black @enderror">
                @error('password')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
                <br>

                <input type="submit" value="Iniciar Sesión" class="bg-red-600 text-white p-2 mt-4 cursor-pointer hover:bg-red-800 rounded">
            </form>
        </div>
    </div>
@endsection