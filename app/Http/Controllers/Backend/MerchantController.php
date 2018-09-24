<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\MerchantIndexResponse;
use App\Http\Requests\Merchant\UpdateMerchantRequest;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchants = User::role('merchant')->get();

        return new MerchantIndexResponse($merchants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.merchants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMerchantRequest $request)
    {
        $request->storeMerchant();

        flash('Merchant added!')->success()->important();

        return redirect()->route('backend.merchants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.merchants.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.merchants.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerchantRequest $request, User $user)
    {
        $request->UpdateMerchantRequest($user);

        flash('Merchant updated!')->success()->important();

        return redirect()->route('backend.merchants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        flash('Merchant deleted!')->error()->important();

        if (request()->ajax()) {
            return response()->json(['message' => 'success'], 200);
        }

        return redirect()->route('backend.merchants.index');
    }
}
