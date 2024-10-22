<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Penghimpunan') }}
        </h2>
    </x-slot>

    <div class="sm:py-7">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <div class="justify-between w-full md:flex md:self-center">
                    <x-card.title>
                        {{ __('Data Penghimpunan') }}
                    </x-card.title>
                    <div class="flex gap-4">
                        <div class="ml-auto">
                            <x-button.link-primary href="{{ route('penghimpunan.create') }}">
                                {{ __('Create') }}
                            </x-button.link-primary>
                        </div>
                        <div class="ml-auto">
                            <x-button.link-primary href="{{ route('penghimpunan.importexel') }}">
                                {{ __('Import Exel') }}
                            </x-button.link-primary>
                        </div>
                        <div class="ml-auto">
                            <x-button.link-primary href="{{ route('penghimpunan.importcsv') }}">
                                {{ __('Import CSV') }}
                            </x-button.link-primary>
                        </div>
                        <div class="ml-auto">
                            <x-button.link-primary href="{{ route('penghimpunan.export') }}">
                                {{ __('Export') }}
                            </x-button.link-primary>
                        </div>
                    </div>
                </div>

                @livewire('penghimpunan.table')

            </x-card.app>
        </div>
    </div>
</x-app-layout>
