<div class="p-2 overflow-x-auto shadow-md">
    @if ($items->count() > 0)
        <div class="grid gap-2 dark:border-gray-700 md:mb-12 md:grid-cols-2">
            @foreach ($items as $item)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow sm:w-full hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="grid grid-rows-3 p-2">
                        <div class="inline-flex w-full">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                                {{ $item->course->community->title }}
                            </h3>
                        </div>
                        <div class="flex flex-col w-full">
                            <p class="my-2 text-sm text-gray-700 dark:text-gray-100">
                                Curso de Emaús
                                {{ $item->course->type->title }}
                                {{ $item->course->number }}/{{ $item->course->start_at | date('Y') }}</p>
                        </div>
                        <div class="flex flex-col w-full">
                            <p class="my-2 text-sm font-bold text-gray-700 dark:text-gray-100">
                                De
                                {{ date('d/m/Y', strtotime($item->course->starts_at)) }} a
                                {{ date('d/m/Y', strtotime($item->course->ends_at)) }}
                            </p>
                        </div>
                    </div>
                    <hr />
                    <div class="grid grid-rows-3 gap-2 px-2">
                        @if ($item->person)
                            <div>
                                <small class="text-sm font-bold">Para:</small>
                                <p class="text-base text-gray-700">{{ $item->person->first_name }}
                                    {{ $item->person->last_name }}</p>
                            </div>
                        @endif
                        <div>
                            <small class="text-sm font-bold">De:</small>
                            <p class="text-base text-gray-700">{{ $item->sender }}</p>
                        </div>
                        <div>
                            <small class="text-sm font-bold">Mensagem:</small>
                            <p class="text-base text-gray-700">{{ $item->information }}</p>
                        </div>
                        <div class="py-2">
                            <span
                                class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">#fé</span>
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
