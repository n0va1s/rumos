<x-app-layout>
    @section('title', 'Reuniões de Grupo')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <livewire:success-message />
        <x-offline />
        <div class="bg-white divide-y rounded-lg shadow-sm">
            <x-heading title="Reuniões de Grupo" description="Crie uma nova reunião de grupo" label="" route=""
                route="groups.create" />
            <livewire:table resource="Group" :columns="[
                ['label' => 'Secretariado', 'column' => 'community.title'],
                ['label' => 'Frequência', 'column' => 'frequency.title'],
            ]" edit="Editar" delete="Apagar" />
            <livewire:group-form />
        </div>
    </div>
</x-app-layout>
