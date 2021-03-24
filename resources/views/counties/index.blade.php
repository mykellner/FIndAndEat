@extends ('layouts/app')

@section('content')

<h2>Hej alla län!</h2>

<div class="actions">
    @auth
    <a href="/counties/create" class="btn btn-primary btn-sm">Create new County</a>
    @endauth
</div>

@foreach ($counties as $county)
    <a href="{{ route('counties.show', ['county' => $county]) }}"><p>{{ $county->name }} </p></a>
@endforeach

@endsection
