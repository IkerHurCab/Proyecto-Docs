<header class="flex bg-white justify-between items-center border-b-1 border-red-600 p-4 font-montserrat">
    <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" class="max-h-8"></a>

    <div class="lg:hidden cursor-pointer ml-2" id="menu-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 hover:text-red-800" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" d="M4 6h16 M4 12h16 M4 18h16" />
        </svg>
    </div>

    <nav class="hidden lg:block" id="menu">
        <ul class="flex flex-row gap-8 text-red-600">
            <li>
                <a href="{{ route('home') }}" class="hover:text-red-800">INICIO</a>
            </li>
            @if (Auth::check())
                <li>
                    <a href="{{ route('homeAuth') }}" class="hover:text-red-800">WORKSPACE</a>
                </li>
                @if (Auth::user()->admin)
                    <li>
                        <a href="{{ route('admin') }}" class="hover:text-red-800">ADMIN</a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('profile') }}" class="hover:text-red-800">PERFIL</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="hover:text-red-800">
                        CERRAR SESIÓN
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" class="hover:text-red-800">INICIAR SESIÓN</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="hover:text-red-800">REGISTRARSE</a>
                </li>
            @endif
        </ul>
    </nav>
</header>

<div class="hidden bg-white border-red-600 text-center overflow-hidden transition-all duration-300 ease-in-out max-h-0"
    id="mobile-menu">
    <nav>
        <ul class="flex flex-col text-red-600">
            <li class="py-2 border-b-1">
                <a href="{{ route('home') }}" class="hover:text-red-800 font-montserrat">INICIO</a>
            </li>
            @if (Auth::check())
                <li class="py-2 border-b-1">
                    <a href="{{ route('homeAuth') }}" class="hover:text-red-800 font-montserrat">WORKSPACE</a>
                </li>
                @if (Auth::user()->admin)
                <li class="py-2 border-b-1">
                    <a href="{{ route('admin') }}" class="hover:text-red-800 font-montserrat">ADMIN</a>
                </li>
                @endif
                <li class="py-2 border-b-1">
                    <a href="{{ route('profile') }}" class="hover:text-red-800 font-montserrat">PERFIL</a>
                </li>
                <li class="py-2 border-b-1">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="hover:text-red-800 font-montserrat">
                        CERRAR SESIÓN
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            @else
                <li class="py-2 border-b-1">
                    <a href="{{ route('login') }}" class="hover:text-red-800 font-montserrat">INICIAR SESIÓN</a>
                </li>
                <li class="py-2 border-b-1">
                    <a href="{{ route('register') }}" class="hover:text-red-800 font-montserrat">REGISTRARSE</a>
                </li>
            @endif
        </ul>
    </nav>
</div>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            setTimeout(() => {
                mobileMenu.classList.remove('max-h-0');
                mobileMenu.classList.add('max-h-52');
            }, 10);
        } else {
            mobileMenu.classList.remove('max-h-52');
            mobileMenu.classList.add('max-h-0');
            mobileMenu.addEventListener('transitionend', () => {
                mobileMenu.classList.add('hidden');
            }, {
                once: true
            });
        }
    });

    window.addEventListener('resize', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        if (window.innerWidth >= 1024) {
            mobileMenu.classList.add('hidden');
            mobileMenu.classList.remove('max-h-52', 'max-h-0');
        }
    });
</script>
