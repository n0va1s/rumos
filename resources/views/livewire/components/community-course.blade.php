<div>
    <div class="grid grid-cols-1 gap-2 p-4 lg:grid-cols-2">
        <div>
            <label for="community" class="block text-sm font-bold text-gray-700">Secretariado</label>
            <select wire:model="community" id="community" {{!$isAdmin ? 'disabled' : ''}}
                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option value="" selected>Selecione</option>
                @foreach ($communities as $community)
                    <option value="{{ $community->id }}">{{ $community->title }}</option>
                @endforeach
            </select>
        </div>
        @if (!is_null($community))
            <div>
                <label for="course" class="block text-sm font-bold text-gray-700">Curso</label>
                <select wire:model="course" id="course"
                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="">Selecione</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->type->title }} - {{ $course->number }} /
                            {{ $course->start_at | date('Y') }}</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>
</div>
