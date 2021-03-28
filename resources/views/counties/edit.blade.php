@extends('layouts/app')

@section('content')
<div class="container py-4">

	<h1 class="mb-3">Edit the name of {{$county->name}} </h1>

	<form class="form" action='{{ route('counties.update', ['county' => $county] )}} ' method="POST">
		@csrf
		@method('PUT')
		<div class="mb-3">
			<input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{$county->name}}"required>
		</div>
		<button type="submit" class="btn btn-green w-100">Update</button>
	</form>

	<div class="mt-4">
		<a href="{{ route('counties.show', ['county' => $county]) }}" class="btn btn-secondary">&laquo; Back</a>
	</div>

</div>
@endsection
