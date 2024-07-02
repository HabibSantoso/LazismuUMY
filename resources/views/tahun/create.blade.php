<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Data Tahun') }}
        </h2>
    </x-slot>

    <div class="sm:py-7">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __('Create Data Tahun') }}
                </x-card.title>
                <x-card.description>
                    {{ __('Create a new Data Tahun') }}
                </x-card.description>
                <div class="max-w-xl">
                    <form method="post" action="{{ route('tahun.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                        <div>
                            <x-input-label for="tahun" :value="__('Tahun')" />
                            <x-text-input id="tahun" name="tahun" type="text" class="block w-full mt-1"
                                :value="old('tahun')" required autocomplete="tahun" />
                            <x-input-error class="mt-2" :messages="$errors->get('tahun')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-button.primary>{{ __('Save') }}</x-button.primary>
                        </div>
                    </form>
                </div>
            </x-card.app>
        </div>
    </div>
</x-app-layout>
