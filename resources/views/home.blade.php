@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-2">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


				<h3>Suggestion</h3>

					@foreach ($suggestions as $suggestion)
						{{$suggestion->fname}} {{$suggestion->lname}}
						{{$suggestion->name}}
						{{$suggestion->city}}
						{{$suggestion->description}}


					@endforeach
				</div>

									{{-- <a href="{{ route("restaurants.show", ['county' => $county, 'city' => $restaurant->city, 'restaurant' => $restaurant]) }}" class="btn btn-yellow">Go to restaurant</a> --}}
			</div>
		</div>
	</div>
</div>
@endsection
