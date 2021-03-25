<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(County $county)
    {
        $cities = City::all();
        return view('cities/index', ['cities' => $cities, 'county' => $county]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(County $county)
    {
        //
        abort_unless(Auth::check(), 401);
        return view('cities/create', ['county' => $county]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(County $county, Request $request)
    {
        //
        if(!$request->filled('name')) {
            return redirect()->back()->with('warning', 'Please enter a name for this County');
        }

        $city = City::create([
            'name' => $request->input('name'),
            'county_id' => $county->id,
        ]);

        return redirect()->route('cities.show', ['city' => $city, 'county' => $county]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(County $county, City $city)
    {
        $categories = Category::all();
        return view('cities/show', ['city' => $city, 'county' => $county, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(County $county, City $city)
    {
        return view('cities/edit', ['city' => $city, 'county' => $county]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, County $county, City $city)
    {
        if (!$request->filled('name')) {
            return redirect()->back()->with('warning', 'Please enter a title for the article.');
            }

        $city->update([
            'name' => $request->input('name'),
            ]);
        
        return redirect()->route('cities.show', ['county' => $county, 'city' => $city])->with('success', 'Article updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }


}
