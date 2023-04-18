<x-app-layout>
    @section('title', 'Rumos')
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <div><livewire:components.success-message /></div>
        <div><livewire:components.offline /></div>
        <div class="bg-white divide-y rounded-lg shadow-sm">
            <div>
                <livewire:components.heading title="Rumos"
                    description="Veja um rumo ou cadastre as informações de cursos já realizados" 
                    label="Cadastrar"
                    form="form.course-form" />
            </div>
            <div class="py-2">
                <livewire:components.community-course />
            </div>
            <div>
                <livewire:rumo.menu />
            </div>
            <div>
                <livewire:form.course-form />
            </div>
            <div>
                <livewire:rumo.orientation-form />
            </div>
            <div>
                <livewire:rumo.support-form />
            </div>
            <div>
                <livewire:rumo.member-form />
            </div>
            <div>
                <livewire:rumo.photo-form />
            </div>
            <div>
                <livewire:rumo.show />
            </div>
        </div>
    </div>
</x-app-layout>
