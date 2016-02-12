<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title or 'impress'}}</title>

	@section('head-styles')
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href="/css/app.css" rel="stylesheet">
	@stop
	@yield('head-styles')

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="{!! route('i.contents.create') !!}">@icon('pencil') Compose</a></li>
					<li><a href="#">@icon('paperclip') Upload</a></li>
				</ul>

				@unless(Auth::guest())
					<ul class="nav navbar-nav navbar-right">
						<li><a href="{{ route('i.contents.index') }}">@icon('list') Contents</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">@icon('option-horizontal')</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ route('i.contents.index') }}">@icon('list') Contents</a></li>
								<li><a href="{{ route('i.categories.index') }}">@icon('folder-open') Categories</a></li>
								<li><a href="{{ route('i.tags.index') }}">@icon('tags') Tags</a></li>
								<li><a href="">@icon('picture') Media</a></li>
								<li class="divider"></li>
								<li><a href="{{ route('i.authors.index') }}">@icon('user') Authors</a></li>
								<li><a href="{{ route('i.settings.index') }}">@icon('cog') Settings</a></li>
								<li class="divider"></li>
								<li><a href="{{ route('logout') }}">@icon('off') Logout</a></li>
							</ul>
						</li>
						<li><a href="{{ route('i.settings.index') }}">@icon('cog') Settings</a></li>
						<li><a href="#">@icon('user') {{ Auth::user()->email }}</a></li>
						<li><a href="{{ route('logout') }}">@icon('off')</a></li>
					</ul>
				@endunless
			</div>
		</div>
	</nav>

	<div id="@yield('container-id')" class="container">
		@yield('content')
	</div>

	@section('foot-scripts')
		<script src="/js/main.js"></script>
	@stop
	@yield('foot-scripts')
</body>
</html>
