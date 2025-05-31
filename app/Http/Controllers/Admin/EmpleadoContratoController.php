<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEmpleadoContratoRequest;
use App\Http\Requests\StoreEmpleadoContratoRequest;
use App\Http\Requests\UpdateEmpleadoContratoRequest;
use App\Models\AgregarEmpleado;
use App\Models\ContratoLaboral;
use App\Models\EmpleadoContrato;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmpleadoContratoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('empleado_contrato_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleadoContratos = EmpleadoContrato::with(['empleado', 'contrato_laboral'])->get();

        return view('admin.empleadoContratos.index', compact('empleadoContratos'));
    }

    public function create()
    {
        abort_if(Gate::denies('empleado_contrato_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = AgregarEmpleado::pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contrato_laborals = ContratoLaboral::pluck('numero_contrato', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.empleadoContratos.create', compact('contrato_laborals', 'empleados'));
    }

    public function store(StoreEmpleadoContratoRequest $request)
    {
        $empleadoContrato = EmpleadoContrato::create($request->all());

        return redirect()->route('admin.empleado-contratos.index');
    }

    public function edit(EmpleadoContrato $empleadoContrato)
    {
        abort_if(Gate::denies('empleado_contrato_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = AgregarEmpleado::pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contrato_laborals = ContratoLaboral::pluck('numero_contrato', 'id')->prepend(trans('global.pleaseSelect'), '');

        $empleadoContrato->load('empleado', 'contrato_laboral');

        return view('admin.empleadoContratos.edit', compact('contrato_laborals', 'empleadoContrato', 'empleados'));
    }

    public function update(UpdateEmpleadoContratoRequest $request, EmpleadoContrato $empleadoContrato)
    {
        $empleadoContrato->update($request->all());

        return redirect()->route('admin.empleado-contratos.index');
    }

    public function show(EmpleadoContrato $empleadoContrato)
    {
        abort_if(Gate::denies('empleado_contrato_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleadoContrato->load('empleado', 'contrato_laboral');

        return view('admin.empleadoContratos.show', compact('empleadoContrato'));
    }

    public function destroy(EmpleadoContrato $empleadoContrato)
    {
        abort_if(Gate::denies('empleado_contrato_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleadoContrato->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmpleadoContratoRequest $request)
    {
        $empleadoContratos = EmpleadoContrato::find(request('ids'));

        foreach ($empleadoContratos as $empleadoContrato) {
            $empleadoContrato->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
