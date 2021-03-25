@extends ('layouts/app')

@section('content')

<h1>Restauranger i {{$city->name}}, {{$county->name}}, {{$category->name}} </h1>



@foreach ($category->restaurants as $restaurant)

<a href="{{ route('restaurants.show', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant]) }}"><b><h4>{{$restaurant->name}}</h4></b></a>
<p>{{$restaurant->description}} </br>{{$restaurant->address}}</p>

@endforeach



@endsection