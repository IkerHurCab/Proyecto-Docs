<div class="flex flex-col items-center justify-center min-h-screen">
    <div class="bg-white border-1 border-red-600 p-8 font-montserrat max-w-md w-full mx-auto mt-10 shadow-lg rounded-lg">
        <h2 class="text-2xl text-center text-red-600 mb-6">Regístrarse</h2>
        <form action="{{ route('register') }}" method="POST" class="flex flex-col">
            @csrf
            <label for="username" class="text-black mb-2 flex gap-1">Nombre de usuario <p class="text-red-600">*</p></label>
            <input type="text" maxlength="30" name="username" id="username" class="border-1 p-2 rounded @error('username') border-red-600 @else border-black @enderror" value="{{ old('username') }}">
            @error('username')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
            <br>
            <label for="email" class="text-black mb-2 flex gap-1">Correo electrónico <p class="text-red-600">*</p></label>
            <input type="text" maxlength="100" name="email" id="email" class="border-1 p-2 rounded @error('email') border-red-600 @else border-black @enderror" value="{{ old('email') }}">
            @error('email')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
            <br>
            <label for="password" class="text-black mb-2 flex gap-1">Contraseña <p class="text-red-600">*</p></label>
            <input type="password" maxlength="64" name="password" id="password" class="border-1 p-2 rounded @error('password') border-red-600 @else border-black @enderror">
            @error('password')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
            <br>
            <label for="password_confirmation" class="text-black mb-2 flex gap-1">Confirmar contraseña <p class="text-red-600">*</p></label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="border-1 p-2 rounded @error('password_confirmation') border-red-600 @else border-black @enderror">
            @error('password_confirmation')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
                <br>
            <input type="submit" value="Registrarse" class="bg-red-600 text-white p-2 mt-4 cursor-pointer hover:bg-red-800 rounded">
        </form>
    </div>
</div>