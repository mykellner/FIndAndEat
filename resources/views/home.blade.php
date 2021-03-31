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

					@foreach ($suggestions as $suggestion)
					<h3>Restaurant suggestions: {{$suggestions->count()}}</h3>
					@endforeach

					@foreach ($suggestions as $suggestion)
					<div class="card mb-4">
						<div class="toast-header">
						  <strong class="me-auto">Suggestion from: {{$suggestion->fname}} {{$suggestion->lname}}</strong>
						  <small class="text-muted">{{$suggestion->updated_at}}</small>
						  <form action="{{ route('suggestions.destroy', ['suggestion' => $suggestion->id]) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</form>
						</div>
						<div class="toast-body">
							<ul>
								<li><strong class="me-auto">Restaurant: {{$suggestion->name}}</strong></li>
								<li><strong class="me-auto">City: {{$suggestion->city}}</strong></li>
								<li><strong class="me-auto">County: {{$suggestion->county}}</strong></li>
								<li><strong class="me-auto">Description: {{$suggestion->description}}</strong></li>
							</ul>
						</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
