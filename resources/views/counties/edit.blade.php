@extends('layouts/app')

@section('content')
 <h1 class="mb-3">Edit {{$county->name}} </h1>

 <form class="form" action='{{ route('counties.update', ['county' => $county] )}} ' method="POST">
 @csrf
 @method('PUT')

 <div class="mb-3">
    <label for="title" class="form-label">Name of County</label>
    <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{$county->name}}"required>
 </div>


 <button type="submit" class="btn btn-success w-100">Create</button>
 </form>

 <div class="mt-4">
    <a href="{{ route('counties.show', ['county' => $county]) }}" class="btn btn-secondary">&laquo; Back</a>
</div>
@endsection
