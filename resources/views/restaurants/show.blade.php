@extends ('layouts/app')

@section('content')

<h2>{{$restaurant->name}}</h2>
<h4>{{$restaurant->description}}</h4>
<p>{{$restaurant->address}}

@endsection
