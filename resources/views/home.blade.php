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

                    {{ __('You are logged in!') }}

					<h4>Here are peoples suggestions on new restaurants</4>
						@foreach ($suggestions as $suggestion)


						<div class="col-sm-12">
							<div class="card h-100">
								<div class="card-body">
									<p class="card-text mb-0">
										{{$suggestion->fname}} {{$suggestion->lname}},
										{{$suggestion->name}}
										{{$suggestion->city}}

									</p>
								</div>
							</div>
						</div>

						@endforeach
            </div>
        </div>
    </div>
</div>
@endsection
