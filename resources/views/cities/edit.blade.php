@extends('layouts/app')

@section('content')
<div class="container py-4">
	<h1 class="mb-3">Edit {{$city->name}}</h1>

	<form class="form" action='{{ route('cities.show', ['county' => $county, 'city' => $city])}} ' method="POST">
	@csrf @method('PUT')

	<div class="mb-3">
		<label for="title" class="form-label">Name of City</label>
		<input type="text" id="name" name="name" class="form-control" placeholder="" value="{{$city->name}}"required>
	</div>

	<button type="submit" class="btn btn-success w-100">Create</button>
	</form>

	<div class="mt-4">
		<a href="{{ route('cities.show', ['county' => $county, 'city' => $city]) }}" class="btn btn-secondary">&laquo; Back</a>
	</div>
</div>
@endsection
