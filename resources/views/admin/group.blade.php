<x-app-layout>
    @section('title', 'Reuniões de Grupo')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <div><livewire:success-message /></div>
        <div><livewire:offline /></div>
        <div class="bg-white divide-y rounded-lg shadow-sm">
            <div>
                <livewire:heading 
                title="Reuniões de Grupo" 
                description="Crie uma nova reunião de grupo" 
                label="Cadastrar" 
                form="group-form" 
            />
            </div>
            <div>
                <livewire:table resource="Group" :columns="[
                    ['label' => 'Secretariado', 'column' => 'community'],
                    ['label' => 'Frequência', 'column' => 'frequency'],
                ]" edit="Editar" delete="Apagar" />
            </div>
            <div class="mt-6 divide-y">
                <livewire:group-form />
            </div>
        </div>
    </div>
</x-app-layout>
