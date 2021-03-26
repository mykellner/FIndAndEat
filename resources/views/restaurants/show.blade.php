@extends ('layouts/app')

@section('content')

<h2>{{$restaurant->name}}</h2>
<h4>{{$restaurant->description}}</h4>
<p>{{$restaurant->address}}</p>

<div class="actions">
    <a href="{{ route('restaurants.edit', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant])}}" class="btn btn-primary btn-sm">Edit Restaurant</a>
</div>

<form action="{{ route('restaurants.destroy', ['county' => $county,'city' => $city, 'restaurant' => $restaurant]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete restaurant</button>
</form>


<div class="mt-4">
    <a href="{{ route('cities.show', ['county' => $county, 'city' => $city]) }}" class="btn btn-secondary">&laquo; Back</a>
</div>

@endsection
