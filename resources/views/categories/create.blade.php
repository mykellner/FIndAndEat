@extends('layouts/app')

@section('content')
 <h1 class="mb-3">Create a new Category</h1>

 <form class="form" action='{{ route('cities.store', ['county' => $county])}} ' method="POST">
 @csrf

 <div class="mb-3">
    <label for="title" class="form-label">Name of Category</label>
    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
 </div>

 <button type="submit" class="btn btn-success w-100">Create</button>
 </form>

 <div class="mt-5">
 <a href="{{ route('cities.show', ['county' => $county] ]}" class="btn btn-secondary">&laquo; Back</a>
 </div>
@endsection
