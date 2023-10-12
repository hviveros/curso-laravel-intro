<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- método store , recurso posts -->
                    <form action="{{ route('posts.store') }}" method="POST">
                        
                        <!-- incluimos el formulario del otro archivo -->
                        <!-- el _ indica que el archivo no funciona por sí solo, sino que es parte de otro archivo -->
                        @include('posts._form')

                    </form> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
