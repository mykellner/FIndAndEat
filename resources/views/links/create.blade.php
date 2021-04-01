@extends('layouts/app')

@section('content')
<div class="container py-4">
	<h1 class="mb-3"> Add link </h1>

	<form class="form" action='{{ route('links.store',  ['county' => $county, 'city' => $city, 'restaurant' => $restaurant])}} ' method="POST">
	@csrf

		<label for="title" class="form-label">URL or email</label>
		<input type="text" id="url" name="url" class="form-control @error('url') is-invalid @enderror" placeholder="url/email" value="{{ old('name') }}" required>
		@error('url')
			<div id="url" class="validation-error">{{ $message }}</div>
		@enderror

		<label for="title" class="form-label">Description</label>
		<input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description" value="{{ old('description') }}">
		@error('description')
			<div id="description" class="validation-error">{{ $message }}</div>
		@enderror

        <label class="mt-3" for="cities">Type:</label>
        <select id="types" name="types" class="mb-3">
            @foreach ($types as $type)
                <option value="{{$type->id}}" name="city_{{$type->id}}">{{$type->type}}</option>
            @endforeach
        </select>
		<button type="submit" class="btn btn-green w-100">Create</button>
	</form>

	<div class="mt-4">
		<a href="{{ route('restaurants.show',  ['county' => $county, 'city' => $city, 'restaurant' => $restaurant]) }}" class="btn btn-secondary">&laquo; Back</a>
	</div>

</div>
@endsection
