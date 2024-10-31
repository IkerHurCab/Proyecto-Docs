<footer class="flex flex-col items-center bg-white border-t-1 border-red-600 p-4">
    <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" class="max-h-16 my-4"></a>
    <p class="text-red-600 text-center">
        &copy; {{ date('Y') }} {{ env('APP_NAME') }}. Todos los derechos reservados.
        <img>
    </p>
</footer>
