<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHerramientumRequest;
use App\Http\Requests\StoreHerramientumRequest;
use App\Http\Requests\UpdateHerramientumRequest;
use App\Models\CategoriaHerramientum;
use App\Models\Herramientum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HerramientaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('herramientum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $herramienta = Herramientum::with(['categoria'])->get();

        return view('admin.herramienta.index', compact('herramienta'));
    }

    public function create()
    {
        abort_if(Gate::denies('herramientum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorias = CategoriaHerramientum::pluck('nombre_categoria', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.herramienta.create', compact('categorias'));
    }

    public function store(StoreHerramientumRequest $request)
    {

        $data = $request->all();

        // Valores por defecto si vienen vacíos
        $data['horas_para_mantenimiento'] = $data['horas_para_mantenimiento'] ?? 0;
        $data['horas_acumuladas'] = $data['horas_acumuladas'] ?? 0;

        Herramientum::create($data);

        return redirect()->route('admin.herramienta.index');
    }

    public function edit(Herramientum $herramientum)
    {
        abort_if(Gate::denies('herramientum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorias = CategoriaHerramientum::pluck('nombre_categoria', 'id')->prepend(trans('global.pleaseSelect'), '');

        $herramientum->load('categoria');

        return view('admin.herramienta.edit', compact('categorias', 'herramientum'));
    }

    public function update(UpdateHerramientumRequest $request, Herramientum $herramientum)
    {
        $herramientum->update($request->all());

        return redirect()->route('admin.herramienta.index');
    }

    public function show(Herramientum $herramientum)
    {
        abort_if(Gate::denies('herramientum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $herramientum->load('categoria');

        return view('admin.herramienta.show', compact('herramientum'));
    }

    public function destroy(Herramientum $herramientum)
    {
        abort_if(Gate::denies('herramientum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $herramientum->delete();

        return back();
    }

    public function massDestroy(MassDestroyHerramientumRequest $request)
    {
        $herramienta = Herramientum::find(request('ids'));

        foreach ($herramienta as $herramientum) {
            $herramientum->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
