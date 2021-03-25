@extends ('layouts/app')

@section('content')

<h2>{{$restaurant->name}}</h2>
<h4>{{$restaurant->description}}</h4>
<p>{{$restaurant->address}}</p>

<div class="actions">
    @auth
    <a href="{{ route('restaurants.edit', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant])}}" class="btn btn-primary btn-sm">Edit Restaurant</a>
    @endauth
</div>


<div class="mt-4">
    <a href="{{ route('cities.show', ['county' => $county, 'city' => $city]) }}" class="btn btn-secondary">&laquo; Back</a>
</div>

@endsection
