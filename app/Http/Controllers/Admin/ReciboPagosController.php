<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyReciboPagoRequest;
use App\Http\Requests\StoreReciboPagoRequest;
use App\Http\Requests\UpdateReciboPagoRequest;
use App\Models\AgregarEmpleado;
use App\Models\ReciboPago;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ReciboPagosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('recibo_pago_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reciboPagos = ReciboPago::with(['empleado', 'media'])->get();

        return view('admin.reciboPagos.index', compact('reciboPagos'));
    }

    public function create()
    {
        abort_if(Gate::denies('recibo_pago_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = AgregarEmpleado::pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reciboPagos.create', compact('empleados'));
    }

    public function store(StoreReciboPagoRequest $request)
    {
        $reciboPago = ReciboPago::create($request->all());

        foreach ($request->input('recibo_pago', []) as $file) {
            $reciboPago->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('recibo_pago');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $reciboPago->id]);
        }

        return redirect()->route('admin.recibo-pagos.index');
    }

    public function edit(ReciboPago $reciboPago)
    {
        abort_if(Gate::denies('recibo_pago_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = AgregarEmpleado::pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reciboPago->load('empleado');

        return view('admin.reciboPagos.edit', compact('empleados', 'reciboPago'));
    }

    public function update(UpdateReciboPagoRequest $request, ReciboPago $reciboPago)
    {
        $reciboPago->update($request->all());

        if (count($reciboPago->recibo_pago) > 0) {
            foreach ($reciboPago->recibo_pago as $media) {
                if (! in_array($media->file_name, $request->input('recibo_pago', []))) {
                    $media->delete();
                }
            }
        }
        $media = $reciboPago->recibo_pago->pluck('file_name')->toArray();
        foreach ($request->input('recibo_pago', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $reciboPago->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('recibo_pago');
            }
        }

        return redirect()->route('admin.recibo-pagos.index');
    }

    public function show(ReciboPago $reciboPago)
    {
        abort_if(Gate::denies('recibo_pago_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reciboPago->load('empleado');

        return view('admin.reciboPagos.show', compact('reciboPago'));
    }

    public function destroy(ReciboPago $reciboPago)
    {
        abort_if(Gate::denies('recibo_pago_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reciboPago->delete();

        return back();
    }

    public function massDestroy(MassDestroyReciboPagoRequest $request)
    {
        $reciboPagos = ReciboPago::find(request('ids'));

        foreach ($reciboPagos as $reciboPago) {
            $reciboPago->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('recibo_pago_create') && Gate::denies('recibo_pago_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ReciboPago();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
