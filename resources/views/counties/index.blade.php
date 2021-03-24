@extends ('layouts/app')

@section('content')

<h2>Hej alla län!</h2>

@foreach ($counties as $county)
    <a href="{{ route('counties.show', ['county' => $county]) }}"><p>{{ $county->name }} </p></a>
@endforeach

@endsection
