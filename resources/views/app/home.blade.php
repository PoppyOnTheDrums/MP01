<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">


    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>


</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('inicio') }}">
                                <x-jet-application-mark class="block h-9 w-auto" />
                            </a>
                        </div>

                        <!-- Navigation Links -->
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if(Auth::check())
                                    <div class="flex">
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ Auth::user()->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </div>

                                    @else
                                    <div class="flex">
                                        <!-- Navigation Links -->

                                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                            <x-jet-nav-link href="{{ route('app.home') }}" :active="request()->routeIs('dashboard')">
                                                {{ __('Home') }}
                                            </x-jet-nav-link>
                                        </div>
                                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                            <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('dashboard')">
                                                {{ __('Login') }}
                                            </x-jet-nav-link>
                                        </div>
                                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                            <x-jet-nav-link href="{{ route('register') }}" :active="request()->routeIs('dashboard')">
                                                {{ __('Register') }}
                                            </x-jet-nav-link>
                                        </div>
                                    </div>
                                    @endif
                                </x-slot>
                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Perfil') }}
                                    </div>
                                    <div class="border-t border-gray-100"></div>
                                    @can('admin.home')
                                    <x-jet-dropdown-link href="{{ route('admin.home') }}">
                                        {{ __('Dashboard') }}
                                    </x-jet-dropdown-link>
                                    @endcan

                                    <!-- Authentication -->
                                    @can('egresado.all')
                                    <x-jet-dropdown-link href="{{ route('app.egresadoform') }}">
                                        {{ __('IDI Egresado') }}
                                    </x-jet-dropdown-link>
                                    @endcan
                                    @can('empresa.all')
                                    <x-jet-dropdown-link href="{{ route('app.empresaform') }}">
                                        {{ __('IDI Empresa') }}
                                    </x-jet-dropdown-link>
                                    @endcan
                                    @can('empresa.all')
                                    <x-jet-dropdown-link href="{{ route('app.vacantes') }}">
                                        {{ __('Vacante') }}
                                    </x-jet-dropdown-link>
                                    @endcan
                                    <x-jet-responsive-nav-link href="{{ route('app.home') }}" :active="request()->routeIs('profile.show')">
                                        {{ __('Inicio') }}
                                    </x-jet-responsive-nav-link>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    </div>

                    <!-- Hamburger -->

                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">


                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        @if(Auth::check())

                        <div>
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                        @endif
                    </div>

                    <div class="mt-3 space-y-1">
                        <!-- Account Management -->
                        @if(Auth::check())
                        <x-jet-responsive-nav-link href="{{ route('app.home') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Inicio') }}
                        </x-jet-responsive-nav-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-responsive-nav-link>
                        </form>

                        @else
                        <x-jet-responsive-nav-link href="{{ route('app.home') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Inicio') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Registro') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Log In') }}
                        </x-jet-responsive-nav-link>
                        @endif

                    </div>
                </div>
            </div>
        </nav>


        <!-- Page Content -->
        <main>
            <!--
         <img class="" src="{{ asset('images/ingenieros.jpg') }}">  -->



            <header>

                <div class="menu-btn"></div>
                <div class="navigation">
                    <div class="navigation-items">

                    </div>
                </div>
            </header>

            <section class="home">
                <video class="video-slide active" src="{{ asset('videos/conference.mp4') }}" autoplay muted loop></video>
                <video class="video-slide" src="{{ asset('videos/workers.mp4') }}" autoplay muted loop></video>
                <video class="video-slide" src="3.mp4" autoplay muted loop></video>
                <video class="video-slide" src="4.mp4" autoplay muted loop></video>
                <video class="video-slide" src="5.mp4" autoplay muted loop></video>
                <div class="content active">
                    <h1><span>¿Eres un<br>Egresado?</span></h1>
                    <p>¡Registrate ahora para aplicar a un puesto de trabajo!<br><br></p>
                    @if(Auth::check())
                    @else
                    <a href="{{ route('register') }}">Registrate</a>

                    @endif
                </div>
                <div class="content">
                    <h1><span>¿Eres una<br>Empresa?</span></h1>
                    <p>Publica las vacantes disponibles para posiciones técnicas, selecciona al candidato/a de tu preferencia y contáctalo.</p>
                    @if(Auth::check())
                    @else
                    <a href="{{ route('register') }}">Registrate</a>

                    @endif
                </div>
                <div class="content">
                    <h1>Adventures.<br><span>Off Road</span></h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <a href="#">Read More</a>
                </div>
                <div class="content">
                    <h1>Road Trip.<br><span>Together</span></h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <a href="#">Read More</a>
                </div>
                <div class="content">
                    <h1>Feel Nature.<br><span>Relax</span></h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <a href="#">Read More</a>
                </div>
                <div class="media-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
                <div class="slider-navigation">
                    <div class="nav-btn active"></div>
                    <div class="nav-btn"></div>
              <!--       <div class="nav-btn"></div>
                    <div class="nav-btn"></div>
                    <div class="nav-btn"></div> -->
                </div>
            </section>

            <div class="seccion1">
                <div class="contenedor1">
                    <div class="caja1">
                        <h2 class="t1 show-on-scroll">Oficina de Intermediación Laboral y Pasantías (OILP)</h2>
                        <p class="texto1 show-on-scroll">
                            La Oficina de Intermediación Laboral y Pasantías (OILP) tiene como objetivo desarrollar procesos de gestión de pasantías, intermediación laboral, orientación laboral y derivación a servicios sociales a jóvenes con formación técnica de los politécnicos y sus Centros Operativos del Sistema (COS) del INFOTEP, que faciliten su acceso al mercado laboral
                        </p>
                    </div>
                    <div class="caja2">
                        <img class="img1 show-on-scroll" src="{{ asset('images/olip.png') }}">
                    </div>
                </div>
            </div>
            <div class="facilities">
                <h1 class="t2 show-on-scroll">Información General<h1>
                        <p></p>

                        <div class="row">
                            <div class="facilities-col show-on-scroll" id="col1">
                                <img src="{{ asset('images/estudiantes1.jpg') }}">
                                <h3>Registrate</h3>
                                <p>Empieza registrándote a la plataforma para que agregues tu información, formes tu currículum y puedas ver las vacantes publicadas por empresas de todo el país para pasantía e inserción laboral.
                                    <br>
                                    <br>
                                    Registrándote en la plataforma es la forma más rápida y sencilla de ser insertado en el mercado laboral.
                                </p>
                            </div>
                            <div class="facilities-col show-on-scroll" id="col2">
                                <img src="{{ asset('images/estudiantes2.jpg') }}">
                                <h3>Fórmate en la Empresa</h3>
                                <p>Gestiona tu pasantía con el apoyo de los orientadores de la OILP, coordinación académica y los coordinadores de carreras.
                                    <br>
                                    <br>
                                    La pasantía es el primer paso para insertarte en el mercado laboral. Da seguimiento y ocúpate, eso te abre puertas al futuro.
                                </p>
                            </div>
                            <div class="facilities-col show-on-scroll" id="col3">
                                <img src="{{ asset('images/estudiantes3.jpg') }}">
                                <h3>Empléate</h3>
                                <p>Busca posiciones vacantes disponibles en la bolsa de empleo exclusiva para jóvenes con formación técnica, además de asesoría gratis, donde un equipo de orientadores, coordinadores y docentes están listos para ayudarte.
                                    <br>
                                    Entra y aplica a las posiciones que se ajusten a tu perfil. La plataforma siempre estará disponible para que puedas entrar y dar seguimiento, actualizar tu perfil y estatus laboral, entre otros.
                                </p>
                            </div>
                        </div>
            </div>
            <div class="cta">
                <h1>Empresas</h1>
                <p>Publica las vacantes disponibles para posiciones técnicas, selecciona al candidato/a de tu preferencia y contáctalo. Un equipo en cada politécnico estará disponible para dar asistencia.

                    Apoya a los jóvenes para que realicen pasantías en su empresa y disminuya la curva de aprendizaje de nuevos empleados, así lograremos ser más competitivos.</p>
                @if(Auth::check())
                @else
                <a href="{{ route('register') }}" class="botonreg">Registrate</a>

                @endif
                <div>
                    <script src="{{ asset('js/show-on-scroll.js') }}"></script>
                    <script type="text/javascript">
                        //Javacript for responsive navigation menu
                        const menuBtn = document.querySelector(".menu-btn");
                        const navigation = document.querySelector(".navigation");

                        menuBtn.addEventListener("click", () => {
                            menuBtn.classList.toggle("active");
                            navigation.classList.toggle("active");
                        });

                        //Javacript for video slider navigation
                        const btns = document.querySelectorAll(".nav-btn");
                        const slides = document.querySelectorAll(".video-slide");
                        const contents = document.querySelectorAll(".content");

                        var sliderNav = function(manual) {
                            btns.forEach((btn) => {
                                btn.classList.remove("active");
                            });

                            slides.forEach((slide) => {
                                slide.classList.remove("active");
                            });

                            contents.forEach((content) => {
                                content.classList.remove("active");
                            });

                            btns[manual].classList.add("active");
                            slides[manual].classList.add("active");
                            contents[manual].classList.add("active");
                        }

                        btns.forEach((btn, i) => {
                            btn.addEventListener("click", () => {
                                sliderNav(i);
                            });
                        });
                    </script>

        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>