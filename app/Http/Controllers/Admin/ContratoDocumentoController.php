<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyContratoDocumentoRequest;
use App\Http\Requests\StoreContratoDocumentoRequest;
use App\Http\Requests\UpdateContratoDocumentoRequest;
use App\Models\ContratoDocumento;
use App\Models\ContratoLaboral;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ContratoDocumentoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('contrato_documento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contratoDocumentos = ContratoDocumento::with(['contrato', 'media'])->get();

        return view('admin.contratoDocumentos.index', compact('contratoDocumentos'));
    }

    public function create()
    {
        abort_if(Gate::denies('contrato_documento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contratos = ContratoLaboral::pluck('numero_contrato', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contratoDocumentos.create', compact('contratos'));
    }

    public function store(StoreContratoDocumentoRequest $request)
    {
        $contratoDocumento = ContratoDocumento::create($request->all());

        if ($request->input('archivo', false)) {
            $contratoDocumento->addMedia(storage_path('tmp/uploads/' . basename($request->input('archivo'))))->toMediaCollection('archivo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $contratoDocumento->id]);
        }

        return redirect()->route('admin.contrato-documentos.index');
    }

    public function edit(ContratoDocumento $contratoDocumento)
    {
        abort_if(Gate::denies('contrato_documento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contratos = ContratoLaboral::pluck('numero_contrato', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contratoDocumento->load('contrato');

        return view('admin.contratoDocumentos.edit', compact('contratoDocumento', 'contratos'));
    }

    public function update(UpdateContratoDocumentoRequest $request, ContratoDocumento $contratoDocumento)
    {
        $contratoDocumento->update($request->all());

        if ($request->input('archivo', false)) {
            if (! $contratoDocumento->archivo || $request->input('archivo') !== $contratoDocumento->archivo->file_name) {
                if ($contratoDocumento->archivo) {
                    $contratoDocumento->archivo->delete();
                }
                $contratoDocumento->addMedia(storage_path('tmp/uploads/' . basename($request->input('archivo'))))->toMediaCollection('archivo');
            }
        } elseif ($contratoDocumento->archivo) {
            $contratoDocumento->archivo->delete();
        }

        return redirect()->route('admin.contrato-documentos.index');
    }

    public function show(ContratoDocumento $contratoDocumento)
    {
        abort_if(Gate::denies('contrato_documento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contratoDocumento->load('contrato');

        return view('admin.contratoDocumentos.show', compact('contratoDocumento'));
    }

    public function destroy(ContratoDocumento $contratoDocumento)
    {
        abort_if(Gate::denies('contrato_documento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contratoDocumento->delete();

        return back();
    }

    public function massDestroy(MassDestroyContratoDocumentoRequest $request)
    {
        $contratoDocumentos = ContratoDocumento::find(request('ids'));

        foreach ($contratoDocumentos as $contratoDocumento) {
            $contratoDocumento->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('contrato_documento_create') && Gate::denies('contrato_documento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ContratoDocumento();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
