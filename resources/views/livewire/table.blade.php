<div>
    <div class="flex-auto overflow-hidden md:rounded-lg">
        <div class="flex flex-row items-center justify-between p-2">
            <div class="text-gray-900">
                <label for="search" class="sr-only">Pesquisar</label>
                <input type="text" name="search" wire:model="search" placeholder="Digite para filtrar a tabela"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="text-gray-900 cursor-pointer ml-2">
                <x-button wire:click="$emitTo('group-form', 'showingModal')" wire:loading.attr="disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-4 mr-2" role="img">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span class="ml-1 text-sm font-bold">Cadastrar</span>
                </x-button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full divide-y divide-gray-300">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        @foreach ($columns as $column)
                            <th scope="col" @class([
                                'px-3 py-3.5 text-left text-sm font-semibold text-gray-900  dark:text-white',
                            ])>{{ $column['label'] }}</th>
                        @endforeach
                        @if ($edit)
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Edit</span>
                            </th>
                        @endif
                        @if ($delete)
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Delete</span>
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
                                    <x-button.edit wire:click.prevent="$emit('edit', '{{$item->id}}')"/>
                                </td>
                            @endif
                            @if ($delete)
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-white">
                                    <x-button.del wire:click.prevent="$emit('destroy', '{{$item->id}}')"/>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="py-4">
            {!! $items->links() !!}
        </div>
    </div>
