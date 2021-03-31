@extends('layouts/app')

@section('content')
<div class="container py-4">
	<h1 class="mb-3">Send in your Suggestion</h1>

	<form class="form" action='{{ route('suggestions.store')}} ' method="POST">
	@csrf

	<div class="row g-3">

		<div class="col">
			<div class="mb-3">
				<label for="fname" class="form-label">Your First Name</label>
				<input type="text" id="fname" name="fname" class="form-control @error('fname') is-invalid @enderror" placeholder="Name" value="{{ old('fname') }}" required>
				@error('fname')
					<div id="fname" class="validation-error">{{ $message }}</div>
				@enderror
			</div>
		</div>

		<div class="col">
			<div class="mb-3">
				<label for="lname" class="form-label">Your Last Name</label>
				<input type="text" id="lname" name="lname" class="form-control" placeholder="Your last name">
			</div>
		</div>
	</div>

	<legend>Info about the Restaurant</legend>
	<div class="col">
		<div class="mb-3">
			<label for="name" class="form-label">Name of the restaurant</label>
			<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name of restaurant" value="{{ old('name') }}" required>
				@error('name')
					<div id="name" class="validation-error">{{ $message }}</div>
				@enderror
		</div>
	</div>

	<div class="row g-3">

		<div class="col">
			<div class="mb-3">
				<label for="county" class="form-label">County</label>
				<input type="text" id="county" name="county" class="form-control @error('county') is-invalid @enderror" placeholder="County" value="{{ old('county') }}" required>
				@error('county')
					<div id="county" class="validation-error">{{ $message }}</div>
				@enderror
			</div>
		</div>

		<div class="col">
			<div class="mb-3">
				<label for="city" class="form-label">City</label>
				<input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="City" value="{{ old('city') }}" required>
				@error('city')
					<div id="city" class="validation-error">{{ $message }}</div>
				@enderror
			</div>
		</div>

	</div>

	<div class="mb-3">
		<label for="description" class="form-label">Give us reasons on why we should add the restaurant</label>
		<textarea id="description" name="description" class="form-control" @error('description') is-invalid @enderror placeholder="Why should we add this restaurant?" value=" {{ old('description') }} rows="3" required></textarea>
			@error('description')
				<div id="description" class="validation-error">{{ $message }}</div>
			@enderror
	</div>

	<button type="submit" class="btn btn-success w-100">Send</button>
	</form>

	<div class="mt-4">
		<a href="{{ route('counties.index') }}" class="btn btn-secondary">&laquo; Back</a>
	</div>

</div>
@endsection
