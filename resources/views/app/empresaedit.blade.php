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
                                    <x-jet-dropdown-link href="{{ route('app.egresadoform') }}">
                                        {{ __('IDI Egresado') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('app.empresaform') }}">
                                        {{ __('IDI Empresa') }}
                                    </x-jet-dropdown-link>
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
            aqui se editara el formularo :D:D:D:D:D
            <div>
                <form autocomplete="off" action="{{route('app.empresaupdate')}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" value="{{$empresa->nombre}}">
                    </div>
                    <div>
                        <label for="nombre">RNC</label>
                        <input type="number" name="rnc" value="{{$empresa->rnc}}">
                    </div>
                    <div>
                        <label for="nombre">¿Desea que se conozca la identidad de su empresa?</label>
                        <div>
                            <label for="visibilidad">Si</label>
                            <input type="radio" name="visibilidad" value="Si">
                        </div>
                        <div>
                            <label for="visibilidad">No</label>
                            <input type="radio" name="visibilidad" value="No">
                        </div>
                    </div>
                    <div>
                        <label for="nombre">¿Dispone su empresa de un Departamento de Formación dentro de la
                            empresa?</label>
                        <div>
                            <label for="DP_Formacion">Si</label>
                            <input type="radio" name="dp_formacion" value="Si">
                        </div>
                        <div>
                            <label for="DP_Formacion">No</label>
                            <input type="radio" name="dp_formacion" value="No">
                        </div>
                    </div>
                    <div>
                        <label for="nombre">Alcance de la empresa</label>
                        <div>
                            <label for="Alcance">Nacional/Local</label>
                            <input type="radio" name="alcance" value="Nacional/Local">
                        </div>
                        <div>
                            <label for="Alcance">Multinacional</label>
                            <input type="radio" name="alcance" value="Multinacional">
                        </div>
                    </div>
                    <div>
                        <label for="nombre">Actividad económica a la que se dedica la empresa</label>
                        <div>
                            <textarea name="actividad_economica" cols="30" rows="10">{{$empresa->actividad_economica}}</textarea>
                        </div>
                    </div>
                    <div>
                        <label for="nombre">Industria</label>
                        <input type="text" name="industria" value="{{$empresa->industria}}">
                    </div>
                    <div>
                        <label for="nombre">Tamaño</label>
                        <input type="number" name="tamano" value="{{$empresa->tamano}}">
                    </div>
                    <div>
                        <label for="nombre">Direccion</label>
                        <input type="text" name="direccion" value="{{$empresa->direccion}}">
                    </div>
                    <div>
                        <label for="nombre">Sector</label>
                        <input type="text" name="sector" value="{{$empresa->sector}}">
                    </div>
                    <div>
                        <label for="nombre">Sección</label>
                        <input type="text" name="seccion" value="{{$empresa->seccion}}">
                    </div>
                    <div>
                        <label for="nombre">Municipio</label>
                        <input type="text" name="municipio" value="{{$empresa->municipio}}">
                    </div>
                    <div>
                        <label for="nombre">Provincia</label>
                        <input type="text" name="provincia" value="{{$empresa->provincia}}">
                    </div>
                    <div>
                        <label for="nombre">País donde opera la empresa</label>
                        <input type="text" name="pais" value="{{$empresa->pais}}">
                    </div>
                    <div>
                        <label for="nombre">Teléfono Principal</label>
                        <input type="number" name="telefono_principal" value="{{$empresa->telefono_principal}}">
                    </div>
                    <div>
                        <label for="nombre">Teléfono Directo</label>
                        <input type="number" name="telefono_directo" value="{{$empresa->telefono_directo}}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-md d-block mx-auto my-2">editar</button>

                </form>
            </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>