@extends('layouts/app')

@section('content')
<div class="container py-4">
	<h1 class="mb-3"> Edit link </h1>

	<form class="form" action='{{ route('links.update',  ['county' => $county, 'city' => $city, 'restaurant' => $restaurant, 'link' => $link])}} ' method="POST">
    @csrf @method('PUT')
		<div class="mb-3">
			<input type="text" id="url" name="url" class="form-control" placeholder="URL" value="{{$link->url}}" required>
		</div>
        <div class="mb-3">
			<input type="text" id="description" name="description" class="form-control" placeholder="Description" value="{{$link->description}}">
		</div>
        <label class="" for="cities">Type:</label>
        <select id="types" name="types" class="mb-3">
            @foreach ($types as $type)
                <option value="{{$type->id}}" name="city_{{$type->id}}" @if($link->link_type->id == $type->id) selected @endif>{{$type->type}}</option>
            @endforeach
        </select>
		<button type="submit" class="btn btn-green w-100">Update</button>
	</form>

	<div class="mt-4">
		<a href="{{ route('restaurants.show', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant]) }}" class="btn btn-secondary">&laquo; Back</a>
	</div>

</div>
@endsection