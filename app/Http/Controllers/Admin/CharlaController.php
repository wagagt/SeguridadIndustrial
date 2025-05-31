<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCharlaRequest;
use App\Http\Requests\StoreCharlaRequest;
use App\Http\Requests\UpdateCharlaRequest;
use App\Models\Charla;
use App\Models\Instructor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CharlaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('charla_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $charlas = Charla::with(['instructor'])->get();

        return view('admin.charlas.index', compact('charlas'));
    }

    public function create()
    {
        abort_if(Gate::denies('charla_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instructors = Instructor::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.charlas.create', compact('instructors'));
    }

    public function store(StoreCharlaRequest $request)
    {
        $charla = Charla::create($request->all());

        return redirect()->route('admin.charlas.index');
    }

    public function edit(Charla $charla)
    {
        abort_if(Gate::denies('charla_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instructors = Instructor::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $charla->load('instructor');

        return view('admin.charlas.edit', compact('charla', 'instructors'));
    }

    public function update(UpdateCharlaRequest $request, Charla $charla)
    {
        $charla->update($request->all());

        return redirect()->route('admin.charlas.index');
    }

    public function show(Charla $charla)
    {
        abort_if(Gate::denies('charla_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $charla->load('instructor');

        return view('admin.charlas.show', compact('charla'));
    }

    public function destroy(Charla $charla)
    {
        abort_if(Gate::denies('charla_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $charla->delete();

        return back();
    }

    public function massDestroy(MassDestroyCharlaRequest $request)
    {
        $charlas = Charla::find(request('ids'));

        foreach ($charlas as $charla) {
            $charla->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
