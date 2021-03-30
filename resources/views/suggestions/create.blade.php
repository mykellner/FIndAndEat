@extends('layouts/app')

@section('content')
<div class="container py-4">
	<h1 class="mb-3">Send in your Suggestion</h1>

	<form class="form" action='{{ route('suggestions.store')}} ' method="POST">
	@csrf

	<div class="row g-3">

		<div class="col">
			<div class="mb-3">
				<label for="title" class="form-label">Your Name:</label>
				<input type="text" id="fname" name="fname" class="form-control" placeholder="Your first name" required>
			</div>
		</div>

		<div class="col">
			<div class="mb-3">
				<label for="title" class="form-label">Your Name:</label>
				<input type="text" id="lname" name="lname" class="form-control" placeholder="Your last name">
			</div>
		</div>
	</div>

	<legend>Info about the Restaurant</legend>
	<div class="col">
		<div class="mb-3">
			<label for="title" class="form-label">Name of the restaurant</label>
			<input type="text" id="name" name="name" class="form-control" placeholder="Name of the restaurant" required>
		</div>
	</div>

	<div class="row g-3">

		<div class="col">
			<div class="mb-3">
				<label for="title" class="form-label">County</label>
				<input type="text" id="county" name="county" class="form-control" placeholder="County" required>
			</div>
		</div>

		<div class="col">
			<div class="mb-3">
				<label for="title" class="form-label">City</label>
				<input type="text" id="city" name="city" class="form-control" placeholder="City" required>
			</div>
		</div>

	</div>

	<div class="mb-3">
		<label for="title" class="form-label">Give us reasons on why we should add the restaurant</label>
		<textarea id="description" name="description" class="form-control" placeholder="Why should we add this restaurant?" rows="3" required></textarea>
	</div>



	<button type="submit" class="btn btn-success w-100">Send</button>
	</form>

	<div class="mt-4">
		<a href="{{ route('counties.index') }}" class="btn btn-secondary">&laquo; Back</a>
	</div>

</div>
@endsection
