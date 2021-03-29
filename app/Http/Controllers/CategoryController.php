<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\County;
use App\Models\City;

use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
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
    public function create(County $county, City $city)
    {
        abort_unless(Auth::check(), 401);
        return view('categories/create', ['city' => $city, 'county' => $county]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, County $county, City $city)
    {
        abort_unless(Auth::check(), 401);

        $category = Category::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('categories.show', ['category' => $category, 'city' => $city, 'county' => $county])->with('success', 'Successfully created a Category.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(County $county, City $city, Category $category)
    {
        return view('categories.show', ['category' => $category, 'city' => $city, 'county' => $county]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(County $county, City $city, Category $category)
    {
        abort_unless(Auth::check(), 401);
        return view('categories/edit', ['county' => $county, 'city' => $city, 'category' => $category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, County $county, City $city, Category $category)
    {
        abort_unless(Auth::check(), 401);

        $category->update([
			'name' => $request->input('name'),
		]);

        return redirect()->route('categories.show', ['county' => $county, 'city' => $city, 'category' => $category])->with('success', 'Name of the category updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(County $county, City $city, Category $category)
    {
        abort_unless(Auth::check(), 401);

        $category->delete();

		return redirect()->route('cities.show', ['county' => $county, 'city' => $city, 'category' => $category])->with('danger', 'Category deleted.');
    }
}
