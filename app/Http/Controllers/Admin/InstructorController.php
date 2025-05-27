<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInstructorRequest;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Models\Instructor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InstructorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('instructor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instructors = Instructor::all();

        return view('admin.instructors.index', compact('instructors'));
    }

    public function create()
    {
        abort_if(Gate::denies('instructor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.instructors.create');
    }

    public function store(StoreInstructorRequest $request)
    {
        $instructor = Instructor::create($request->all());

        return redirect()->route('admin.instructors.index');
    }

    public function edit(Instructor $instructor)
    {
        abort_if(Gate::denies('instructor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.instructors.edit', compact('instructor'));
    }

    public function update(UpdateInstructorRequest $request, Instructor $instructor)
    {
        $instructor->update($request->all());

        return redirect()->route('admin.instructors.index');
    }

    public function show(Instructor $instructor)
    {
        abort_if(Gate::denies('instructor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.instructors.show', compact('instructor'));
    }

    public function destroy(Instructor $instructor)
    {
        abort_if(Gate::denies('instructor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instructor->delete();

        return back();
    }

    public function massDestroy(MassDestroyInstructorRequest $request)
    {
        $instructors = Instructor::find(request('ids'));

        foreach ($instructors as $instructor) {
            $instructor->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
