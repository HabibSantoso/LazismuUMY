<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Data Program Pilar') }}
        </h2>
    </x-slot>

    <div class="sm:py-6">
        <div class="max-w-full mx-auto sm:px-6 sm:space-y-6">
            <x-card.app>
                <x-card.title>
                    {{ __('Create Data Program Pilar') }}
                </x-card.title>
                <x-card.description>
                    {{ __('Create a new Data Program Pilar.') }}
                </x-card.description>
                <div class="max-w-xl">
                    <form method="post" action="{{ route('programpilar.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                        <div>
                            <x-input-label for="pilar_id" :value="__('Pilar')" />
                            <x-select-input id="pilar" name="pilar_id" class="block w-full mt-1">
                                <option value="">{{ __('Select Pilar') }}</option>
                                @foreach ($pilars as $pilar)
                                    <option value="{{ $pilar->id }}"
                                        {{ request('pilar_id') == 'pilar_id' ? 'selected' : '' }}>
                                        {{ $pilar->name }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('pilar_id')" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                                :value="old('name')" required autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
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
