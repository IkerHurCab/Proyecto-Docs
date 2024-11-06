<div class="flex flex-col min-h-screen bg-gray-100 p-8">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Panel de Control</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-2">Gestionar Usuarios</h2>
            <p class="text-gray-700 mb-4">Agregar, editar o eliminar usuarios del sistema.</p>
            <a href="{{ route('employeesAdmin') }}" class="text-red-600 hover:text-red-800">Ir a Usuarios</a>
         
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-2">Gestionar Departamentos</h2>
            <p class="text-gray-700 mb-4">Agregar, editar o eliminar departamentos.</p>
            <a href="{{ route('departmentsAdmin') }}" class="text-red-600 hover:text-red-800">Ir a Departamentos</a>
           
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-2">Gestionar Documentos</h2>
            <p class="text-gray-700 mb-4">Agregar, editar o eliminar documentos.</p>
            <a href="{{ route('documentsAdmin') }}" class="text-red-600 hover:text-red-800">Ir a Documentos</a>

        </div>
    </div>
</div>