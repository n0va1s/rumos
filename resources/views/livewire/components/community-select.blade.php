<div>
    <label for="{{$name}}" class="block text-sm font-bold text-gray-700">{{$label}}</label>
    <select wire:model="{{$name}}" {{$isRequired ? 'required' : ''}} {{!$isAdmin ? 'disabled' : ''}}
        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
        <option value="">Selecione</option>
        @foreach ($communities as $community)                                    
            <option value="{{ $community->id }}">
                {{ $community->title }}
            </option>
        @endforeach
    </select>
    <div>
        @error('{{$name}}')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
