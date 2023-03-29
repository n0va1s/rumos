<x-app-layout>
    @section('title', 'Alavancas')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <div><livewire:success-message /></div>
        <div><livewire:offline /></div>
        <div class="bg-white divide-y rounded-lg shadow-sm">
            <div>
                <livewire:heading 
                    title="Alavancas" 
                    description="Selecione um secretariado, um curso e imprima as alavancas enviadas para um curso" 
                    label=""
                    form=""
                />
            </div>
            <div class="py-2">
                <livewire:community-course />
            </div>
            <div>
                <livewire:card resource="Lever" field="course_id" :columns="[
                    ['label' => 'Secretariado', 'column' => 'community'],
                    ['label' => 'Curso', 'column' => 'course'],
                    ['label' => 'Remetente', 'column' => 'sender'],
                    ['label' => 'Mensagem', 'column' => 'information'],
                ]" />
            </div>
        </div>
    </div>
</x-app-layout>
