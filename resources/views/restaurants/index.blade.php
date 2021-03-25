@extends ('layouts/app')

@section('content')

<h2>Restaurants för {{$county}}, {{$county->cities->name}}</h2>

<div class="actions">
    @auth
    <a href="{{ route('restaurants.create', ['city' => $city]))}}" class="btn btn-primary btn-sm">Create new Restaurant</a>
    @endauth
</div>



@foreach ($restaurants as $restaurant)

<p>{{$restaurant}}
    <h5 class="card-title">
        <a href="{{ route('cities.show', ['city' => $city]) }}">{{ $city->name }}</a>
    </h5>

<p>{{$city->name}}</p>

@endforeach

<div class="mt-4">
    <a href="{{ route('cities.show', ['county' => $county, 'city' => $city]) }}" class="btn btn-secondary">&laquo; Back</a>
</div>


@endsection
