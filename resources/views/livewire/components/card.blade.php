<div class="p-2 overflow-x-auto shadow-md">
    @if ($items->count() > 0)
    <div class="grid gap-2 dark:border-gray-700 md:mb-12 md:grid-cols-2">
        @foreach ($items as $item)
        <div
            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow sm:w-full hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="grid grid-rows-4 p-2">
                <div class="flex justify-between">
                    <h3 class="font-bold tracking-wide text-gray-700 dark:text-white">
                        {{ $item->course->community->title }}
                    </h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs tracking-wide text-gray-700 dark:text-gray-100">
                        Curso de Emaús
                        {{ $item->course->type->title }}
                        {{ $item->course->number }}/{{ $item->course->start_at | date('Y') }}
                    </p>
                </div>
                <div>
                    <p class="text-xs tracking-wide text-gray-700 dark:text-gray-100">
                        De
                        {{ date('d/m/Y', strtotime($item->course->starts_at)) }} a
                        {{ date('d/m/Y', strtotime($item->course->ends_at)) }}
                    </p>
                </div>
            </div>
            <hr />
            <div class="grid grid-rows-4 gap-2 px-2">
                @if ($item->person)
                    <div>
                        <p class="text-xs font-bold">Para:</p>
                        <p class="text-gray-700">{{ $item->person->first_name }}
                            {{ $item->person->last_name }}</p>
                    </div>
                @endif
                <div>
                    <p class="text-xs font-bold">De:</p>
                    <p class="text-gray-700">{{ $item->sender }}</p>
                </div>
                <div>
                    <p class="text-xs font-bold">Mensagem:</p>
                    <p class="text-gray-700 break-words">{{ $item->information }}</p>
                </div>
                <div class="flex justify-between py-2">
                    <span
                        class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">#fé</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                          
                      
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="p-2">
        {!! $items->links() !!}
    </div>
    @endif
</div>
