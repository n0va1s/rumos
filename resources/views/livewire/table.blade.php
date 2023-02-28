<div class="flex-auto overflow-hidden md:rounded-lg">
    <div class="flex flex-row items-center justify-between p-2">
        <div class="text-gray-900">
            <label for="search" class="sr-only">Pesquisar</label>
            <input type="text" name="search" wire:model="search" wire:keydown.escape="resetSearch"
                wire:keydown.tab="resetSearch" placeholder="Digite para filtrar a tabela"
                class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
    </div>
    <div class="overflow-x-auto shadow-md">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="font-bold text-gray-700 bg-gray-50">
                <tr>
                    @foreach ($columns as $column)
                        <th scope="col"
                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900  dark:text-white">
                            <a href="#" wire:click.prevent="sortBy('{{ $column['column'] }}')">
                                <div class="flex items-center">
                                    {{ $column['label'] }}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </div>
                            </a>
                        </th>
                    @endforeach
                    @if ($edit)
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">{{ $edit }}</span>
                        </th>
                    @endif
                    @if ($delete)
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">{{ $delete }}</span>
                        </th>
                    @endif
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($items as $item)
                    <tr class="bg-white dark:bg-gray-700">
                        @foreach ($columns as $column)
                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-white">
                                {{ data_get($item, $column['column']) }}</td>
                        @endforeach
                        @if ($edit)
                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-white">
                                <x-button.edit wire:click.prevent="$emit('edit', '{{ $item->id }}')" />
                            </td>
                        @endif
                        @if ($delete)
                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-white">
                                <x-button.del wire:click.prevent="$emit('destroy', '{{ $item->id }}')" />
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4">
        {!! $items->links() !!}
    </div>
</div>
