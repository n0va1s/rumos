<div>
    <form method="POST" wire:submit.prevent="save()" enctype="multipart/form-data">
        <x-jet-dialog-modal id="photo-{{ now() }}" wire:model="isVisible">
            <x-slot name="title">
                Foto Oficial
            </x-slot>
            <x-slot name="content">
                <div class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="w-20 h-20 mx-auto text-gray-400" stroke="currentColor" fill="none"
                            viewBox="0 0 48 48" aria-hidden="true">
                            <path
                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file"
                                class="relative mb-4 font-medium text-indigo-600 bg-white rounded-md cursor-pointer focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Selecione um arquivo nos formatos PNG ou JPG de até 1MB</span>
                                <input wire:model="file" id="file" type="file" class="sr-only">
                            </label>
                        </div>
                        @if ($file)
                            <img src="{{ $file->temporaryUrl() }}">
                        @endif
                    </div>
                    <input type="hidden" wire:model="course_id">
                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                    <x-button.save></x-button.save>
                    <x-button.close wire:click="closePhotoForm()" />
                </div>
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
