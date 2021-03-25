@extends ('layouts/app')

@section('content')

    <h2>{{$county->name}}</h2>


    @foreach ($county->cities as $city)
    {{$city->name}}

    <a href="{{ route('cities.show', ['county' => $county, 'city' => $city]) }}"><p>{{ $city->name }} </p></a>
    @endforeach


<div class="actions">
    @auth
    <a href="{{ route('cities.create', ['county' => $county]) }}" class="btn btn-primary btn-sm">Create a new City</a>
    @endauth
</div>

@endsection
