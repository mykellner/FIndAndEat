@extends('layouts/app')

@section('content')
 <h1 class="mb-3">Edit {{$restaurant->name}} </h1>

 <form class="form" action='{{ route('restaurants.update', ['county' => $county, 'city' => $city, 'restaurant' => $restaurant])}} ' method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Name of Restaurant</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{$restaurant->name}}" required>
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Description</label>
        <input type="text" id="description" name="description" class="form-control" placeholder="Description" value="{{$restaurant->description}}" required>
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Address</label>
        <input type="text" id="address" name="address" class="form-control" placeholder="Address" value="{{$restaurant->address}}" required>
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Phone number</label>
        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone number"  value="{{$restaurant->phonenumber}}">
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Latitude</label>
        <input type="text" id="latitude" name="latitude" class="form-control" placeholder="Latitude" value="{{$restaurant->latitude}}">
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Longitude</label>
        <input type="text" id="longitude" name="longitude" class="form-control" placeholder="Longitude" value="{{$restaurant->longitude}}">
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasic">Add categories</label>
        <ul>
            @foreach ($categories as $category)
            <li><input type="checkbox" name="categories[]" value="{{$category->id}}">{{$category->name}}</li>
            @endforeach
        </ul>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasic">City</label>
        <ul>
            @foreach ($cities as $city)
            <li><input type="checkbox" name="categories[]" value="{{$city->id}}">{{$city->name}}</li>
            @endforeach
        </ul>
    </div>

    <button type="submit" class="btn btn-success w-100">Update</button>

 </form>

 <div class="mt-4">
    <a href="{{ route('cities.show', ['county' => $county, 'city' => $city]) }}" class="btn btn-secondary">&laquo; Back</a>
</div>


@endsection