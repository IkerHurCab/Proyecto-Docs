<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use App\Models\Department;

class DocumentController extends Controller
{
    public function upload(Request $request, $department_id)
    {
        $request->validate([
            'document' => 'required|file|mimes:pdf,doc,docx',
            'document_name' => 'required|string|max:255|unique:documents,document_name,NULL,id,department_id,' . $department_id,
            'description' => 'required|string|max:255',
        ], [
            'document.required' => 'El documento es obligatorio.',
            'document.file' => 'El documento debe ser un archivo.',
            'document.mimes' => 'El documento debe ser un archivo de tipo: pdf, doc, docx.',
            'document_name.required' => 'El nombre del documento es obligatorio.',
            'document_name.string' => 'El nombre del documento debe ser una cadena de texto.',
            'document_name.max' => 'El nombre del documento no debe exceder los 255 caracteres.',
            'document_name.unique' => 'El nombre del documento ya existe en este departamento.',
            'description.required' => 'La descripción es obligatoria.',
            'description.string' => 'La descripción debe ser una cadena de texto.',
            'description.max' => 'La descripción no debe exceder los 255 caracteres.',
        ]);

        $department = Department::findOrFail($department_id);
        $user = Auth::user();

        $path = $request->file('document')->store('documents');

        $document = new Document();
        $document->department_id = $department->department_id;
        $document->employee_id = $user->id;
        $document->document_name = $request->input('document_name');
        $document->description = $request->input('description');
        $document->document_path = $path;
        $document->save();

        return redirect()->back()->with('success', 'Documento subido exitosamente.');
    }
}