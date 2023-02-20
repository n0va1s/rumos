<x-guest-layout>
    <x-slot name="header">
        <h1 class="text-2xl">Emaús Nacional</h1>
    </x-slot>
    @section('title', 'Alavancas')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <x-offline></x-offline>
        <div class="w-full">
            <h3 class="px-6 py-2 text-2xl">Alavancas (passo 2/2)</h3>
            <p class="px-6 mt-1 text-sm text-gray-600">Mande um incentivo ou uma mensagem carinhosa para os(as) nossos(as) cursistas</p>
            <x-course-detail :course="$course"></x-course-detain>            
        </div>
        <form method="POST" action="{{ route('levers.store') }}">
            @csrf
            <div class="overflow-hidden sm:rounded-md">
                <div class="grid grid-cols-1 gap-6 p-6 bg-white">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="sender" class="block text-sm font-bold text-gray-700">Email (obrigatório)</label>
                        <input type="email" name="sender" autocomplete="nome" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('sender') }}" placeholder="Qual o email do remetente" required autofocus>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="information" class="block text-sm font-bold text-gray-700">Mensagem (obrigatória)</label>
                        <textarea name="information" rows="10" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Qual a sua mensagem? Lembre-se de se identificar, tá?" required>{{ old('information') }}</textarea>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="member_id" class="block text-sm font-bold text-gray-700">Para quem é a mensagem (opcional)</label>
                            <select name="member_id" autocomplete="pessoa" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option value="">Selecione</option>
                                @foreach ($members as $member)
                                <option value="{{ $member->id }}">
                                    {{ $member->first_name }} {{ $member->last_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                    <x-button.save></x-button.save>
                    <x-button.back action="welcome"></x-button.back>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>