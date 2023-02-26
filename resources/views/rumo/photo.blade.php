<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Rumos')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <livewire:offline />
        <div class="bg-white rounded-lg shadow-sm">
            <div class="flex">
                <div class="w-full basis-5/6">
                    <h3 class="p-4 text-2xl">Foto Oficial</h3>
                    <x-course-detail :course="$course"></x-course-detain>
                </div>
                <div class="p-6 basis-1/6">
                    <x-button.new action="rumos.create"></x-button.new>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('rumos.photo.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                    <svg class="w-20 h-20 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="photo" class="relative mb-4 font-medium text-indigo-600 bg-white rounded-md cursor-pointer focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                            <span>Selecione um arquivo nos formatos PNG ou JPG de até 1MB</span>
                            <input name="photo" type="file" class="sr-only">
                        </label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="course_id" value="{{ $course->id  }}">
            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                <x-button.save></x-button.save>
                <x-button.back action="rumos.back" :id="$course->id"></x-button.back>
            </div>
        </form>
    </div>
</x-app-layout>