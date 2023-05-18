<x-app-layout>
    @section('title', 'Reuniões de Grupo')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <div><livewire:components.success-message /></div>
        <div><livewire:components.offline /></div>
        <div class="bg-white divide-y rounded-lg shadow-sm">
            <div>
                <livewire:components.heading 
                title="Reuniões de Grupo" 
                description="Crie uma nova reunião de grupo" 
                label="Cadastrar" 
                form="form.group-form"
            />
            </div>
            <div>
                <livewire:components.table resource="Group" :columns="[
                    ['label' => 'Secretariado', 'column' => 'community.title'],
                    ['label' => 'Frequência', 'column' => 'frequency.title'],
                ]" edit="Editar" delete="Apagar" />
            </div>
            <div>
                <livewire:form.group-form />
            </div>
        </div>
    </div>
</x-app-layout>
