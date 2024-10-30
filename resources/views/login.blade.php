@extends("layouts.main")

@section("content")
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white border-1 border-red-600 p-8 font-montserrat max-w-md w-full mx-auto mt-10 shadow-lg rounded-lg">
            <h2 class="text-2xl text-center text-red-600 mb-6">Iniciar Sesión</h2>
            <form action="{{ route('login') }}" method="POST" class="flex flex-col">
                @csrf
                <label for="email" class="text-red-600 mb-2">Correo electrónico</label>
                <input type="email" name="email" id="email" class="border-1 border-red-600 p-2 mb-4 rounded" required>

                <label for="password" class="text-red-600 mb-2">Contraseña</label>
                <input type="password" name="password" id="password" class="border-1 border-red-600 p-2 mb-4 rounded" required>

                <input type="submit" value="Iniciar Sesión" class="bg-red-600 text-white p-2 mt-4 cursor-pointer hover:bg-red-800 rounded">
            </form>
        </div>
    </div>
@endsection
