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
					<li><a href="{!! route('i.contents.create') !!}"><span class="glyphicon glyphicon-plus"></span> Compose</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-paperclip"></span> Upload</a></li>
					<li><a href="{{ route('i.contents.index') }}">Contents</a></li>
				</ul>


				@unless(Auth::guest())
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span class="glyphicon glyphicon-cog"></span></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-option-horizontal"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ route('i.contents.index') }}">Contents</a></li>
								<li><a href="{{ route('i.categories.index') }}">Categories</a></li>
								<li><a href="{{ route('i.tags.index') }}">Tags</a></li>
								<li><a href="">Media</a></li>
								<li class="divider"></li>
								<li><a href="{{ route('i.authors.index') }}">Authors</a></li>
								<li><a href="">Settings</a></li>
							</ul>
						</li>
						<li><a href="#"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->email }}</a></li>
						<li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
					</ul>
				@endunless
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
