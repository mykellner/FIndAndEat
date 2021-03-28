@extends('layouts/app')

@section('content')
<div class="container py-4">
	<h1 class="mb-3">Create new County </h1>

	<form class="form" action='{{ route('counties.store')}} ' method="POST">
	@csrf
		<div class="mb-3">
			<input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
		</div>
		<button type="submit" class="btn btn-green w-100">Create</button>
	</form>

	<div class="mt-5">
		<a href="{{ route ('counties.index')}} class="btn btn-secondary">&laquo; Back</a>
	</div>

</div>
@endsection
