@extends ('layouts/app')

@section('content')

<h1>Restauranger i {{$city->name}}, {{$county->name}} </h1>


<div class="actions">
    @auth
    <a href="{{ route('restaurants.create', ['county' => $county, 'city' => $city])}}" class="btn btn-primary btn-sm">Create new Restaurant</a>
    @endauth
</div>

<div class="actions mt-3">
    @auth
    <a href="{{ route('categories.create', ['county' => $county, 'city' => $city])}}" class="btn btn-primary btn-sm">Create new Category</a>
    @endauth
</div>

<div class="actions">
    @auth
    <a href="{{ route('cities.edit', ['county' => $county, 'city' => $city])}}" class="btn btn-primary btn-sm">Edit City</a>
    @endauth
</div>

<form action="{{ route('cities.destroy', ['county' => $county,'city' => $city]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete city</button>
    </form>

@foreach ($categories as $category)

<a href="{{ route('categories.show', ['county' => $county, 'city' => $city, 'category' => $category]) }}"><b><h4>{{$category->name}}</h4></b></a>

@endforeach

@foreach ($city->restaurants as $restaurant)

<a href="{{ route('restaurants.show', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant]) }}"><b><h4>{{$restaurant->name}}</h4></b></a>
<p>{{$restaurant->description}} </br>{{$restaurant->address}}</p>

@endforeach

<div class="mt-4">
    <a href="{{ route('counties.show', ['county' => $county]) }}" class="btn btn-secondary">&laquo; Back</a>
 </div>



@endsection
