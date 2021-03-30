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
				<a href="{{ url()->previous() }}" class="btn btn-secondary w-100" >&laquo; Back</a>
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
			<div class="linktypes d-flex">

			@foreach ($restaurant->links as $link)
				<p>{{$link->url}}</p>
				<p>{{$link->linktype->type}}</p>
			
					{{-- @foreach ($linktype->links as $link)
						<a href="">{{$link->url}}</a>
					@endforeach --}}
			
            @endforeach
			{{-- @foreach ($links as $link)
			@if ($link->linktype->type === 'website')
			<div><p>Website:{{$link->url}}</p></div>
			
			{{-- @elseif
			 	($linktype->type === 'social')<div><p>Social:{{$linktype->url}}</p></div>@elseif
				($linktype->type === 'email')<div><p>Email:{{$linktype->url}}</p></div>@endif --}}
			
			</div>
		</div>
	</div>
</div>





@endsection
