<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUsoHerramientumRequest;
use App\Http\Requests\StoreUsoHerramientumRequest;
use App\Http\Requests\UpdateUsoHerramientumRequest;
use App\Models\AgregarEmpleado;
use App\Models\ContratoLaboral;
use App\Models\Herramientum;
use App\Models\UsoHerramientum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsoHerramientaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('uso_herramientum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usoHerramienta = UsoHerramientum::with(['herramienta', 'empleado', 'contrato'])->get();

        return view('admin.usoHerramienta.index', compact('usoHerramienta'));
    }

    public function create()
    {
        abort_if(Gate::denies('uso_herramientum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $herramientas = Herramientum::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $empleados = AgregarEmpleado::pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contratos = ContratoLaboral::pluck('numero_contrato', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.usoHerramienta.create', compact('contratos', 'empleados', 'herramientas'));
    }

    public function store(StoreUsoHerramientumRequest $request)
    {
        $usoHerramientum = UsoHerramientum::create($request->all());

        return redirect()->route('admin.uso-herramienta.index');
    }

    public function edit(UsoHerramientum $usoHerramientum)
    {
        abort_if(Gate::denies('uso_herramientum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $herramientas = Herramientum::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $empleados = AgregarEmpleado::pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contratos = ContratoLaboral::pluck('numero_contrato', 'id')->prepend(trans('global.pleaseSelect'), '');

        $usoHerramientum->load('herramienta', 'empleado', 'contrato');

        return view('admin.usoHerramienta.edit', compact('contratos', 'empleados', 'herramientas', 'usoHerramientum'));
    }

    public function update(UpdateUsoHerramientumRequest $request, UsoHerramientum $usoHerramientum)
    {
        $usoHerramientum->update($request->all());

        return redirect()->route('admin.uso-herramienta.index');
    }

    public function show(UsoHerramientum $usoHerramientum)
    {
        abort_if(Gate::denies('uso_herramientum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usoHerramientum->load('herramienta', 'empleado', 'contrato');

        return view('admin.usoHerramienta.show', compact('usoHerramientum'));
    }

    public function destroy(UsoHerramientum $usoHerramientum)
    {
        abort_if(Gate::denies('uso_herramientum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usoHerramientum->delete();

        return back();
    }

    public function massDestroy(MassDestroyUsoHerramientumRequest $request)
    {
        $usoHerramienta = UsoHerramientum::find(request('ids'));

        foreach ($usoHerramienta as $usoHerramientum) {
            $usoHerramientum->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
