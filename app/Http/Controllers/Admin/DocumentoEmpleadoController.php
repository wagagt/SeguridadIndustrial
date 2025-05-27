<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentoEmpleadoRequest;
use App\Http\Requests\StoreDocumentoEmpleadoRequest;
use App\Http\Requests\UpdateDocumentoEmpleadoRequest;
use App\Models\AgregarEmpleado;
use App\Models\DocumentoEmpleado;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DocumentoEmpleadoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('documento_empleado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentoEmpleados = DocumentoEmpleado::with(['empleado', 'media'])->get();

        return view('admin.documentoEmpleados.index', compact('documentoEmpleados'));
    }

    public function create()
    {
        abort_if(Gate::denies('documento_empleado_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = AgregarEmpleado::pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.documentoEmpleados.create', compact('empleados'));
    }

    public function store(StoreDocumentoEmpleadoRequest $request)
    {
        $documentoEmpleado = DocumentoEmpleado::create($request->all());

        foreach ($request->input('archivo', []) as $file) {
            $documentoEmpleado->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('archivo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $documentoEmpleado->id]);
        }

        return redirect()->route('admin.documento-empleados.index');
    }

    public function edit(DocumentoEmpleado $documentoEmpleado)
    {
        abort_if(Gate::denies('documento_empleado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = AgregarEmpleado::pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $documentoEmpleado->load('empleado');

        return view('admin.documentoEmpleados.edit', compact('documentoEmpleado', 'empleados'));
    }

    public function update(UpdateDocumentoEmpleadoRequest $request, DocumentoEmpleado $documentoEmpleado)
    {
        $documentoEmpleado->update($request->all());

        if (count($documentoEmpleado->archivo) > 0) {
            foreach ($documentoEmpleado->archivo as $media) {
                if (! in_array($media->file_name, $request->input('archivo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $documentoEmpleado->archivo->pluck('file_name')->toArray();
        foreach ($request->input('archivo', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $documentoEmpleado->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('archivo');
            }
        }

        return redirect()->route('admin.documento-empleados.index');
    }

    public function show(DocumentoEmpleado $documentoEmpleado)
    {
        abort_if(Gate::denies('documento_empleado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentoEmpleado->load('empleado');

        return view('admin.documentoEmpleados.show', compact('documentoEmpleado'));
    }

    public function destroy(DocumentoEmpleado $documentoEmpleado)
    {
        abort_if(Gate::denies('documento_empleado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentoEmpleado->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentoEmpleadoRequest $request)
    {
        $documentoEmpleados = DocumentoEmpleado::find(request('ids'));

        foreach ($documentoEmpleados as $documentoEmpleado) {
            $documentoEmpleado->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('documento_empleado_create') && Gate::denies('documento_empleado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DocumentoEmpleado();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
