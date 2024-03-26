<div class="relative mt-6 overflow-x-visible overflow-y-visible rounded-md md:block">
    <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('No.') }}
                </th>
                <th scope="col" class="px-6 py-3 lg:table-cell">
                    {{ __('Jumlah Lembaga') }}
                </th>
                <th scope="col" class="px-6 py-3 lg:table-cell">
                    {{ __('Jumlah Laki-laki') }}
                </th>
                <th scope="col" class="px-6 py-3 lg:table-cell">
                    {{ __('Jumlah Perempuan') }}
                </th>
                <th scope="col" class="py-3 pl-6 pr-2 lg:pr-4">
                    {{ __('Option') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($penerimaManfaats as $penerimaManfaat)
                <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-100 even:dark:bg-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">
                        {{-- loop --}}
                        <div class="flex">
                            <div class="hover:underline whitespace-nowrap">
                                {{ ($penerimaManfaats->currentpage() - 1) * $penerimaManfaats->perpage() + $loop->index + 1 }}
                            </div>

                        </div>
                    </td>

                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            <p>
                                {{ $penerimaManfaat->lembaga_count }}
                            </p>

                        </div>
                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            <p>
                                {{ $penerimaManfaat->male_count }}
                            </p>

                        </div>
                    </td>
                    <td class="px-6 py-4 lg:table-cell">
                        <div class="flex">
                            <p>
                                {{ $penerimaManfaat->female_count }}
                            </p>

                        </div>
                    </td>
                    <td class="py-4 pl-6 pr-2 lg:pr-4">
                        <div class="flex space-x-2 justify-items-start">
                            <a href="{{ route('penerimamanfaat.edit', $penerimaManfaat) }}" class="hover:underline">View</a>
                            <a href="{{ route('penerimamanfaat.edit', $penerimaManfaat) }}"
                                class="text-indigo-500 hover:underline">Edit</a>
                            <a href="{{ route('penerimamanfaat.edit', $penerimaManfaat) }}"
                                class="text-red-500 hover:underline">Delete</a>
                        </div>
                        {{-- <div class="flex justify-items-start">
                            <a href="{{ route('admin.users.edit', $penerimaManfaat) }}"
                            class="hover:underline">Edit</a>
                            @include('penerimaManfaat.partials.action')
                        </div> --}}
                    </td>
                </tr>
            @empty
                <tr class="bg-white dark:bg-gray-800">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">
                        Empty
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
