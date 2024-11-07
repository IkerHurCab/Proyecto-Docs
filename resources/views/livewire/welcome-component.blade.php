<div class="flex flex-col h-screen bg-gray-100 p-8">
    <h1 class="text-4xl font-bold text-center text-red-700 mb-6">Bienvenido a {{ ENV('APP_NAME') }}</h1>

    <div class="flex flex-col bg-white shadow-md rounded-lg p-6 mt-4">
        <p class="text-lg text-gray-700 mb-4">En {{ ENV('APP_NAME') }}, proporcionamos una plataforma segura y eficiente
            para que nuestros empleados suban y gestionen documentos a sus respectivos departamentos. Nuestro objetivo
            es facilitar la organización y el acceso a la información, mejorando así la productividad y la colaboración
            dentro de la empresa.</p>
        <h2 class="text-lg text-red-700 mb-4 text-xl text-center">Con {{ ENV('APP_NAME') }}, puedes:</h2>
        <ul class="list-disc list-inside text-lg text-gray-700 mx-auto" style="max-width: 600px;">
            <li class="mb-4 flex items-center">
                <svg class="w-6 h-6 text-red-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <strong>Subir documentos de manera rápida y sencilla.</strong>
            </li>
            <li class="mb-4 flex items-center">
                <svg class="w-6 h-6 text-red-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <strong>Organizar archivos por departamento.</strong>
            </li>
            <li class="mb-4 flex items-center">
                <svg class="w-6 h-6 text-red-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <strong>Acceder a tus documentos desde cualquier lugar.</strong>
            </li>
            <li class="mb-4 flex items-center">
                <svg class="w-6 h-6 text-red-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <strong>Colaborar con tus compañeros de trabajo.</strong>
            </li>
        </ul>
    </div>
</div>
