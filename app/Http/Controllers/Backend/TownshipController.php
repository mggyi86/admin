<?php

namespace App\Http\Controllers\Backend;

use App\Models\Division;
use App\Models\Township;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\TownshipIndexResponse;
use App\Http\Requests\Township\CreateTownshipRequest;
use App\Http\Requests\Township\UpdateTownshipRequest;

class TownshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $townships = Township::all();

        return new TownshipIndexResponse($townships);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();

        return view('backend.townships.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTownshipRequest $request)
    {
        $request->storeTownship();

        flash('Township added!')->success()->important();

        return redirect()->route('backend.townships.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function show(Township $township)
    {
        return view('backend.townships.show', compact('township'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function edit(Township $township)
    {
        $divisions = Division::all();

        return view('backend.townships.edit', compact('township', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTownshipRequest $request, Township $township)
    {
        $request->updateTownship($township);

        flash('Township updated!')->success()->important();

        return redirect()->route('backend.townships.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function destroy(Township $township)
    {
        $township->delete();
        flash('Township deleted!')->error()->important();

        if (request()->ajax()) {
            return response()->json(['message' => 'success'], 200);
        }

        return redirect()->route('backend.townships.index');
    }
}
