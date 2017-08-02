<header class="main clearfix">
	<div class="container">
		<a href="{{ url('') }}" id="logo-color"></a>
		<div class="mobile-nav">
			<button id="search-toggle" class="mobile-actions" type="button" data-target="#main-search">
				<span class="fa fa-search"></span>
			</button>
			<button id="nav-toggle" class="mobile-actions" type="button" data-target="#main-navigation">
				<span class="fa fa-bars"></span>
			</button>
		</div>
		<nav class="main" id="main-navigation">
			<ul>
				<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('') }}" title="Homepage">Home</a></li>
				<li class="{{ Request::is('tracks') || Request::is('tracks/*') ? 'active' : '' }}"><a href="{{ url('tracks') }}" title="Browse tracks">Tracks</a></li>
				<li class="{{ Request::is('albums') || Request::is('albums/*') ? 'active' : '' }}"><a href="{{ url('albums') }}" title="Browse albums">Albums</a></li>
				<li class="{{ Request::is('mixtapes') || Request::is('mixtapes/*') ? 'active' : '' }}"><a href="{{ url('mixtapes') }}" title="Browse mixtapes">Mixtapes</a></li>
				<li class="{{ Request::is('videos') || Request::is('videos/*') ? 'active' : '' }}"><a href="{{ url('videos') }}" title="Browse videos">Videos</a></li>
			</ul>
		</nav>
		<form action="{{ url('search') }}" method="get" class="search" id="main-search">
			<button type="submit"><span class="fa fa-search"></span></button>
			<input type="text" name="q" placeholder="" />
		</form>
	</div>
</header>