<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDescripcionEntrenamientoRequest;
use App\Http\Requests\StoreDescripcionEntrenamientoRequest;
use App\Http\Requests\UpdateDescripcionEntrenamientoRequest;
use App\Models\DescripcionEntrenamiento;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DescripcionEntrenamientoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('descripcion_entrenamiento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $descripcionEntrenamientos = DescripcionEntrenamiento::all();

        return view('admin.descripcionEntrenamientos.index', compact('descripcionEntrenamientos'));
    }

    public function create()
    {
        abort_if(Gate::denies('descripcion_entrenamiento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.descripcionEntrenamientos.create');
    }

    public function store(StoreDescripcionEntrenamientoRequest $request)
    {
        $descripcionEntrenamiento = DescripcionEntrenamiento::create($request->all());

        return redirect()->route('admin.descripcion-entrenamientos.index');
    }

    public function edit(DescripcionEntrenamiento $descripcionEntrenamiento)
    {
        abort_if(Gate::denies('descripcion_entrenamiento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.descripcionEntrenamientos.edit', compact('descripcionEntrenamiento'));
    }

    public function update(UpdateDescripcionEntrenamientoRequest $request, DescripcionEntrenamiento $descripcionEntrenamiento)
    {
        $descripcionEntrenamiento->update($request->all());

        return redirect()->route('admin.descripcion-entrenamientos.index');
    }

    public function show(DescripcionEntrenamiento $descripcionEntrenamiento)
    {
        abort_if(Gate::denies('descripcion_entrenamiento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.descripcionEntrenamientos.show', compact('descripcionEntrenamiento'));
    }

    public function destroy(DescripcionEntrenamiento $descripcionEntrenamiento)
    {
        abort_if(Gate::denies('descripcion_entrenamiento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $descripcionEntrenamiento->delete();

        return back();
    }

    public function massDestroy(MassDestroyDescripcionEntrenamientoRequest $request)
    {
        $descripcionEntrenamientos = DescripcionEntrenamiento::find(request('ids'));

        foreach ($descripcionEntrenamientos as $descripcionEntrenamiento) {
            $descripcionEntrenamiento->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
