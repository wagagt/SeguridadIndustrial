<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategoriaHerramientumRequest;
use App\Http\Requests\StoreCategoriaHerramientumRequest;
use App\Http\Requests\UpdateCategoriaHerramientumRequest;
use App\Models\CategoriaHerramientum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriaHerramientaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('categoria_herramientum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriaHerramienta = CategoriaHerramientum::all();

        return view('admin.categoriaHerramienta.index', compact('categoriaHerramienta'));
    }

    public function create()
    {
        abort_if(Gate::denies('categoria_herramientum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoriaHerramienta.create');
    }

    public function store(StoreCategoriaHerramientumRequest $request)
    {
        $categoriaHerramientum = CategoriaHerramientum::create($request->all());

        return redirect()->route('admin.categoria-herramienta.index');
    }

    public function edit(CategoriaHerramientum $categoriaHerramientum)
    {
        abort_if(Gate::denies('categoria_herramientum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoriaHerramienta.edit', compact('categoriaHerramientum'));
    }

    public function update(UpdateCategoriaHerramientumRequest $request, CategoriaHerramientum $categoriaHerramientum)
    {
        $categoriaHerramientum->update($request->all());

        return redirect()->route('admin.categoria-herramienta.index');
    }

    public function show(CategoriaHerramientum $categoriaHerramientum)
    {
        abort_if(Gate::denies('categoria_herramientum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoriaHerramienta.show', compact('categoriaHerramientum'));
    }

    public function destroy(CategoriaHerramientum $categoriaHerramientum)
    {
        abort_if(Gate::denies('categoria_herramientum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriaHerramientum->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoriaHerramientumRequest $request)
    {
        $categoriaHerramienta = CategoriaHerramientum::find(request('ids'));

        foreach ($categoriaHerramienta as $categoriaHerramientum) {
            $categoriaHerramientum->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
