<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title or 'impress'}}</title>

	@section('head-styles')
		<link href="/css/app.css" rel="stylesheet">
	@stop
	@yield('head-styles')

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="{!! route('i.contents.create') !!}">Compose</a></li>
					<li><a href="{!! route('i.contents.index') !!}">Contents</a></li>
					<li><a href="{!! route('i.categories.index') !!}">Categories</a></li>
				</ul>

				@unless(Auth::guest())
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">{{ Auth::user()->email }}</a></li>
						<li><a href="{!! route('logout') !!}">Logout</a></li>
					</ul>
				@endif
			</div>
		</div>
	</nav>

	@yield('content')

	@section('foot-scripts')
		<script src="/js/app.js"></script>
	@stop
	@yield('foot-scripts')
</body>
</html>
