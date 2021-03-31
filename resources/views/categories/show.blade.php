@extends ('layouts/app')

@section('content')


@auth
	<div class="container py-4">
		<div class="admin-panel">
			<div class="row">
				<div class="col-lg-10">
					<h1>Admin Panel</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, rem tempore necessitatibus reprehenderit labore.</p>
				</div>

				<div class="col-lg-2 text-end">
					<a href="{{ route('categories.edit', ['county' => $county, 'city' => $city, 'category' => $category])}}" class="btn btn-yellow mb-2">Edit this Category</a>

					<form action="{{ route('categories.destroy', ['county' => $county,'city' => $city, 'category' => $category]) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-red mb-2">Delete this Category</button>
					</form>
				</div>

			</div>
		</div>
	</div>
@endauth

<div class="container py-4">

	<div class="row">
		<div class="col-lg-4 sidebar mb-3">
			<h2>Welcome to {{$city->name}}, {{$county->name}}</h2>
			<h4>Category: {{$category->name}}</h4>

			{{-- <select class="form-select form-select mb-3" id="counties" name="counties" onchange="top.location.href = this.options[this.selectedIndex].value">
				<option selected>Choose a City</option>
				@foreach ($county->cities as $city)
					<option value="{{ route("cities.show", ['county' => $county, 'city' => $city]) }}">{{$city->name}}</option>
				@endforeach
			</select> --}}


			<div class="mt-4">
				<a href="{{ route('cities.show', ['county' => $county, 'city' => $city]) }}" class="btn btn-secondary w-100" >&laquo; Back to {{$city->name}}</a>
			</div>

		</div>

		<div class="col-sm-8">
			<h2>Restaurants</h2>
			<div class="row row-cols-1 row-cols-md-2 g-4">

			@foreach ($restaurants as $restaurant)
				<div class="col">
					<div class="card h-100">
						<div class="card-body">
							<h3 class="card-title mb-0">{{ $restaurant->name }}</h3>
							<p class="card-text mb-0">
								<ul class="list-inline mb-0">
								<small>Ort: {{ $restaurant->city->name }} | </small>

								@if(count($restaurant->categories) > 0)
									<small>Categories:</small>
									@foreach ($restaurant->categories as $category )
										<small><li class="list-inline-item">{{ $category->name }}</li></small>
									@endforeach
								@else
									<small><li class="list-inline-item">No specefic category</li></small>
								@endif
								</ul>

								<small>Address: {{ $restaurant->address }}</small>

								<p class="description">
									@if(!empty($restaurant->description))
										{{ substr($restaurant->description, 0, 100)}} ...
									@endif
								</p>
							</p>
							<a href="{{ route("restaurants.show", ['county' => $county, 'city' => $restaurant->city, 'restaurant' => $restaurant]) }}" class="btn btn-yellow">Go to restaurant</a>
						</div>
					</div>
				</div>
			@endforeach

			</div>
		</div>
	</div>
</div>



@endsection
