<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContratoLaboralRequest;
use App\Http\Requests\StoreContratoLaboralRequest;
use App\Http\Requests\UpdateContratoLaboralRequest;
use App\Models\AgregarCliente;
use App\Models\ContratoLaboral;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContratoLaboralController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contrato_laboral_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contratoLaborals = ContratoLaboral::with(['cliente'])->get();

        return view('admin.contratoLaborals.index', compact('contratoLaborals'));
    }

    public function create()
    {
        abort_if(Gate::denies('contrato_laboral_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = AgregarCliente::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contratoLaborals.create', compact('clientes'));
    }

    public function store(StoreContratoLaboralRequest $request)
    {
        $contratoLaboral = ContratoLaboral::create($request->all());

        return redirect()->route('admin.contrato-laborals.index');
    }

    public function edit(ContratoLaboral $contratoLaboral)
    {
        abort_if(Gate::denies('contrato_laboral_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = AgregarCliente::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contratoLaboral->load('cliente');

        return view('admin.contratoLaborals.edit', compact('clientes', 'contratoLaboral'));
    }

    public function update(UpdateContratoLaboralRequest $request, ContratoLaboral $contratoLaboral)
    {
        $contratoLaboral->update($request->all());

        return redirect()->route('admin.contrato-laborals.index');
    }

    public function show(ContratoLaboral $contratoLaboral)
    {
        abort_if(Gate::denies('contrato_laboral_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contratoLaboral->load('cliente');

        return view('admin.contratoLaborals.show', compact('contratoLaboral'));
    }

    public function destroy(ContratoLaboral $contratoLaboral)
    {
        abort_if(Gate::denies('contrato_laboral_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contratoLaboral->delete();

        return back();
    }

    public function massDestroy(MassDestroyContratoLaboralRequest $request)
    {
        $contratoLaborals = ContratoLaboral::find(request('ids'));

        foreach ($contratoLaborals as $contratoLaboral) {
            $contratoLaboral->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
