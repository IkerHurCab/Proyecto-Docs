<div class="flex flex-col min-h-screen bg-gray-100 p-8">
    @php
        $department = \App\Models\Department::find(request()->route('id'));
        $documents = \App\Models\Document::where('department_id', $department->department_id)->get();

        $myDocuments = \App\Models\Document::where('department_id', $department->department_id)
            ->where('employee_id', Auth::user()->id)
            ->get();
    @endphp

    @if ($department)
        <div class="bg-white border-1 border-gray-300 p-10 font-montserrat w-full max-w-4xl mx-auto my-8 shadow-lg rounded-lg flex-grow">
            <h1 class="text-5xl font-bold text-center mb-6" style="color: #b60000;">{{ $department->department_name }}</h1>
            <p class="text-xl text-gray-700 leading-relaxed">{{ $department->description }}</p>

            <h2 class="text-3xl font-bold text-center mb-6" style="color: #b60000;">Documentos</h2>
            <div class="flex flex-col mt-8 space-y-4">
                @foreach ($documents as $document)
                <div class="flex flex-col bg-gray-200 p-4 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h4 class="text-lg">{{ $document->document_name }}</h4>
                        <a href="{{ Storage::url($document->document_path) }}" class="text-red-500" download>Descargar</a>
                    </div>
                    <p class="text-lg text-gray-400">{{ $document->description }}</p>
                </div>
                @endforeach
            </div>

            <h2 class="text-3xl font-bold text-center mt-8 mb-6" style="color: #b60000;">Mis Documentos</h2>
            <div class="flex flex-col mt-8 space-y-4">
                @foreach ($myDocuments as $document)
                <div class="flex flex-col bg-gray-200 p-4 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h4 class="text-lg">{{ $document->document_name }}</h4>
                        <a href="{{ Storage::url($document->document_path) }}" class="text-red-500" download>Descargar</a>
                    </div>
                    <p class="text-lg text-gray-400 text-center">{{ $document->description }}</p>
                </div>
                @endforeach

                @if ($myDocuments->count() == 0)
                    <p class="text-lg text-gray-400">Todavía no has subido ningún documento.</p>
                @endif

            <h3 class="text-xl font-bold mt-8 mb-6" style="color: #b60000;">Subir Documento</h3>
            <form action="{{ route('documents.upload', $department->department_id) }}" method="POST" enctype="multipart/form-data" class="mt-8 bg-gray-200 p-6 rounded-lg shadow-md">
                @csrf
                <div class="flex flex-col space-y-4">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="document_name">
                        Nombre del documento
                    </label>
                    <input type="text" name="document_name" placeholder="Nombre del documento" class="p-2 border-1 rounded @error('document_name') border-red-600 @else border-black @enderror" value="{{ old('document_name') }}">
                    @error('document_name')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror

                    <label class="block text-gray-700 text-sm font-bold" for="document">
                        Selecciona un documento
                    </label>
                    <input type="file" name="document" class="p-2 border-1 rounded @error('document') border-red-600 @else border-black @enderror">
                    @error('document')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        Descripción del documento
                    </label>
                    <input type="text" name="description" placeholder="Descripción del documento" class="p-2 border-1 rounded @error('description') border-red-600 @else border-black @enderror" value="{{ old('description') }}">
                    @error('description')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Subir Documento
                    </button>
                </div>
            </form>
        </div>
    @else
        <div class="bg-white border-1 border-gray-300 p-10 font-montserrat w-full max-w-4xl mx-auto my-8 shadow-lg rounded-lg flex-grow">
            <h1 class="text-5xl font-bold text-center mb-6" style="color: #b60000;">Departamento no encontrado</h1>
        </div>
    @endif
</div>