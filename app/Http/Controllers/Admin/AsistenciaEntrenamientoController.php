<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAsistenciaEntrenamientoRequest;
use App\Http\Requests\StoreAsistenciaEntrenamientoRequest;
use App\Http\Requests\UpdateAsistenciaEntrenamientoRequest;
use App\Models\AgregarEmpleado;
use App\Models\AsistenciaEntrenamiento;
use App\Models\DescripcionEntrenamiento;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AsistenciaEntrenamientoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asistencia_entrenamiento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistenciaEntrenamientos = AsistenciaEntrenamiento::with(['entrenamientos', 'empleados'])->get();

        return view('admin.asistenciaEntrenamientos.index', compact('asistenciaEntrenamientos'));
    }

    public function create()
    {
        abort_if(Gate::denies('asistencia_entrenamiento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entrenamientos = DescripcionEntrenamiento::pluck('tema', 'id');

        $empleados = AgregarEmpleado::pluck('nombre_completo', 'id');

        return view('admin.asistenciaEntrenamientos.create', compact('empleados', 'entrenamientos'));
    }

    public function store(StoreAsistenciaEntrenamientoRequest $request)
    {
        $asistenciaEntrenamiento = AsistenciaEntrenamiento::create($request->all());
        $asistenciaEntrenamiento->entrenamientos()->sync($request->input('entrenamientos', []));
        $asistenciaEntrenamiento->empleados()->sync($request->input('empleados', []));

        return redirect()->route('admin.asistencia-entrenamientos.index');
    }

    public function edit(AsistenciaEntrenamiento $asistenciaEntrenamiento)
    {
        abort_if(Gate::denies('asistencia_entrenamiento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entrenamientos = DescripcionEntrenamiento::pluck('tema', 'id');

        $empleados = AgregarEmpleado::pluck('nombre_completo', 'id');

        $asistenciaEntrenamiento->load('entrenamientos', 'empleados');

        return view('admin.asistenciaEntrenamientos.edit', compact('asistenciaEntrenamiento', 'empleados', 'entrenamientos'));
    }

    public function update(UpdateAsistenciaEntrenamientoRequest $request, AsistenciaEntrenamiento $asistenciaEntrenamiento)
    {
        $asistenciaEntrenamiento->update($request->all());
        $asistenciaEntrenamiento->entrenamientos()->sync($request->input('entrenamientos', []));
        $asistenciaEntrenamiento->empleados()->sync($request->input('empleados', []));

        return redirect()->route('admin.asistencia-entrenamientos.index');
    }

    public function show(AsistenciaEntrenamiento $asistenciaEntrenamiento)
    {
        abort_if(Gate::denies('asistencia_entrenamiento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistenciaEntrenamiento->load('entrenamientos', 'empleados');

        return view('admin.asistenciaEntrenamientos.show', compact('asistenciaEntrenamiento'));
    }

    public function destroy(AsistenciaEntrenamiento $asistenciaEntrenamiento)
    {
        abort_if(Gate::denies('asistencia_entrenamiento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistenciaEntrenamiento->delete();

        return back();
    }

    public function massDestroy(MassDestroyAsistenciaEntrenamientoRequest $request)
    {
        $asistenciaEntrenamientos = AsistenciaEntrenamiento::find(request('ids'));

        foreach ($asistenciaEntrenamientos as $asistenciaEntrenamiento) {
            $asistenciaEntrenamiento->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
