@extends ('layouts/app')

@section('content')

<h1>Restauranger i {{$city->name}}, {{$county->name}} </h1>
<h4>Category: {{$category->name}}</h4>



@foreach ($category->restaurants as $restaurant)

<a href="{{ route('restaurants.show', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant]) }}"><b><h4>{{$restaurant->name}}</h4></b></a>
<p>{{$restaurant->description}} </br>{{$restaurant->address}}</p>

@endforeach

<div class="actions mt-3">
    @auth
    <a href="{{ route('categories.edit', ['county' => $county, 'city' => $city, 'category' => $category])}}" class="btn btn-primary btn-sm">Edit Category</a>
    @endauth
</div>

<form action="{{ route('categories.destroy', ['county' => $county,'city' => $city, 'category' => $category]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete Category</button>
</form>

<div class="mt-4">
    <a href="{{ route('cities.show', ['county' => $county, 'city' => $city]) }}" class="btn btn-secondary">&laquo; Back</a>
 </div>

@endsection
