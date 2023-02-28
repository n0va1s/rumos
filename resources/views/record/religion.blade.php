<x-guest-layout>
    @section('title', 'Ficha de Inscrição')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="mt-2 bg-white divide-y rounded-lg shadow-sm">
            <h2 class="px-2 py-2 text-2xl">Nova Ficha de Inscrição (passo 3/3)</h2>
            <form method="POST" action="{{ route('records.store') }}">
                @csrf
                <input type="hidden" name="person_id" value="{{isset($person_id) ? $person_id : ''}}">
                <input type="hidden" name="presenter_id" value="{{isset($presenter) ? $presenter->id : ''}}">
                <div class="overflow-hidden sm:rounded-md">
                    <div class="p-6 bg-white">
                        <div class="col-span-6 mt-6 sm:col-span-6">
                            <label for="reason" class="block text-sm font-bold text-gray-700">Preparação para a entrevista</label>
                            <textarea name="reason" rows="10" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Por que deseja fazer o Emaús?" autofocus @if(isset($model)) disabled @endif>{{ isset($model) ? $model->reason : old('reason') }}</textarea>
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <fieldset class="mt-4">
                                <legend class="sr-only">Vida Cristã</legend>
                                <p class="text-sm text-gray-500">Conte um pouco da sua caminhada</p>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input name="has_first_communion" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" value="1" @if(isset($model)) disabled @endif @if(isset($model) and $model->has_first_communion) checked @endif>
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="has_first_communion" class="font-bold text-gray-700">Primeira Comunhão</label>
                                            <p class="text-gray-500">Você fez a Primeira Comunhão na Igreja Católica ou em uma igreja irmã</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input name="has_chrism" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" value="1" @if(isset($model)) disabled @endif @if(isset($model) and $model->has_chrism) checked @endif>
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="has_chrism" class="font-bold text-gray-700">Crisma</label>
                                            <p class="text-gray-500">Você fez o Crisma na Igreja Católica ou em uma igreja irmã</p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            @if(! isset($model))
                            <fieldset class="mt-4">
                                <legend class="sr-only">Estou de acordo</legend>
                                <p class="text-sm text-gray-500">Para terminar, você precisa concordar com estes termos</p>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input name="has_agreement" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" value="1" required>
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="has_agreement" class="font-bold text-gray-700">Concordo com a metologia do Curso de Emaús</label>
                                            <p class="text-gray-500">Todas as nossas palestras, vivências e dinãmicas nestes dias de curso são baseados na Teologia Católica</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input name="has_acceptance" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" value="1" required>
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="has_acceptance" class="font-bold text-gray-700">Aceito que meus dados sejam processados pelas Comunidades de Emaús</label>
                                            <p class="text-gray-500">Prezamos pela sua privacidade. Seus dados serão armazenados para futuros convites e comunidados das Comunidades de Emaús</p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            @endif
                            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                                <x-button class="inline-flex px-4 py-2 text-white bg-indigo-600 border border-transparent rounded-md shadow-sm align-center hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Enviar ficha
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 ml-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>