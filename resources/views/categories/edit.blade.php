@extends('layouts/app')

@section('content')
<div class="container py-4">
	<h1 class="mb-3">Edit {{$category->name}}</h1>

	<form class="form" action='{{ route('categories.update', ['county' => $county, 'city' => $city, 'category' => $category])}} ' method="POST">
		@csrf
		@method('PUT')

	<div class="mb-3">
		<label for="title" class="form-label">Name of Category</label>
		<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ $category->name }}" required>
		@error('name')
			<div id="name" class="validation-error">{{ $message }}</div>
		@enderror
	</div>

	<button type="submit" class="btn btn-success w-100">Update</button>
	</form>

	<div class="mt-4">
		<a href="{{ route('categories.show', ['county' => $county, 'city' => $city, 'category' => $category]) }}" class="btn btn-secondary">&laquo; Back</a>
	</div>
</div>
@endsection
