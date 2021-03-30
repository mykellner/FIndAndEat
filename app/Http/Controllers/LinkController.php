<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\LinkType;
use App\Models\Restaurant;
use App\Models\County;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(County $county, City $city, Restaurant $restaurant)
    {
        abort_unless(Auth::check(), 401);
        return view('links/create', ['restaurant' => $restaurant, 'city' => $city, 'county' => $county, 'types' => LinkType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, County $county, City $city, Restaurant $restaurant)
    {
        abort_unless(Auth::check(), 401);

        $link = $restaurant->links()->create([
            'url' => $request->input('url'),
            'description' => $request->input('description'),
            'type_id' => $request->input('types'),
            ]);

            return redirect()->route('restaurants.show', ['restaurant' => $restaurant, 'city' => $city, 'county' => $county])->with('success', 'Added link to restaurant.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }
}
