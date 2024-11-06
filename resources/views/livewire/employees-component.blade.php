@php
    $employees = \App\Models\Employee::where('admin', false)->get();
    $departments = \App\Models\Department::all();
@endphp

<div class="flex flex-col min-h-screen bg-gray-100 p-8">
    <div class="overflow-x-scroll">
        <h1 class="text-2xl font-bold">Gesión de empleados</h1>
        <div class="min-w-full bg-white shadow-md overflow-hidden">
            <div class="flex justify-between mb-4">

                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                ID
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Email
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Departamento
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $employee->id }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $employee->username }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $employee->email }}
                                </td>º
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ optional($departments->where('department_id', $employee->department_id)->first())->department_name }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm flex flex-col gap-2">

                                    <a href="#" class="text-blue-500 hover:text-blue-700"
                                        onclick="event.preventDefault(); this.nextElementSibling.submit();">Promover</a>
                                    <form action="{{ route('employees.promote', $employee->id) }}" method="POST"
                                        class="hidden">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-red-500 hover:text-red-700"></button>
                                    </form>

                                    <a href="#" class="text-red-500 hover:text-red-700"
                                        onclick="event.preventDefault(); this.nextElementSibling.submit();">Despedir</a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                        class="hidden">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"></button>
                                    </form>
                                    <a class="text-gray-500 hover:text-gray-700 hover:cursor-pointer assign-dept text-black hover:text-gray-600" data-id="{{$employee->id}}">Asignar departamento</a>

                                    <script>
                                        document.querySelectorAll('.assign-dept').forEach(function(element) {
                                            element.addEventListener('click', function() {
                                                let employeeId = this.getAttribute('data-id');

                                                let overlay = document.createElement('div');
                                                overlay.style.position = 'fixed';
                                                overlay.style.top = '0';
                                                overlay.style.left = '0';
                                                overlay.style.width = '100%';
                                                overlay.style.height = '100%';
                                                overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
                                                overlay.style.display = 'flex';
                                                overlay.style.justifyContent = 'center';
                                                overlay.style.alignItems = 'center';
                                                overlay.style.zIndex = '1000';

                                                let popup = document.createElement('div');
                                                popup.style.backgroundColor = 'white';
                                                popup.style.padding = '20px';
                                                popup.style.borderRadius = '8px';
                                                popup.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
                                                popup.innerHTML = `
                                                    <h2 class="text-xl font-bold mb-4">Asignar departamento</h2>
                                                    <form id="assignDeptForm" method="POST" class="flex flex-col items-center">
                                                        @method('PUT')
                                                        @csrf
                                                        <input type="number" name="departmentId" placeholder="Ingrese ID del departamento" class="border p-2 mb-4 w-full">
                                                        <button type="submit" class="bg-blue-500 text-white p-2 mt-4 cursor-pointer hover:bg-blue-800 rounded">Asignar</button>
                                                    </form>
                                                `;

                                                overlay.appendChild(popup);
                                                document.body.appendChild(overlay);

                                                document.getElementById('assignDeptForm').addEventListener('submit', function(e) {
                                                    e.preventDefault();
                                                    let departmentId = this.departmentId.value;

                                                    let actionUrl = `{{ url('employees') }}/${employeeId}/department/${departmentId}`;
                                                    this.action = actionUrl;
                                                    this.submit();
                                                });


                                                overlay.addEventListener('click', function(event) {
                                                    if (event.target === overlay) {
                                                        document.body.removeChild(overlay);
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

