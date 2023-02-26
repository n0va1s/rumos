<x-app-layout>
    @section('title', 'Alavancas')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <livewire:success-message />
        <livewire:offline />
        <div class="bg-white divide-y rounded-lg shadow-sm">
            <x-heading title="Alavancas" description="Selecione um secretariado, um curso e imprima as alavancas enviadas para um curso" label="" route=""
                route="groups.create" />
            <livewire:community-course />
            <livewire:card resource="Lever" field="course_id" :columns="[
                ['label' => 'Secretariado', 'column' => 'community'],
                ['label' => 'Curso', 'column' => 'course'],
                ['label' => 'Remetente', 'column' => 'sender'],
                ['label' => 'Mensagem', 'column' => 'information'],
            ]" />
        </div>
    </div>
</x-app-layout>
