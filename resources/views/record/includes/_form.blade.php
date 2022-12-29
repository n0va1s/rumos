<div class="overflow-hidden sm:rounded-md">
    <div class="bg-white p-6">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="person_id" class="block text-sm font-medium text-gray-700">Candidato(a)</label>
                <select name="person_id" autocomplete="nome" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required @if(isset($model)) disabled @endif>
                    <option value="">Selecione</option>
                    @foreach ($options['people'] as $person)
                    <option value="{{ $person->id }}" @if(isset($model) and ($person->id == $model->person_id)) selected @endif>{{ $person->first_name }} {{ $person->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="presenter_id" class="block text-sm font-medium text-gray-700">Apresentante</label>
                <select name="presenter_id" autocomplete="nome" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required @if(isset($model)) disabled @endif>
                    <option value="">Selecione</option>
                    @foreach ($options['people'] as $presenter)
                    <option value="{{ $presenter->id }}" @if(isset($model) and ($presenter->id == $model->presenter_id)) selected @endif>{{ $presenter->first_name }} {{ $presenter->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-6">
                <label for="reason" class="block text-sm font-medium text-gray-700">Preparação para a entrevista</label>
                <textarea name="reason" rows="10" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Por que deseja fazer o Emaús?" @if(isset($model)) disabled @endif>{{ $model->reason }}</textarea>
            </div>
            <div class="col-span-6 sm:col-span-6">
                <fieldset class="mt-2">
                    <legend class="sr-only">Vida Cristã</legend>
                    <p class="text-sm text-gray-500">Conte um pouco da sua caminhada</p>
                    <div class="mt-4 space-y-4">
                        <div class="flex items-start">
                            <div class="flex h-5 items-center">
                                <input name="has_first_communion" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" value="1" @if($model) disabled @endif @if($model->has_first_communion) checked @endif>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="has_first_communion" class="font-medium text-gray-700">Primeira Comunhão</label>
                                <p class="text-gray-500">Você fez a Primeira Comunhão na Igreja Católica ou em uma igreja irmã</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex h-5 items-center">
                                <input name="has_chrism" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" value="1" @if($model) disabled @endif @if($model->has_chrism) checked @endif>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="has_chrism" class="font-medium text-gray-700">Crisma</label>
                                <p class="text-gray-500">Você fez o Crisma na Igreja Católica ou em uma igreja irmã</p>
                            </div>
                        </div>
                    </div>
                </fieldset>
                @if(!$model)
                <fieldset class="mt-2">
                    <legend class="sr-only">Estou de acordo</legend>
                    <p class="text-sm text-gray-500">Para terminar, você precisa concordar com estes termos</p>
                    <div class="mt-4 space-y-4">
                        <div class="flex items-start">
                            <div class="flex h-5 items-center">
                                <input name="has_agreement" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" value="1" required>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="has_agreement" class="font-medium text-gray-700">Concordo com a metologia do Curso de Emaús</label>
                                <p class="text-gray-500">Todas as nossas palestras, vivências e dinãmicas nestes dias de curso são baseados na Teologia Católica</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex h-5 items-center">
                                <input name="has_acceptance" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" value="1" required>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="has_acceptance" class="font-medium text-gray-700">Aceito que meus dados sejam processados pelas Comunidades de Emaús</label>
                                <p class="text-gray-500">Prezamos pela sua privacidade. Seus dados serão armazenados para futuros convites e comunidados das Comunidades de Emaús</p>
                            </div>
                        </div>
                    </div>
                </fieldset>
                @endif
                <!--
                <fieldset class="mt-2">
                    <legend class="sr-only">Informações do lar</legend>
                    <p class="text-sm text-gray-500">Seja profundamente verdadeiro (a)</p>
                    <div class="mt-4 space-y-4">
                        <div class="flex items-center">
                            <input id="alone" name="actual_situation" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="alone" class="ml-3 block text-sm font-medium text-gray-700">Vive só</label>
                        </div>
                        <div class="flex items-center">
                            <input id="married" name="actual_situation" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="married" class="ml-3 block text-sm font-medium text-gray-700">Vive com outra pessoa</label>
                        </div>
                        <div class="flex items-center">
                            <input id="parents" name="actual_situation" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="parents" class="ml-3 block text-sm font-medium text-gray-700">Vive com pais ou parentes</label>
                        </div>
                    </div>
                </fieldset>
                -->
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">@if(!$model) Salvar @else Aprovar @endif</button>
            <!--<a href="{{ route('records.index') }}"><button type="button" class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Voltar</button></a>-->
        </div>
    </div>
</div>