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
    <link rel="stylesheet" href="{{ asset('css/egresadoshow.css') }}">



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
                                    <x-jet-dropdown-link href="{{ route('app.vacanteshow') }}">
                                        {{ __('Vacantes') }}
                                    </x-jet-dropdown-link>
                                    @endcan
                                    @can('empresa.all')
                                    <x-jet-dropdown-link href="{{ route('app.egresadoshow') }}">
                                        {{ __('Egresados') }}
                                    </x-jet-dropdown-link>
                                    @endcan
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
            <div class="h">
                <h1 class="h-title">Listado De Egresados</h1>
            </div>

            @if(!empty($data) && $data->count())
            @foreach($data as $key => $egresado)
            <div class="container">
                <div class="card-container">
                    <div class="header">
                        <h1 class="titulo">Informacion Basica</h1>
                        <h2 class="t-row">Nombre: {{$egresado->nombre}}</h2>
                        <h2 class="t-row">Apellido: {{$egresado->apellido}}</h2>
                        <h2 class="t-row">Sexo: {{$egresado->sexo}}</h2>
                        <h2 class="t-row">Institucion Educativa: {{$egresado->institucion_educativa}}</h2>
                    </div>
                    <div class="descripcion">
                        <h1 class="titulo">Contactos</h1>
                        <h2 class="t-row">Telefono Recidencial: {{$egresado->telefono_recidencial}}</h2>
                        <h2 class="t-row">Telefono Movil: {{$egresado->telefono_movil}}</h2>
                        <h2 class="t-row">Email: {{$egresado->email}}</h2>
                        <h2 class="t-row">Provinca: {{$egresado->provincia}}</h2>

                    </div>
                    <div class="descripcion">
                        <h1 class="titulo">Educacion</h1>
                        <h2 class="t-row">Carrera Tecnica: {{$egresado->carrera_tecnica}}</h2>
                        <h2 class="t-row">Tecnico Basico: {{$egresado->tecnico_basico}}</h2>
                        <h2 class="t-row">Graduacion: {{$egresado->graduacion}}</h2>
                        <h2 class="t-row">Matricula: {{$egresado->matricula}}</h2>

                    </div>
                    <div class="descripcion">
                        <h1 class="titulo">ID</h1>
                        <h2 class="t-row">{{$egresado->id}}</h2>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="error-div">
                <h2 class="error">No se encuentran vacantes disponibles</h2>
            </div>
            @endif

    </div>
    {!! $data->links() !!}


    <div class="footer">
        <div class="f1">
            <p>© Oficina de Intermediación Laboral y Pasantías del IPISA <span id="year"></span></p>
        </div>
        <div class="orange-l">
        </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>