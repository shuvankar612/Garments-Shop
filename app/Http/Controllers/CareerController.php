<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Career::latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function($row){
                    return $row->status == 1 
                        ? '<span class="badge bg-success">Active</span>' 
                        : '<span class="badge bg-danger">Inactive</span>';
                })
                ->addColumn('action', function($row){
                    $editUrl = route('careers.edit', $row->id);
                    $deleteUrl = route('careers.destroy', $row->id);

                    $btn = '<a href="'.$editUrl.'" class="btn btn-warning btn-sm m-1">Edit</a>';
                    $btn .= '<form action="'.$deleteUrl.'" method="POST" style="display:inline-block;">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm(\'Delete this career?\')">Delete</button>
                             </form>';
                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('careers.index');
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
        $request->validate([
            'job_title' => 'required',
            'department' => 'required',
            'location' => 'required',
            'experience' => 'required',
            'vacancy' => 'required',
        ]);

        $career->update($request->only([
            'job_title',
            'department',
            'location',
            'experience',
            'vacancy',
            'description',
            'status'
        ]));

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