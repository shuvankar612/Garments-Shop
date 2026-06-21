<?php

namespace App\Http\Controllers;

use App\Models\RunningProject;
use Illuminate\Http\Request;

class RunningProjectController extends Controller
{
    public function index()
    {
        $projects = RunningProject::latest()->get();

        return view('running-projects.index', compact('projects'));
    }

    public function create()
    {
        return view('running-projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'location' => 'nullable',
            'image' => 'nullable|image',
            'description' => 'nullable',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time() . '.' .
            $request->image->extension();

            $request->image->move(
                public_path('running-projects'),
                $imageName
            );
        }

        RunningProject::create([
            'title' => $request->title,
            'location' => $request->location,
            'image' => $imageName,
            'description' => $request->description,
            'status' => 1,
        ]);

        return redirect()
            ->route('running-projects.index')
            ->with('success', 'Project Added Successfully');
    }

    public function show(RunningProject $runningProject)
    {
        return view(
            'running-projects.show',
            compact('runningProject')
        );
    }

    public function edit(RunningProject $runningProject)
    {
        return view(
            'running-projects.edit',
            compact('runningProject')
        );
    }

    public function update(Request $request, RunningProject $runningProject)
    {
        $imageName = $runningProject->image;

        if ($request->hasFile('image')) {

            $imageName = time() . '.' .
            $request->image->extension();

            $request->image->move(
                public_path('running-projects'),
                $imageName
            );
        }

        $runningProject->update([
            'title' => $request->title,
            'location' => $request->location,
            'image' => $imageName,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('running-projects.index');
    }

    public function destroy(RunningProject $runningProject)
    {
        $runningProject->delete();

        return redirect()
            ->route('running-projects.index');
    }
}