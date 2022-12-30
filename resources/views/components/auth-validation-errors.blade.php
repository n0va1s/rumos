@props(['errors'])

@if ($errors->any())
<div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md" role="alert">
    <div class="flex">
        <div class="py-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7f1d1d" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
            </svg>
        </div>
        <div class="ml-2 text-red-900">
            <p class="font-bold">Verifique as mensagens abaixo</p>
        </div>
    </div>
    <div class="px-4 py-3">
        <ul class="list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif