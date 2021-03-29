<?php

namespace App\Http\Controllers;

use App\Models\County;
use App\Models\Restaurant;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('counties/index', [
			'counties' => County::all(),
			'restaurants' => Restaurant::with('city.county')->latest()->take(5)->get()
            
            
		]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Auth::check(), 401);
        return view('counties/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        abort_unless(Auth::check(), 401);

        $county = County::create([
			'name' => $request->input('name')
		]);

        return redirect()->route('counties.show', ['county' => $county])->with('success', 'County has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function show(County $county)
    {

        return view('counties/show', [
			'county' => $county->load('restaurants.categories', 'restaurants.city'),
			'categories' => Category::all()
		]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function edit(County $county)
    {   
        abort_unless(Auth::check(), 401);
        return view('counties/edit',[
			'county' => $county
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, County $county)
    {
        abort_unless(Auth::check(), 401);

        $county->update([
			'name' => $request->input('name'),
		]);

        return redirect()->route('counties.show', ['county' => $county])->with('success', 'County has been updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function destroy(County $county)
    {
        abort_unless(Auth::check(), 401);

        $county->delete();

		return redirect()->route('counties.index')->with('success', 'County has been deleted');
    }
}
