<nav class="hidden lg:block" id="menu">
    <ul class="flex flex-row gap-8 text-red-600">
        <li>
            <a href="#" wire:click.prevent="switchComponent('home')" class="hover:text-red-800">INICIO</a>
        </li>
        @if (Auth::check())
            <li>
                <a href="#" wire:click.prevent="switchComponent('homeAuth')" class="hover:text-red-800">WORKSPACE</a>
            </li>
            
            <li>
                <a href="#" wire:click.prevent="switchComponent('profile')" class="hover:text-red-800">PERFIL</a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="hover:text-red-800">CERRAR SESIÓN</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @else
            <li>
                <a href="#" wire:click.prevent="switchComponent('login')" class="hover:text-red-800">INICIAR SESIÓN</a>
            </li>
            <li>
                <a href="#" wire:click.prevent="switchComponent('register')" class="hover:text-red-800">REGISTRARSE</a>
            </li>
        @endif
    </ul>
</nav>
