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
        return view('cities/index', ['cities' => $county->cities(), 'county' => $county]);
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
        abort_unless(Auth::check(), 401);

        $request->validate([
            'name' => 'required|unique:cities',
            
        ]);

        $city = $county->cities()->create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('cities.show', ['city' => $city, 'county' => $county])->with('success', 'City has been created.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(County $county, City $city)
    {
        return view('cities/show', ['city' => $city->load('restaurants.categories', 'restaurants.city'), 'county' => $county, 'categories' =>  Category::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(County $county, City $city)
    {
        abort_unless(Auth::check(), 401);
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
        abort_unless(Auth::check(), 401);

        $request->validate([
            'name' => 'required|unique:cities',
            
        ]);

        $city->update([
            'name' => $request->input('name'),
            ]);
        
        return redirect()->route('cities.show', ['county' => $county, 'city' => $city])->with('success', 'City has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(County $county, City $city)
    {
        abort_unless(Auth::check(), 401);
        
		$city->delete();

		return redirect()->route('counties.show', ['county' => $county, 'city' => $city])->with('success', 'City has been deleted');
    }


}
