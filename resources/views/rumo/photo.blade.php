<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Rumos')
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="bg-white shadow-sm rounded-lg">
            <div class="flex flex-row">
                <div class="basis-5/6 mb-4">
                    <h3 class="p-4 text-2xl">Foto Oficial</h3>
                    <x-course-detail :course="$course"></x-course-detain>
                </div>
                <div class="basis-1/6 p-6">
                    <x-button.new action="rumos.create"></x-button.new>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('rumos.photo.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-20 w-20 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="photo" class="relative mb-4 cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                            <span>Selecione um arquivo nos formatos PNG ou JPG de até 1MB</span>
                            <input name="photo" type="file" class="sr-only">
                        </label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="course_id" value="{{ $course->id  }}">
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                <x-button.save></x-button.save>
                <x-button.back  action="rumos.back" :id="$course->id"></x-button.back>
            </div>
        </form>
    </div>
</x-app-layout>