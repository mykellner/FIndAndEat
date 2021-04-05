@extends('layouts/app')

@section('content')
<div class="container white-background py-4">

	<h1 class="mb-3">Edit the name of {{$county->name}} </h1>

	<form class="form" action='{{ route('counties.update', ['county' => $county] )}} ' method="POST">
		@csrf
		@method('PUT')
		<div class="mb-3">

			<label for="name" class="form-label">Name of County</label>
			<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ $county->name }}" required>
				@error('name')
					<div id="name" class="validation-error">{{ $message }}</div>
				@enderror

		</div>

		<button type="submit" class="btn btn-success w-100">Update</button>
	</form>

	<div class="mt-4">
		<a href="{{ route('counties.show', ['county' => $county]) }}" class="btn btn-secondary">&laquo; Back</a>
	</div>

</div>
@endsection
