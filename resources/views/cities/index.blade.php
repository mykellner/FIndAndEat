@extends ('layouts/app')

@section('content')

<h2>Orter för {{$county}}</h2>

@foreach ($cities as $city)

<p>{{$city->name}}</p>
    
@endforeach

@endsection