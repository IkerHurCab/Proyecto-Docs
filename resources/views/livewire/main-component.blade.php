<div>
    @livewire('header-livewire')
    @if ($currentComponent === 'welcome')
        @livewire('welcome-component')
    @elseif ($currentComponent === 'home')
        @livewire('home-component')
    @elseif ($currentComponent === 'login')
        @livewire('login-component')
    @elseif ($currentComponent === 'register')
        @livewire('register-component')
    @elseif ($currentComponent === 'profile')
        @livewire('profile-component')
    @endif
</div>
