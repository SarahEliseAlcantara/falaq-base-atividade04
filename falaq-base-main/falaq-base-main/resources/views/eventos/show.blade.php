<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $evento->titulo }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-6">
                    <p class="text-gray-600 text-sm">Criado por: {{ $evento->user->name }}</p>
                    <p class="mt-4 text-gray-700">{{ $evento->descricao }}</p>
                </div>

                <hr class="my-6">

                <h3 class="font-semibold text-lg text-gray-800 mb-4">Perguntas</h3>

                <div class="mt-4 space-y-4">
                    @foreach($evento->perguntas as $pergunta)
                        <div class="bg-gray-50 p-4 rounded-lg flex justify-between items-start">
                            <div>
                                <p class="text-gray-800">{{ $pergunta->conteudo }}</p>
                                <p class="text-xs text-gray-500 mt-1">Por: {{ $pergunta->user->name }}</p>
                            </div>

                            @can('delete', $pergunta)
                                <form action="{{ route('perguntas.destroy', $pergunta) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta pergunta?');">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button>Excluir</x-danger-button>
                                </form>
                            @endcan
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    <h4 class="font-semibold text-md text-gray-800 mb-2">Faça uma Pergunta</h4>
                    <form action="{{ route('perguntas.store', $evento) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <textarea name="conteudo" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" required></textarea>
                        </div>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Enviar Pergunta
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
