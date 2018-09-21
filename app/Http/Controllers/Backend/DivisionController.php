<?php

namespace App\Http\Controllers\Backend;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\DivisionIndexResponse;
use App\Http\Requests\Division\CreateDivisionRequest;
use App\Http\Requests\Division\UpdateDivisionRequest;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::all();

        return new DivisionIndexResponse($divisions);
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
    public function store(CreateDivisionRequest $request)
    {
        $request->storeDivision();

        flash('Division added!')->success()->important();

        return redirect()->route('backend.divisions.index');
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
    public function update(UpdateDivisionRequest $request, Division $division)
    {
        $request->updateDivision($division);

        flash('Division updated!')->success()->important();

        return redirect()->route('backend.divisions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        $division->delete();
        flash('Division deleted!')->error()->important();

        if (request()->ajax()) {
            return response()->json(['message' => 'success'], 200);
        }

        return redirect()->route('backend.divisions.index');
    }
}
