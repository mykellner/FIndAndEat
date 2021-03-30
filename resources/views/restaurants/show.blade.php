@extends ('layouts/app')

@section('content')

<div class="container py-4">

@auth
	<div class="container py-4">
		<div class="admin-panel">
			<div class="row">
				<div class="col-lg-10">
					<h1>Admin Panel</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, rem tempore necessitatibus reprehenderit labore.</p>
				</div>

				<div class="col-lg-2 text-end">
					<a href="{{ route('restaurants.edit', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant])}}" class="btn btn-yellow mb-2">Edit this Restaurant</a>

					<form action="{{ route('restaurants.destroy', ['county' => $county,'city' => $city, 'restaurant' => $restaurant]) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-red mb-2">Delete this Restaurant</button>
					</form>

					<a href="{{ route('links.create', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant])}}" class="btn btn-green mb-2">Add links to restaurant</a>

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
				<a href="{{ route ('cities.show', ['county' => $county, 'city' => $city])}}" class="btn btn-secondary w-100" >&laquo; Back</a>
			</div>

		</div>

		<div class="col-sm-8">
			<div>
				<h2>{{$restaurant->name}}</h2>
				<p>{{$restaurant->description}}</p>
				<p>{{$restaurant->address}}</p>
				@foreach($restaurant->categories as $category)
					{{ $category->name }}</p>
				@endforeach
			</div>
			<div class="row mt-5">
				@foreach ($linktypes as $linktype)
				<div class="col-md-4">
				<p><strong>{{$linktype->type}}</strong></p>
					@foreach ($restaurant->links as $link)
						@if ($link->link_type->id === $linktype->id)
							@if($linktype->type === 'email')
							<a href="mailto:{{$link->url}}">{{$link->url}}</a>
							@else
							<a href=" {{$link->url}}" target="_blank">{{$link->url}}</a>
							@endif
							@auth
							<form action="{{ route('links.destroy', ['county' => $county,'city' => $city, 'restaurant' => $restaurant, 'link' => $link->id]) }}" method="POST">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-sm btn-red mb-2">x</button>
							</form>
							<a href="{{ route('links.edit', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant, 'link' => $link->id])}}" class="btn btn-yellow mb-2">Edit</a>
							@endauth
						@endif
			@endforeach
		</div>
				@endforeach
			</div>
		</div>
	</div>
</div>





@endsection
