<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::latest()->get();

        return view('careers.index', compact('careers'));
    }

    public function create()
    {
        return view('careers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required',
            'department' => 'required',
            'location' => 'required',
            'experience' => 'required',
            'vacancy' => 'required',
        ]);

        Career::create([
            'job_title' => $request->job_title,
            'department' => $request->department,
            'location' => $request->location,
            'experience' => $request->experience,
            'vacancy' => $request->vacancy,
            'description' => $request->description,
            'status' => 1,
        ]);

        return redirect()
            ->route('careers.index')
            ->with('success', 'Career Added Successfully');
    }

    public function show(Career $career)
    {
        return view('careers.show', compact('career'));
    }

    public function edit(Career $career)
    {
        return view('careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $career->update([
            'job_title' => $request->job_title,
            'department' => $request->department,
            'location' => $request->location,
            'experience' => $request->experience,
            'vacancy' => $request->vacancy,
            'description' => $request->description,
            'status' => $request->status ?? 1,
        ]);

        return redirect()
            ->route('careers.index')
            ->with('success', 'Career Updated Successfully');
    }

    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()
            ->route('careers.index')
            ->with('success', 'Career Deleted Successfully');
    }
}
