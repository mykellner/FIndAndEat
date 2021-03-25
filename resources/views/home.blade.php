@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="actions">
                        <a href="{{ route('counties.create')}}" class="btn btn-primary btn-sm">Create new County</a>
                    </div>

                    <div class="actions">
                        @auth
                        <a href="{{ route('cities.create')}}" class="btn btn-primary btn-sm">Create a new City</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
