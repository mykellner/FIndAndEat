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

						<div class="col-sm-4">
							<div class="card h-100">
								<div class="card-body">
									<h3 class="card-title mb-0">Name</h3>
									<p class="card-text mb-0">
										bla bla bla
									</p>
								</div>
							</div>
						</div>
            </div>
        </div>
    </div>
</div>
@endsection
