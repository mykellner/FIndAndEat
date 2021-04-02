@extends('layouts/app')

@section('content')
<div class="container py-4">
	<h1 class="mb-3">Create new County </h1>

	<form class="form" action='{{ route('counties.store')}} ' method="POST">
	@csrf
		<div class="mb-3">
			<label for="title" class="form-label">Name of County</label>
			<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required>
				@error('name')
					<div id="name" class="validation-error">{{ $message }}</div>
				@enderror
		</div>

		<button type="submit" class="btn btn-success w-100">Create</button>
	</form>

	<div class="mt-4">
		<a href="{{ route('counties.index') }}" class="btn btn-secondary">&laquo; Back</a>
	</div>

</div>
@endsection
