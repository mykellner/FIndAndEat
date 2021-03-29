@extends('layouts/app')

@section('content')
<div class="container py-4">

<h1 class="mb-3">Create new Restaurant </h1>

	<form class="form" action='{{ route('restaurants.store', ['county' => $county, 'city' => $city])}} ' method="POST">
	@csrf

		<div class="mb-3">
			<label for="title" class="form-label">Name of Restaurant</label>
			<input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
		</div>

		<div class="mb-3">
			<label for="title" class="form-label">Description</label>
			<input type="text" id="description" name="description" class="form-control" placeholder="Description" required>
		</div>

		<div class="mb-3">
			<label for="title" class="form-label">Address</label>
			<input type="text" id="address" name="address" class="form-control" placeholder="Address" required>
		</div>

		<div class="mb-3">
			<label for="title" class="form-label">Phone number</label>
			<input type="text" id="phone" name="phone" class="form-control" placeholder="Phone number">
		</div>

		<div class="mb-3">
			<label for="title" class="form-label">Latitude</label>
			<input type="text" id="latitude" name="latitude" class="form-control" placeholder="Latitude">
		</div>

		<div class="mb-3">
			<label for="title" class="form-label">Longitude</label>
			<input type="text" id="longitude" name="longitude" class="form-control" placeholder="Longitude">
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label" for="selectbasic">Add categories</label>
			<ul>
				@foreach ($categories as $category)
				<li><input type="checkbox" name="categories[]" value="{{$category->id}}">{{$category->name}}</li>
				@endforeach
			</ul>
		</div>


        <label class="" for="cities">City</label>
        <select id="cities" name="cities">
            @foreach ($counties as $county)
            <optgroup label = "{{$county->name}}">
            @foreach ($county->cities as $city)
                <option value="{{$city->id}}" name="city_{{$city->id}}" @if($city->id == $city->id) selected @endif">{{$city->name}}</option>
            @endforeach
            </optgroup>
            @endforeach
        </select>


    <button type="submit" class="btn btn-success w-100 mt-3">Create</button>

 </form>

 <div class="mt-4">
    <a href="{{ route('cities.show', ['county' => $county, 'city' => $city]) }}" class="btn btn-secondary">&laquo; Back</a>
</div>


@endsection
