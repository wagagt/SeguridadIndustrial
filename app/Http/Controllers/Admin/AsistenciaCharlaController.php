<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAsistenciaCharlaRequest;
use App\Http\Requests\StoreAsistenciaCharlaRequest;
use App\Http\Requests\UpdateAsistenciaCharlaRequest;
use App\Models\AgregarEmpleado;
use App\Models\AsistenciaCharla;
use App\Models\Charla;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AsistenciaCharlaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asistencia_charla_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistenciaCharlas = AsistenciaCharla::with(['charlas', 'empleados'])->get();

        return view('admin.asistenciaCharlas.index', compact('asistenciaCharlas'));
    }

    public function create()
    {
        abort_if(Gate::denies('asistencia_charla_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $charlas = Charla::pluck('tema', 'id');

        $empleados = AgregarEmpleado::pluck('nombre_completo', 'id');

        return view('admin.asistenciaCharlas.create', compact('charlas', 'empleados'));
    }

    public function store(StoreAsistenciaCharlaRequest $request)
    {
        $asistenciaCharla = AsistenciaCharla::create($request->all());
        $asistenciaCharla->charlas()->sync($request->input('charlas', []));
        $asistenciaCharla->empleados()->sync($request->input('empleados', []));

        return redirect()->route('admin.asistencia-charlas.index');
    }

    public function edit(AsistenciaCharla $asistenciaCharla)
    {
        abort_if(Gate::denies('asistencia_charla_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $charlas = Charla::pluck('tema', 'id');

        $empleados = AgregarEmpleado::pluck('nombre_completo', 'id');

        $asistenciaCharla->load('charlas', 'empleados');

        return view('admin.asistenciaCharlas.edit', compact('asistenciaCharla', 'charlas', 'empleados'));
    }

    public function update(UpdateAsistenciaCharlaRequest $request, AsistenciaCharla $asistenciaCharla)
    {
        $asistenciaCharla->update($request->all());
        $asistenciaCharla->charlas()->sync($request->input('charlas', []));
        $asistenciaCharla->empleados()->sync($request->input('empleados', []));

        return redirect()->route('admin.asistencia-charlas.index');
    }

    public function show(AsistenciaCharla $asistenciaCharla)
    {
        abort_if(Gate::denies('asistencia_charla_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistenciaCharla->load('charlas', 'empleados');

        return view('admin.asistenciaCharlas.show', compact('asistenciaCharla'));
    }

    public function destroy(AsistenciaCharla $asistenciaCharla)
    {
        abort_if(Gate::denies('asistencia_charla_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistenciaCharla->delete();

        return back();
    }

    public function massDestroy(MassDestroyAsistenciaCharlaRequest $request)
    {
        $asistenciaCharlas = AsistenciaCharla::find(request('ids'));

        foreach ($asistenciaCharlas as $asistenciaCharla) {
            $asistenciaCharla->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
