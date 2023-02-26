<div class="p-4 sm:flex sm:justify-between">
    <div class="sm:flex-auto">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-400">{{ $title }}</h2>
        <p class="mt-2 text-sm text-gray-700 dark:text-gray-100">{{ $description }}</p>
    </div>
    @if (!empty($label))
    <div class="mt-4 text-gray-900 cursor-pointer sm:mt-0 sm:ml-16 sm:flex-none">
        <x-button wire:click="$set('showingModal', true)" wire:loading.attr="disabled">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-4 mr-2" role="img">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="ml-1 text-sm font-bold">{{ $label }}</span>
        </x-button>
    </div>
    @endif
</div>
