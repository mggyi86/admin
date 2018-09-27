<?php

namespace App\Http\Controllers\Backend;

use App\Models\Stock;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\StockIndexResponse;
use App\Http\Requests\Stock\CreateStockRequest;
use App\Http\Requests\Stock\UpdateStockRequest;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();

        return new StockIndexResponse($stocks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();

        return view('backend.stocks.create', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStockRequest $request)
    {
        $request->storeStock();

        flash('Stock added!')->success()->important();

        return redirect()->route('backend.stocks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        return view('backend.stocks.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        $restaurants = Restaurant::all();

        return view('backend.stocks.edit', compact('restaurant', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStockRequest $request, Stock $stock)
    {
        $request->updateStock($stock);

        flash('Stock updated!')->success()->important();

        return redirect()->route('backend.stocks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();

        if (request()->ajax()) {
            return response()->json(['message' => 'success'], 200);
        }

        flash('Stock deleted!')->error()->important();

        return redirect()->route('backend.stocks.index');
    }
}
