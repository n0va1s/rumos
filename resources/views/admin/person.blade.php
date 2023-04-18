<x-app-layout>
    @section('title', 'Pessoas')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <div><livewire:components.success-message /></div>
        <div><livewire:components.offline /></div>
        <div class="bg-white divide-y rounded-lg shadow-sm">
            <div>
                <livewire:components.heading 
                title="Cursistas e Membros" 
                description="Cadastre alguém que trabalhou no Curso de Emaús ou novo(a) cursista" 
                label="Cadastrar" 
                form="form.person-form"
            />
            </div>
            <div>
                <livewire:components.table resource="Person" :columns="[
                    ['label' => 'Secretariado', 'column' => 'community'],
                    ['label' => 'Nome', 'column' => 'first_name'],
                    ['label' => 'Email', 'column' => 'email'],
                    ['label' => 'Telefone', 'column' => 'phone'],
                ]" edit="Editar" delete="Apagar" />
            </div>
            <div>
                <livewire:form.person-form />
            </div>
        </div>
    </div>
</x-app-layout>
