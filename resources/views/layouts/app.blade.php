<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
</head>

<body>

	<header>
		@include('includes/nav')
	</header>

	<main class="wrapper">
			@include('includes/status')
				@yield('content')
            @include('includes/footer')
	</main>



</body>
