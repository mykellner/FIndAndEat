<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\County;
use App\Models\City;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(County $county, City $cities)
    {
        //
        return view('restaurant/index', ['cities' => $cities, 'county' => $county, 'restaurant' => Restaurant::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(County $county, City $city)
    {
        abort_unless(Auth::check(), 401);
        return view('restaurants/create', ['city' => $city, 'county' => $county, 'categories' => Category::orderBy('name')->get(), 'cities' => City::all(), 'counties' => County::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, County $county, City $city)
    {
        if(!$request->filled('name')) {
            return redirect()->back()->with('warning', 'Please enter a name for this County');
        }

        // $restaurant = $city->restaurants()->create([])

        $restaurant = Restaurant::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'city_id' => $request->input('cities'),
            ]);

        $restaurant->categories()->attach($request->input('categories'));

    
        return redirect()->route('restaurants.show', ['restaurant' => $restaurant, 'city' => $city, 'county' => $county]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(County $county, City $city, Restaurant $restaurant)
    {
        //
        return view('restaurants.show', ['city' => $city, 'county' => $county,'restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(County $county, City $city, Restaurant $restaurant)
    {
        $categories = Category::all();
        $cities = City::all();
        return view('restaurants/edit', ['city' => $city, 'county' => $county,'restaurant' => $restaurant, 'cities' => $cities, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, County $county, City $city, Restaurant $restaurant)
    {
        if (!$request->filled('name')) {
            return redirect()->back()->with('warning', 'Please enter a name for the restaurant.');
            }

        $restaurant->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'city_id' => $request->input('cities'),
            ]);

            $restaurant->categories()->sync($request->input('categories'));
            
        return redirect()->route('restaurants.show', ['city' => $city, 'county' => $county,'restaurant' => $restaurant])->with('success', 'Restaurant updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(County $county, City $city, Restaurant $restaurant)
    {
        
        abort_unless(Auth::check(), 401, 'You have to be logged in to delete this restaurant.');
        $restaurant->delete();
		return redirect()->route('cities.show', ['county' => $county, 'city' => $city])->with('success', 'Restaurant has been deleted');
    }
}
