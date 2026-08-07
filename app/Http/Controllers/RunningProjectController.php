<?php

namespace App\Http\Controllers;

use App\Models\RunningProject;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RunningProjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = RunningProject::latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function($row){
                    if ($row->image) {
                    return '<img src="'.asset('running-projects/'.$row->image).'" width="60" height="60" style="object-fit:cover; 
                    border-radius:4px;" />';
                    }
                    return 'No Image';
                })
                ->editColumn('image', function($row){
                $path = public_path('running-projects/' . $row->image);
    
        if ($row->image && file_exists($path)) {
        return '<img src="'.asset('running-projects/'.$row->image).
        '" width="60" height="60" style="object-fit:cover; border-radius:4px;" />';
        }
        
        return '<span class="badge bg-secondary">No Image</span>';
    })
                ->addColumn('action', function($row){
                    $editUrl = route('running-projects.edit', $row->id);
                    $deleteUrl = route('running-projects.destroy', $row->id);

                    $btn = '<a href="'.$editUrl.'" class="btn btn-warning btn-sm m-1">Edit</a>';
                    $btn .= '<form action="'.$deleteUrl.'" method="POST" style="display:inline-block;">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="btn btn-danger btn-sm m-1" 
                                onclick="return confirm(\'Delete this project?\')">Delete</button>
                             </form>';
                    return $btn;
                })
                ->rawColumns(['image', 'status', 'action'])
                ->make(true);
        }

        return view('running-projects.index');
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
            $imageName = time() . '.' . $request->image->extension();

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
        return view('running-projects.show', compact('runningProject'));
    }

    public function edit(RunningProject $runningProject)
    {
        return view('running-projects.edit', compact('runningProject'));
    }

    public function update(Request $request, RunningProject $runningProject)
    {
        $imageName = $runningProject->image;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();

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
            ->route('running-projects.index')
            ->with('success', 'Project Updated Successfully');
    }

    public function destroy(RunningProject $runningProject)
    {
        $runningProject->delete();

        return redirect()
            ->route('running-projects.index')
            ->with('success', 'Project Deleted Successfully');
    }
}
