@extends('layouts/app')

@section('content')

<div class="container py-4">

 <h1 class="mb-3">Edit {{$restaurant->name}} </h1>

 <form class="form" action='{{ route('restaurants.update', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant])}} ' method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name of Restaurant</label>

		<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{$restaurant->name}}" required>

			@error('name')
				<div id="name" class="validation-error">{{ $message }}</div>
			@enderror

    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>

		<textarea id="description" name="description" class="form-control" @error('name') is-invalid @enderror placeholder="Description" rows="7" required>{{$restaurant->description}}</textarea>

			@error('description')
				<div id="description" class="validation-error">{{ $message }}</div>
			@enderror
    </div>

    <div class="mb-3">
		<label for="address" class="form-label">Address</label>

		<input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" value="{{$restaurant->address}}" required>

			@error('address')
				<div id="address" class="validation-error">{{ $message }}</div>
			@enderror

    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone number</label>
        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone number"  value="{{$restaurant->phonenumber}}">
    </div>

    <div class="mb-3">
        <label for="latitude" class="form-label">Latitude</label>
        <input type="text" id="latitude" name="latitude" class="form-control" placeholder="Latitude" value="{{$restaurant->latitude}}">
    </div>

    <div class="mb-3">
        <label for="longitude" class="form-label">Longitude</label>
        <input type="text" id="longitude" name="longitude" class="form-control" placeholder="Longitude" value="{{$restaurant->longitude}}">
    </div>

    <div class="form-group">
        <fieldset>
        <label class="col-md-4 control-label" for="selectbasic">Categories</label>
        <ul>
            @foreach ($categories as $category)
            {{-- <li><input type="checkbox" name="categories[]" value="{{$category->id}}">{{$category->name}}</li> --}}

            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" name="categories[]" id="category_{{$category->id}}" value="{{$category->id}}" @if($restaurant->categories->contains($category)) checked @endif>
                <label for="category_{{$category->id}}" class="form-check-label">{{$category->name}}</label>
            </div>

            @endforeach
        </ul>
    </fieldset>
    </div>

    <div class="form-group mb-3">
        <label class="" for="cities">City</label>
        <select id="cities" name="cities">
            @foreach ($cities as $city)
                <option value="{{$city->id}}" name="city_{{$city->id}}" @if($restaurant->city->id == $city->id) selected @endif">{{$city->name}}</option>
            @endforeach
        </select>

    </div>

    <button type="submit" class="btn btn-success w-100 ">Update</button>

 </form>

 <div class="mt-4">
    <a href="{{ route('cities.show', ['county' => $county, 'city' => $city]) }}" class="btn btn-secondary">&laquo; Back</a>
</div>


@endsection
