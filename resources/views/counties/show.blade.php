@extends ('layouts/app')

@section('content')

    <h2>{{$county->name}}</h2>

    @foreach ($county->cities as $city)
    {{$city->name}}
    @endforeach
   

    

@endsection
