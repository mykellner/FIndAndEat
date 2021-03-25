@extends('layouts/app')

@section('content')
 <h1 class="mb-3">Edit {{$category->name}}</h1>

 <form class="form" action='{{ route('categories.update', ['county' => $county, 'city' => $city, 'category' => $category])}} ' method="POST">
 @csrf
 @method('PUT')

 <div class="mb-3">
    <label for="title" class="form-label">Name of Category</label>
    <input type="text" id="name" name="name" class="form-control" value="{{$category->name}}" placeholder="Name" required>
 </div>

 <button type="submit" class="btn btn-success w-100">Update</button>
 </form>


 <div class="mt-4">
    <a href="{{ route('cities.show', ['county' => $county, 'city' => $city]) }}" class="btn btn-secondary">&laquo; Back</a>
 </div>

@endsection
