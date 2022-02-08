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
    <link rel="stylesheet" href="{{ asset('css/vacantefrm.css') }}">

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
                                    @can('admin.home')
                                    <x-jet-dropdown-link href="{{ route('app.vacanteshow') }}">
                                        {{ __('Vacantes') }}
                                    </x-jet-dropdown-link>
                                    @endcan
                                    @can('admin.home')
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
            @if(session()->has('message'))
            <div>{{session()->get('message')}}</div>
            @endif
            <div class="prt1">

                <h1 class="t1">Esta pagina es para editar la vacante</h1>
                <div class="formulario">

                    <h1 class="tEgresado">Editar vacante</h1>

                    <div class="linea"> </div>
                    <form class="formegresado" autocomplete="off" action="{{route('app.vacantesupdate',$vacante)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="campos">
                            <div class="sec1">


                                <div class="campo">
                                    <label>Puesto</label>
                                    <br />
                                    <input type="text" name="puesto" value="{{($vacante->puesto)}}">
                                    @error('puesto')
                                    <small class="text-danger">*Campo requerido</small>
                                    <br>
                                    @enderror
                                </div>

                                <div class="campo">
                                    <label>Funciones o perfil del puesto</label>
                                    <br />
                                    <textarea name="perfi_puesto" cols="30" rows="10">{{($vacante->perfi_puesto)}}</textarea>
                                    @error('perfi_puesto')
                                    <br>
                                    <small class="text-danger">*Campo requerido</small>
                                    @enderror
                                </div>

                                <div class="campo"> <label>Sueldo</label>
                                    <br />
                                    <input type="number" step="any" name="sueldo" value="{{($vacante->sueldo)}}">
                                    @error('sueldo')
                                    <small class="text-danger">*Campo requerido</small>
                                    <br>
                                    @enderror
                                </div>

                            </div>
                            <div class="sec2">


                                <div class="campo">
                                    <label>Ubicación</label>
                                    <br />
                                    <input type="text" name="ubicacion" value="{{($vacante->ubicacion)}}">
                                    @error('ubicacion')
                                    <small class="text-danger">*Campo requerido</small>
                                    <br>
                                    @enderror

                                </div>

                                <div class="campo"> <label>Tipo de contrato</label>
                                    <br />
                                    <select name="tipo_contrato">
                                        <option value="temporal">Temporal</option>
                                        <option value="fijo">Fijo</option>
                                    </select>
                                    <span>Actual: {{($vacante->tipo_contrato)}}</span>
                                    @error('tipo_contrato')
                                    <small class="text-danger">*Campo requerido</small>
                                    <br>
                                    @enderror
                                </div>

                                <div class="campo">
                                    <label>Horario</label>
                                    <br />
                                    <input type="text" name="horario" value="{{($vacante->horario)}}">
                                    @error('horario')
                                    <small class="text-danger">*Campo requerido</small>
                                    <br>
                                    @enderror
                                </div>

                                <div class="campo">
                                    <label>Correo al que se debe enviar los curriculum</label>
                                    <br />
                                    <input type="email" name="correro_curriculum" value="{{($vacante->correro_curriculum)}}">
                                    @error('correro_curriculum')
                                    <small class="text-danger">*Campo requerido</small>
                                    <br>
                                    @enderror
                                </div>

                                <div class="campo"> <label>Persona de contacto</label>
                                    <br />
                                    <input type="text" name="persona_contacto" value="{{($vacante->persona_contacto)}}">
                                    @error('persona_contacto')
                                    <small class="text-danger">*Campo requerido</small>
                                    <br>
                                    @enderror
                                </div>

                                <div class="campo">
                                    <label>Teléfono</label>
                                    <br />
                                    <input type="number" name="telefono" value="{{($vacante->telefono)}}">
                                    @error('telefono')
                                    <small class="text-danger">*Campo requerido</small>
                                    <br>
                                    @enderror

                                </div>
                                <div class="campo">
                                    <label>Asignar Egresado</label>
                                    <br />
                                    <input type="number" name="user_id" value="{{($vacante->user_id)}}">

                                </div>
                            </div>
                        </div>
                        <div class="centrar-btn">
                            <button id="btn-agregar" type="submit">Editar Vacante</button>
                        </div>



                    </form>
                </div>
            </div>
    </div>
    </div>
    </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>