@extends ('layouts/app')

@section('content')

<h2>Restaurants för {{$county}}, {{$county->cities->name}}</h2>

@foreach ($restaurants as $restaurant)

<p>{{$restaurant}}
    <h5 class="card-title">
        <a href="{{ route('cities.show', ['city' => $city]) }}">{{ $city->name }}</a>
    </h5>

<p>{{$city->name}}</p>

@endforeach

@endsection
