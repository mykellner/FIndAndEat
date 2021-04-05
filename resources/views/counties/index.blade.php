@extends ('layouts/app')

@section('content')


@auth
<div class="container py-4">
	<div class="admin-panel">
		<div class="row">
			<div class="col-lg-10">
				<h1>Admin Panel</h1>
				<p>In this panel you can create new counties.</p>
			</div>

			<div class="col-lg-2 col-sm-12 text-end">
				<a href="{{ route('counties.create')}}" class="btn btn-success">Create a County</a>
			</div>
		</div>
	</div>
</div>
@endauth

	<div class="container white-background py-4">
		<div class="counties-index mb-4">
			<h1 class="display-4 text-center">Are you hungry?</h1>
			<p class="lead text-center">Where in Sweden do you want to eat?</p>

			<select class="form-select form-select-lg mb-3" id="counties" name="counties" onchange="top.location.href = this.options[this.selectedIndex].value">
				<option value="counties" selected disabled>Choose a County</option>
				@foreach ($counties as $county)
					<option value="{{ route("counties.show", ['county' => $county->id]) }}">{{$county->name}} </option>
				@endforeach
			</select>

		</div>
	</div>

	<div class="container white-background py-4">
		<div class="counties-index mb-4">
			<h1 class="display-4 text-center">Latest added Restaurants</h1>
			<hr class="my-4">
			@foreach ($restaurants as $restaurant)
				<div class="row">
					<div class="col-12">
						<h2>
							<a href="{{route("restaurants.show", ['county' => $restaurant->city->county, 'city' => $restaurant->city, 'restaurant' => $restaurant ])}}">{{$restaurant->name}}
						</a></h2>
						<p>{{$restaurant->description}} | {{$restaurant->address}} </p>
					</div>
				</div>
			@endforeach
			</select>

		</div>
	</div>






@endsection
