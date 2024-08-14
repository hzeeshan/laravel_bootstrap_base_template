<nav class="navbar navbar-expand-md navbar-transparent bg-transparent shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item">
                    <button class="btn btn-link nav-link" id="btnSwitch"
                        style="border:none; background-color:transparent;">
                        <i class="fas fa-sun"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    const updateIconsAndLogos = () => {
        const currentTheme = document.documentElement.getAttribute('data-bs-theme');
        //const logoLight = document.querySelector('.logo-light');
        //const logoDark = document.querySelector('.logo-dark');

        if (currentTheme === 'dark') {
            //logoLight.style.display = 'none';
            //logoDark.style.display = 'block';
            btnSwitch.innerHTML = '<i class="fas fa-sun"></i>'; // Dark mode icon for light mode switch
        } else {
            //logoLight.style.display = 'block';
            //logoDark.style.display = 'none';
            btnSwitch.innerHTML = '<i class="fas fa-moon"></i>'; // Light mode icon for dark mode switch
        }
    };

    const btnSwitch = document.getElementById('btnSwitch');
    btnSwitch.addEventListener('click', () => {
        const currentTheme = document.documentElement.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

        document.documentElement.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateIconsAndLogos();
    });

    document.addEventListener('DOMContentLoaded', () => {
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-bs-theme', savedTheme);
        updateIconsAndLogos();
    });
</script>
