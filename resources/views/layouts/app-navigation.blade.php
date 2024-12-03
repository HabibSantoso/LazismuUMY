<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-full px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between h-24">
            <div class="flex sm:pl-8">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block w-auto h-20 text-gray-800 fill-current dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ms-10 md:flex sm:pl-8">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    @can('viewAny', App\Models\Penghimpunan::class)
                        <x-nav-link :href="route('penghimpunan.index')" :active="request()->routeIs('penghimpunan.*')">
                            {{ __('Penghimpunan') }}
                        </x-nav-link>
                    @endcan

                    @can('viewAny', App\Models\Penyaluran::class)
                        <x-nav-link :href="route('penyaluran.index')" :active="request()->routeIs('penyaluran.*')">
                            {{ __('Penyaluran') }}
                        </x-nav-link>
                    @endcan

                    <x-nav-link href="" class="hidden">
                        {{ __('Pelayanan') }}
                    </x-nav-link>

                    {{-- <x-nav-link :href="route('pilar.index')" :active="request()->routeIs('pilar.*')" class="hidden lg:inline-flex">
                        {{ __('Pilar') }}
                    </x-nav-link>

                    <x-nav-link :href="route('programpilar.index')" :active="request()->routeIs('programpilar.*')" class="hidden lg:inline-flex">
                        {{ __('Program') }}
                    </x-nav-link>

                    <x-nav-link :href="route('sumberdonasi.index')" :active="request()->routeIs('sumberdonasi.*')" class="hidden xl:inline-flex">
                        {{ __('Sumber Donasi') }}
                    </x-nav-link>

                    <x-nav-link :href="route('programsumber.index')" :active="request()->routeIs('programsumber.*')" class="hidden xl:inline-flex">
                        {{ __('Program Sumber') }}
                    </x-nav-link>

                    <x-nav-link :href="route('sumberdana.index')" :active="request()->routeIs('sumberdana.*')" class="hidden xl:inline-flex">
                        {{ __('Sumber Dana') }}
                    </x-nav-link>

                    <x-nav-link :href="route('ashnaf.index')" :active="request()->routeIs('ashnaf.*')" class="hidden 2xl:inline-flex">
                        {{ __('Ashnaf') }}
                    </x-nav-link>

                    <x-nav-link :href="route('provinsi.index')" :active="request()->routeIs('provinsi.*')" class="hidden 2xl:inline-flex">
                        {{ __('Provinsi/Luar Negeri') }}
                    </x-nav-link>

                    <x-nav-link :href="route('kabupaten.index')" :active="request()->routeIs('kabupaten.*')" class="hidden 2xl:inline-flex">
                        {{ __('Kabupaten/Negara') }}
                    </x-nav-link>

                    <x-nav-link :href="route('tahun.index')" :active="request()->routeIs('tahun.*')" class="hidden 2xl:inline-flex">
                        {{ __('Tahun') }}
                    </x-nav-link> --}}



                    {{-- <div class="items-center hidden border-t-2 border-transparent sm:flex">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md 2xl:hidden dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                                    <div>{{ __('Setting') }}</div>

                                    <div class="ms-1">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('pilar.index')" class="lg:hidden">
                                    {{ __('Pilar') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('programpilar.index')" class="lg:hidden">
                                    {{ __('Program') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('sumberdonasi.index')" class="xl:hidden">
                                    {{ __('Sumber Donasi') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('programsumber.index')" class="xl:hidden">
                                    {{ __('Program Sumber') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('sumberdana.index')" class="xl:hidden">
                                    {{ __('Sumber Dana') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('ashnaf.index')" class="2xl:hidden">
                                    {{ __('Ashnaf') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('provinsi.index')" class="2xl:hidden">
                                    {{ __('Provinsi/Luar Negeri') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('kabupaten.index')" class="2xl:hidden">
                                    {{ __('Kabupaten/Negara') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('tahun.index')" class="2xl:hidden">
                                    {{ __('Tahun') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div> --}}
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden border-t-2 border-transparent md:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                            <div class="flex flex-col items-end">
                                <div>
                                    <p class="text-lg">
                                        {{ Auth::user()->name }}
                                    </p>
                                </div>
                                <div>{{ ucfirst(Auth::user()->role) }}</div>
                            </div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="divide-y-2 divide-gray-500">
                            <div>
                                <x-dropdown-link :href="route('home')">
                                    {{ __('Beranda') }}
                                </x-dropdown-link>
                                @can('viewAny', App\Models\User::class)
                                    <x-dropdown-link :href="route('user.index')">
                                        {{ __('Users') }}
                                    </x-dropdown-link>
                                @endcan
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profil') }}
                                </x-dropdown-link>
                            </div>
                            <div>
                                <x-dropdown-link :href="route('programpilar.index')">
                                    {{ __('Program') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('programsumber.index')">
                                    {{ __('Program Sumber') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('sumberdana.index')">
                                    {{ __('Sumber Dana') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('kabupaten.index')">
                                    {{ __('Kabupaten/Negara') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('target.index')">
                                    {{ __('Manage Target') }}
                                </x-dropdown-link>
                            </div>
                            <div>
                                <x-dropdown-link :href="route('ashnaf.index')">
                                    {{ __('Ashnaf') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('pilar.index')">
                                    {{ __('Pilar') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('sumberdonasi.index')">
                                    {{ __('Sumber Donasi') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('provinsi.index')">
                                    {{ __('Provinsi/Luar Negeri') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('tahun.index')">
                                    {{ __('Tahun') }}
                                </x-dropdown-link>
                            </div>
                            <div>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Keluar') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1 divide-y-2 divide-gray-500 divide-dashed">
            <div>
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('penghimpunan.index')" :active="request()->routeIs('penghimpunan.*')">
                    {{ __('Penghimpunan') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('penyaluran.index')" :active="request()->routeIs('penyaluran.*')">
                    {{ __('Penyaluran') }}
                </x-responsive-nav-link>
            </div>
            <div>
                <x-responsive-nav-link :href="route('programpilar.index')" :active="request()->routeIs('programpilar.*')">
                    {{ __('Program') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('programsumber.index')" :active="request()->routeIs('programsumber.*')">
                    {{ __('Program Sumber') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('sumberdana.index')" :active="request()->routeIs('sumberdana.*')">
                    {{ __('Sumber Dana') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('kabupaten.index')" :active="request()->routeIs('kabupaten.*')">
                    {{ __('Kabupaten') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('target.index')" :active="request()->routeIs('kabupaten.*')">
                    {{ __('Manage Target') }}
                </x-responsive-nav-link>
            </div>
            <div>
                <x-responsive-nav-link :href="route('ashnaf.index')" :active="request()->routeIs('ashnaf.*')">
                    {{ __('Ashnaf') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pilar.index')" :active="request()->routeIs('pilar.*')">
                    {{ __('Pilar') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('sumberdonasi.index')" :active="request()->routeIs('sumberdonasi.*')">
                    {{ __('Sumber Donasi') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('provinsi.index')" :active="request()->routeIs('provinsi.*')">
                    {{ __('Provinsi') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('tahun.index')" :active="request()->routeIs('tahun.*')">
                    {{ __('Tahun') }}
                </x-responsive-nav-link>
            </div>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4 sm:px-6">
                <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ ucfirst(Auth::user()->role) }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('home')">
                    {{ __('Beranda') }}
                </x-responsive-nav-link>
                @can('viewAny', App\Models\User::class)
                    <x-responsive-nav-link :href="route('user.index')">
                        {{ __('Users') }}
                    </x-responsive-nav-link>
                @endcan
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Kelar') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
