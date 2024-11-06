@php
    $departments = \App\Models\Department::all();
@endphp

<div>
    <div class="flex flex-col min-h-screen bg-gray-100 p-8">
        <div class="overflow-x-auto">
            <h1 class="text-2xl font-bold">Gestión de departamentos</h1>
            <div class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                ID
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nombre del Departamento
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $department->department_id }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $department->department_name }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm gap-2">
                                    <a href="#" class="text-red-500 hover:text-red-700"
                                        onclick="event.preventDefault(); this.nextElementSibling.submit();">Eliminar</a>
                                    <form action="{{ route('departments.destroy', $department->department_id) }}"
                                        method="POST" class="hidden">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <h2 class="text-xl font-bold my-4 text-center">Agregar nuevo departamento</h2>
            <form action="{{ route('departments.store') }}" method="POST" class="flex flex-col items-center">
                @csrf
                <div class="mb-4">
                    <label for="department_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del
                        Departamento:</label>
                    <input type="text" name="department_name" id="department_name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                    <textarea name="description" id="description"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required></textarea>
                </div>
                <button type="submit"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Agregar Departamento
                </button>
            </form>
        </div>
    </div>


</div>
