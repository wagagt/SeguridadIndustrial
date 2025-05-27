<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMantenimientoHerramientumRequest;
use App\Http\Requests\StoreMantenimientoHerramientumRequest;
use App\Http\Requests\UpdateMantenimientoHerramientumRequest;
use App\Models\Herramientum;
use App\Models\MantenimientoHerramientum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MantenimientoHerramientaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mantenimiento_herramientum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mantenimientoHerramienta = MantenimientoHerramientum::with(['herramienta'])->get();

        return view('admin.mantenimientoHerramienta.index', compact('mantenimientoHerramienta'));
    }

    public function create()
    {
        abort_if(Gate::denies('mantenimiento_herramientum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $herramientas = Herramientum::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.mantenimientoHerramienta.create', compact('herramientas'));
    }

    public function store(StoreMantenimientoHerramientumRequest $request)
    {
        $mantenimientoHerramientum = MantenimientoHerramientum::create($request->all());

        return redirect()->route('admin.mantenimiento-herramienta.index');
    }

    public function edit(MantenimientoHerramientum $mantenimientoHerramientum)
    {
        abort_if(Gate::denies('mantenimiento_herramientum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $herramientas = Herramientum::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mantenimientoHerramientum->load('herramienta');

        return view('admin.mantenimientoHerramienta.edit', compact('herramientas', 'mantenimientoHerramientum'));
    }

    public function update(UpdateMantenimientoHerramientumRequest $request, MantenimientoHerramientum $mantenimientoHerramientum)
    {
        $mantenimientoHerramientum->update($request->all());

        return redirect()->route('admin.mantenimiento-herramienta.index');
    }

    public function show(MantenimientoHerramientum $mantenimientoHerramientum)
    {
        abort_if(Gate::denies('mantenimiento_herramientum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mantenimientoHerramientum->load('herramienta');

        return view('admin.mantenimientoHerramienta.show', compact('mantenimientoHerramientum'));
    }

    public function destroy(MantenimientoHerramientum $mantenimientoHerramientum)
    {
        abort_if(Gate::denies('mantenimiento_herramientum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mantenimientoHerramientum->delete();

        return back();
    }

    public function massDestroy(MassDestroyMantenimientoHerramientumRequest $request)
    {
        $mantenimientoHerramienta = MantenimientoHerramientum::find(request('ids'));

        foreach ($mantenimientoHerramienta as $mantenimientoHerramientum) {
            $mantenimientoHerramientum->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
