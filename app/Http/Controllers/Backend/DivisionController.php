<?php

namespace App\Http\Controllers\Backend;

use App\Models\Division;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $divisions = Division::all();

            return DataTables::of($divisions)->addIndexColumn()
                    ->addColumn('action', function ($division) {
                        return '<a href="/backend/division/'. $division->name.'"
                                class="btn btn-xs btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>

                                <a href="/backend/division/'.$division->name.'/edit"
                                class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> </a>

                                <a href="/backend/division/'.$division->name.'"
                                class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> </a>

                                <a href="/backend/division/'.$division->name.'"
                                class="btn btn-xs btn-info"><i class="glyphicon glyphicon-ok"></i> </a>';
                    })
                    ->make(true);
        }

        return view('backend.divisions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|string|unique:divisions,name'
        ]);

        $requestData = $request->only(['name']);

        Division::create($requestData);

        return redirect()->route('backend.division.index')->with('flash_message', 'Division added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        return view('backend.divisions.show', compact('division'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        return view('backend.divisions.edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        $this->validate($request, [
			'name' => 'required|string|unique:divisions,name,' . $division->id
		]);
        $requestData = $request->all();

        // $division = Division::findOrFail($id);
        $division->update($requestData);

        return redirect()->route('backend.division.index')->with('flash_message', 'Division updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        $division->destroy();

        return redirect('admin/divisions')->with('flash_message', 'Division deleted!');
    }
}
