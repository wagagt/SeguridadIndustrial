<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHorasTrabajadaRequest;
use App\Http\Requests\StoreHorasTrabajadaRequest;
use App\Http\Requests\UpdateHorasTrabajadaRequest;
use App\Models\AgregarEmpleado;
use App\Models\ContratoLaboral;
use App\Models\HorasTrabajada;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HorasTrabajadasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('horas_trabajada_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horasTrabajadas = HorasTrabajada::with(['empleado', 'contrato_laboral'])->get();

        return view('admin.horasTrabajadas.index', compact('horasTrabajadas'));
    }

    public function create()
    {
        abort_if(Gate::denies('horas_trabajada_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = AgregarEmpleado::pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contrato_laborals = ContratoLaboral::pluck('numero_contrato', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.horasTrabajadas.create', compact('contrato_laborals', 'empleados'));
    }

    public function store(StoreHorasTrabajadaRequest $request)
    {
        $horasTrabajada = HorasTrabajada::create($request->all());

        return redirect()->route('admin.horas-trabajadas.index');
    }

    public function edit(HorasTrabajada $horasTrabajada)
    {
        abort_if(Gate::denies('horas_trabajada_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = AgregarEmpleado::pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contrato_laborals = ContratoLaboral::pluck('numero_contrato', 'id')->prepend(trans('global.pleaseSelect'), '');

        $horasTrabajada->load('empleado', 'contrato_laboral');

        return view('admin.horasTrabajadas.edit', compact('contrato_laborals', 'empleados', 'horasTrabajada'));
    }

    public function update(UpdateHorasTrabajadaRequest $request, HorasTrabajada $horasTrabajada)
    {
        $horasTrabajada->update($request->all());

        return redirect()->route('admin.horas-trabajadas.index');
    }

    public function show(HorasTrabajada $horasTrabajada)
    {
        abort_if(Gate::denies('horas_trabajada_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horasTrabajada->load('empleado', 'contrato_laboral');

        return view('admin.horasTrabajadas.show', compact('horasTrabajada'));
    }

    public function destroy(HorasTrabajada $horasTrabajada)
    {
        abort_if(Gate::denies('horas_trabajada_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horasTrabajada->delete();

        return back();
    }

    public function massDestroy(MassDestroyHorasTrabajadaRequest $request)
    {
        $horasTrabajadas = HorasTrabajada::find(request('ids'));

        foreach ($horasTrabajadas as $horasTrabajada) {
            $horasTrabajada->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
