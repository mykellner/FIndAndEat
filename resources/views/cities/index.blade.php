@extends ('layouts/app')

@section('content')

<h2>Orter för {{$county}}</h2>

@foreach ($cities as $city)

<h5 class="card-title"><a href="{{ route('cities.show', ['city' => $city]) }}">{{ $city->name }}</a></h5>

<p>{{$city->name}}</p>
    
@endforeach

@endsection