<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Salas Cadastradas
        </h2>
    </x-slot>

    <div class="py-8 px-6">
        <div class="mb-4">
            <a href="{{ route('salas.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                Nova Sala
            </a>
        </div>

        <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Nome
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Capacidade
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($salas as $sala)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-white">
                                {{ $sala->nome }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-white">
                                {{ $sala->capacidade }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
