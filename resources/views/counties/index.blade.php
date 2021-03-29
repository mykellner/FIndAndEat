@extends ('layouts/app')

@section('content')


@auth
<div class="container py-4">
	<div class="admin-panel">
		<div class="row">
			<div class="col-lg-4">
				<h1>Admin Panel</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, rem tempore necessitatibus reprehenderit labore.</p>
				<p>Lorem ipsum dolor sit amet consectetur.</p>

			</div>

			<div class="col-lg-8">
				<h5>Create a new County </h5>
				<a href="{{ route('counties.create')}}" class="btn btn-green">Create new County</a>
			</div>
		</div>
	</div>
</div>
@endauth


<div class="jumbotron">
	<div class="container py-4">
		<div class="counties-index mb-4">
			<h1 class="display-4 text-center">Hangry?</h1>
			<p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>

			<hr class="my-4">

			<select class="form-select form-select-lg mb-3" id="counties" name="counties" onchange="top.location.href = this.options[this.selectedIndex].value">
				<option value="counties" selected disabled>Choose a County</option>
				@foreach ($counties as $county)
					<option value="{{ route("counties.show", ['county' => $county->id]) }}">{{$county->name}} </option>
				@endforeach
			</select>

		</div>
	</div>

	<div class="container py-4">
		<div class="counties-index mb-4">
			<h1 class="display-4 text-center">Latest added</h1>
			<hr class="my-4">
			@foreach ($restaurants as $restaurant)
				<div class="row">
					<div class="col-12">
						<h2><a href="{{route("restaurants.show", ['county' => $restaurant->city->county, 'city' => $restaurant->city, 'restaurant' => $restaurant ])}}">{{$restaurant->name}}</h2></a>
						<p>{{$restaurant->description}} | {{$restaurant->address}} </p>
					</div>
				</div>
			@endforeach
			</select>

		</div>
	</div>
</div>





@endsection
