<x-app-layout>
    @section('title', 'Fichas do Secretariado')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <div><livewire:components.success-message /></div>
        <div><livewire:components.offline /></div>
        <div class="bg-white divide-y rounded-lg shadow-sm">
            <div>
                <livewire:components.heading 
                    title="Fichas do Secretariado" 
                    description="Aprove uma ficha para o próximo Curso de Emaús" 
                    label=""
                    form=""
                    route=""
                />
            </div>
            <div>
                <livewire:components.table resource="Record" :columns="[
                    ['label' => 'Secretariado', 'column' => 'community'],
                    ['label' => 'Nome', 'column' => 'full_name'],
                    ['label' => 'Data', 'column' => 'created_at_fmt'],
                ]" edit="Abrir" event="open" delete="Apagar" paginate="15" />
            </div>
            <div>
                <livewire:form.record-form />
            </div>
        </div>
    </div>
</x-app-layout>
