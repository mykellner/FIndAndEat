@extends ('layouts/app')

@section('content')

@auth
	<div class="container py-4">
		<div class="admin-panel">
			<div class="row">
				<div class="col-lg-10">
					<h1>Admin Panel</h1>
					<h4>You're in <strong><u>{{$city->name}}</u></strong> in {{$county->name}} County</h4>
					<p>In this panel you can create restaurants, create categories, edit this city or delete this city
				</div>

				<div class="col-lg-2 col-sm-12 text-end">

					<a href="{{ route('restaurants.create', ['county' => $county, 'city' => $city ]) }}" class="btn  btn-success mb-2">Create a Restaurant</a>

					<a href="{{ route('categories.create', ['county' => $county, 'city' => $city]) }}" class="btn btn-success mb-2">Create a Category</a>

					<a href="{{ route('cities.edit', ['county' => $county, 'city' => $city]) }}" class="btn btn-warning mb-2">Edit this City</a>

					<form action="{{ route('cities.destroy', ['county' => $county,'city' => $city]) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger mb-2">Delete this City</button>
					</form>

				</div>

			</div>
		</div>
	</div>
@endauth

<div class="container white-background py-4">
	<div class="row">
		<div class="col-lg-4 sidebar mb-3">

			<h2>Welcome to {{$city->name}}</h2>

			<select class="form-select form-select mb-3" id="cities" name="cities" onchange="top.location.href = this.options[this.selectedIndex].value">
				<option selected> Change city </option>
				@foreach ($county->cities as $citi)
					@if($city->name != $citi->name)
						<option value="{{ route('cities.show', ['county' => $county, 'city' => $citi]) }}">{{$citi->name}}</option>
					@endif
				@endforeach
			</select>

			<h2>Want to be more specific?</h2>

			<select class="form-select form-select mb-3" id="categories" name="categories" onchange="top.location.href = this.options[this.selectedIndex].value">
				<option selected> Choose a Category</option>
				@foreach ($categories as $category)
					<option value="{{ route('categories.show', ['county' => $county, 'city' => $city, 'category' => $category]) }}">{{$category->name}}</option>
				@endforeach
			</select>

			<div class="mt-4">
				<a href="{{ route('counties.show', ['county' => $county]) }}" class="btn btn-secondary w-100" >&laquo; Back to {{$county->name}}</a>
			</div>



		</div>

		<div class="col-sm-8">
			<h2>Restaurants in <strong> {{$city->name}} </strong></h2>
			<div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 g-4">

			@foreach ($city->restaurants as $restaurant)
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

								<p class="description">
									@if(!empty($restaurant->description))
										{{ substr($restaurant->description, 0, 100)}}
									@endif
								</p>
							</p>

							<a href="{{ route('restaurants.show', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant]) }}" class="btn btn-primary">Go to restaurant</a>
						</div>
					</div>
				</div>
			@endforeach

			</div>
		</div>

	</div>
</div>


@endsection
