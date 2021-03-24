@extends ('layouts/app')

@section('content')

    <h2>{{$county->name}}</h2>


    @foreach ($county->cities as $city)
    {{$city->name}}

    <a href="{{ route('cities.show', ['county' => $county, 'city' => $city]) }}"><p>{{ $city->name }} </p></a>
    @endforeach
   

    

@endsection
