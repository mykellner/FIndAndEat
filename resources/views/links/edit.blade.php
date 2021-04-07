@extends('layouts/app')

@section('content')
<div class="container white-background py-4">
	<h1 class="mb-3"> Edit link </h1>

	<form class="form" action='{{ route('links.update',  ['county' => $county, 'city' => $city, 'restaurant' => $restaurant, 'link' => $link])}} ' method="POST">
	@csrf @method('PUT')

		<label for="title" class="form-label">URL or email</label>
		<input type="text" id="url" name="url" class="form-control @error('url') is-invalid @enderror" placeholder="url/email" value="{{ $link->url }}" required>
		@error('url')
			<div id="url" class="validation-error">{{ $message }}</div>
		@enderror

		<label for="title" class="form-label">Description</label>
		<input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description" value="{{ $link->description }}" required>
		@error('description')
			<div id="description" class="validation-error">{{ $message }}</div>
		@enderror

        <label class="mt-3" for="cities">Type:</label>
        <select id="types" name="types" class="mb-3">
            @foreach ($types as $type)
                <option value="{{$type->id}}" name="city_{{$type->id}}" @if($link->link_type->id == $type->id) selected @endif>{{$type->type}}</option>
            @endforeach
        </select>
		<button type="submit" class="btn btn-success w-100">Update</button>
	</form>

	<div class="mt-4">
		<a href="{{ route('restaurants.show', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant]) }}" class="btn btn-secondary">&laquo; Back</a>
	</div>

</div>
@endsection
