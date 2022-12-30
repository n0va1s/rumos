@if ($message = Session::get('success'))
<div class="bg-green-100 border-t-4 border-green-500 rounded-b px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#14532d" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </div>
    <div class="ml-2 text-green-900">
      <p class="font-bold">Sucesso</p>
      <p class="text-sm">{{ $message }}</p>
    </div>
  </div>
</div>
@endif

@if ($message = Session::get('error'))
<div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7f1d1d" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
      </svg>
    </div>
    <div class="ml-2 text-red-900">
      <p class="font-bold">Erro</p>
      <p class="text-sm">{{ $message }}</p>
    </div>
  </div>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="bg-yellow-100 border-t-4 border-yellow-500 rounded-b px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#713f12" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
      </svg>
    </div>
    <div class="ml-2 text-yellow-900">
      <p class="font-bold">Alerta</p>
      <p class="text-sm">{{ $message }}</p>
    </div>
  </div>
</div>
@endif

@if ($message = Session::get('info'))
<div class="bg-blue-100 border-t-4 border-blue-500 rounded-b px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1e3a8a" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
      </svg>
    </div>
    <div class="ml-2 text-blue-900">
      <p class="font-bold">Informação</p>
      <p class="text-sm">{{ $message }}</p>
    </div>
  </div>
</div>
@endif