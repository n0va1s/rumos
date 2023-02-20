@if(Session::has('success'))
<div>
    <div class="bg-green-100 border-t-4 border-green-500 rounded-b px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div class="py-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="#14532d" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="ml-2 text-green-900">
                <p class="font-bold">Sucesso</p>
                <p class="text-sm">{{ $message }}</p>
            </div>
        </div>
    </div>
</div>
@endif