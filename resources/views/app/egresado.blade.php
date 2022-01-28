<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/egresado.css') }}">
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
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ Auth::user()->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                               
                                    @else
                                    <div class="flex">
                                        <!-- Navigation Links -->

                                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                            <x-jet-nav-link href="{{ route('app.home') }}"
                                                :active="request()->routeIs('dashboard')">
                                                {{ __('Home') }}
                                            </x-jet-nav-link>
                                        </div>
                                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                            <x-jet-nav-link href="{{ route('login') }}"
                                                :active="request()->routeIs('dashboard')">
                                                {{ __('Login') }}
                                            </x-jet-nav-link>
                                        </div>
                                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                            <x-jet-nav-link href="{{ route('register') }}"
                                                :active="request()->routeIs('dashboard')">
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
                                    <x-jet-dropdown-link href="{{ route('app.egresadoform') }}">
                                        {{ __('IDI Egresado') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('app.empresaform') }}">
                                        {{ __('IDI Empresa') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('app.vacantes') }}">
                                        {{ __('Vacante') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-responsive-nav-link href="{{ route('app.home') }}"
                                        :active="request()->routeIs('profile.show')">
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
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
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
                        <x-jet-responsive-nav-link href="{{ route('app.home') }}"
                            :active="request()->routeIs('profile.show')">
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
                        <x-jet-responsive-nav-link href="{{ route('app.home') }}"
                            :active="request()->routeIs('profile.show')">
                            {{ __('Inicio') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('register') }}"
                            :active="request()->routeIs('profile.show')">
                            {{ __('Registro') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('login') }}"
                            :active="request()->routeIs('profile.show')">
                            {{ __('Log In') }}
                        </x-jet-responsive-nav-link>
                        @endif

                    </div>
                </div>
            </div>
        </nav>


        <!-- Page Content -->
        <main>
            <div class="prt1">
            <h1 class="t1">En esta página el egresado llenará su información</h1>
        <div>
            <div class="formulario">

                <h1 class="tEgresado">Egresado</h1>
                <div class="linea"> </div>
                <form class="formegresado" autocomplete="off" action="{{route('app.egresadostore')}}" method="POST">
                    @csrf
                <div class="campos">
                <div class="sec1">
                    <div class="campo">
                        <label class="lab" for="nombre">Año de Graduación</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="number" name="graduacion">
                    </div>
                    <div class="campo">
                        <label for="nombre">Institución educativa a la que pertenece</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="text" name="institucion_educativa">
                    </div>
                    <div class="campo">
                        <label for="nombre">Curso</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="text" name="curso">
                    </div>
                    <div class="campo">
                        <label for="nombre">Matrícula</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="number" name="matricula">
                    </div>
                    <div class="campo">
                        <label for="nombre">Cédula de Identidad</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="number" name="cedula">
                    </div>
                    <div class="campo">
                        <label for="nombre">Carrera Técnica</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="text" name="carrera_tecnica">
                    </div>
                    <div class="campo">
                        <label for="nombre">Técnico Básico</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="text" name="tecnico_basico">
                    </div>
                    <div class="campo">
                        <label for="nombre">Nombres</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="text" name="nombre">
                    </div>
                    <div class="campo">
                        <label for="nombre">Apellidos</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="text" name="apellido">
                    </div>
                    <div class="campo">
                        <label for="nombre">Fecha de Nacimiento</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="date" name="fecha_nac">
                    </div>
                    <div class="campo">
                        <label for="nombre">Sexo</label>
                        <div>
                            <label for="nombre">Masculino</label>
                            <input type="radio" name="sexo" value="masculino">
                        </div>
                        <div>
                            <label for="nombre">Femenino</label>
                            <input type="radio" name="sexo" value="femenino">
                        </div>
                    </div>
                        </div>
                    <div class="sec2">
                    <div class="campo">
                        <label for="nombre">Dirección</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="text" name="direccion">
                    </div>
                    <div class="campo">
                        <label for="nombre">Sector</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="text" name="sector">
                    </div>
                    <div class="campo">
                        <label for="nombre">Sección</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="text" name="seccion">
                    </div>
                    <div class="campo">
                        <label for="nombre">Municipio</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="text" name="municipio">
                    </div>
                    <div class="campo">
                        <label for="nombre">Provincia</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="text" name="provincia">
                    </div>
                    <div class="campo">
                        <label for="nombre">País de Nacionalidad</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="text" name="pais_nacionalidad">
                    </div>
                    <div class="campo">
                        <label for="nombre">Teléfono Residencial</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="number" name="telefono_recidencial">
                    </div>
                    <div class="campo">
                        <label for="nombre">Teléfono Móvil</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="number" name="telefono_movil">
                    </div>
                    <div class="campo">
                        <label for="nombre">Posee licencia de conducir?</label>
                        <br>
                        <div class="espacio"></div>

                        <input type="checkbox" name="licencia" value="si">
                    </div>
                    <div class="campo">
                        <label for="nombre">Posee vehículo propio?</label>

                        <br>
                        <div class="espacio"></div>

                        <input type="checkbox" name="vehiculo" value="si">
                    </div>
                    <div class="campo">
                        <label for="nombre">Email</label>
                        <br>
                        <div class="espacio"></div>

                        <input class="caja" type="email" name="email">
                    </div>
                    </div>
                </div>
                <div class="centrar-btn">
                    <button id="btn-agregar" type="submit" class="btn btn-primary btn-md d-block mx-auto my-2">Agregar</button>
                </div>
                </form>
                </div>
            </div>
</div> 
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>