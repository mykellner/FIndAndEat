@extends ('layouts/app')

@section('content')

<div class="container py-4">

@auth
	<div class="container py-4">
		<div class="admin-panel">
			<div class="row">
				<div class="col-lg-10">
					<h1>Admin Panel</h1>
					<h4>You're in the admin panel for restaurant <u><strong>{{$restaurant->name}}</strong></u> in {{$city->name}}, {{$county->name}} County</h4>
					<p>You can edit this restaurant, add links to it or delete it.</p>
				</div>

				<div class="col-lg-2 text-end">
					<a href="{{ route('restaurants.edit', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant])}}" class="btn btn-yellow mb-2">Edit this Restaurant</a>

					<form action="{{ route('restaurants.destroy', ['county' => $county,'city' => $city, 'restaurant' => $restaurant]) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-red mb-2">Delete this Restaurant</button>
					</form>

					<a href="{{ route('links.create', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant])}}" class="btn btn-green mb-2">Add links to Restaurant</a>

				</div>

			</div>
		</div>
	</div>
@endauth



<div class="container py-4">

	<div class="row">
		<div class="col-lg-4 sidebar mb-3">

			<h2>{{$restaurant->city->name}}</h2>

			<div class="mt-4">
				<a href="{{ route ('cities.show', ['county' => $county, 'city' => $city])}}" class="btn btn-secondary w-100" >&laquo; Back to {{$city->name}}</a>
			</div>

		</div>

		<div class="col-sm-8">
			<div class="col-sm-8">
				<div>
					<h2>{{$restaurant->name}}</h2>
					<div class="d-flex">
						<p class="me-2">Categories: </p>
						<p> @foreach($restaurant->categories as $category)
								{{ $category->name }}
							@endforeach
						</p>
					</div>

					<div class="d-flex">
						<p class="me-4">Address: </p>
						<p>{{$restaurant->address}}</p>
					</div>
					<div class="d-flex">
						<p class="me-2">Description: </p>
						<p>{{$restaurant->description}}</p>
					</div>
					<div class="d-flex">
						@if ($restaurant->phonenumber)
							<p class="me-1">Phoneumber:</p>
							<p> {{$restaurant->phonenumber}} </p>
						@endif
					</div>
				</div>
				</div>
			<div class="row mt-5">
				<h5>Get in contact with {{$restaurant->name}}</h5>
				@foreach ($linktypes as $linktype)
				<div class="col-md-4">
				<p><strong>{{$linktype->type}}</strong></p>
					@foreach ($restaurant->links as $link)
					<div class="d-flex mb-1">
						@if ($link->link_type->id === $linktype->id)
							@if($linktype->type === 'email')
							<a href="mailto:{{$link->url}}" class="me-5">{{$link->url}}</a>
							@else
							<a href=" {{$link->url}}" class="me-5" target="_blank">{{$link->url}}</a>
							@endif
							@auth
							<form action="{{ route('links.destroy', ['county' => $county,'city' => $city, 'restaurant' => $restaurant, 'link' => $link->id]) }}" method="POST">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-sm btn-red me-1"><i class="fas fa-trash fa-xs"></i></button>
							</form>
							<button class="btn btn-yellow btn-sm"><a href="{{ route('links.edit', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant, 'link' => $link->id])}}" class=""><i class="fas fa-pen fa-xs"></i></a></button>
							@endauth
						@endif
					</div>
					@endforeach
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection
