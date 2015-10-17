<!DOCTYPE html>
<html lang="nl">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			Moskee Amsterdam
			@show
		</title>
		<meta name="keywords" content="Abu hanifa moskee" />
		<meta name="author" content="Reshad Farid" />
		<meta name="description" content="Moskee Abu Hanifa Amsterdam Amsterdam-Noord." />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
        {{ Basset::show('public.css') }}

		<style>
		@section('styles')
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
	</head>

	<body>
		<!-- To make sticky footer need to wrap in a div -->
		<div id="wrap">
        <div class="container">
        <div class="heading">
                <div class="row">
                    <div class="col-md-6">
                        <span id="logo"><img class="img-responsive" src="/assets/img/logo.png"></span>
                    </div>
                    <div class="col-md-6">
                        <section id="quotes">
                            <article class="boxed">
                                <ul id="quote" class="nolist textcenter aligncenter">

                                    <li class="animated flipInX">
                                        <div class="quote"><p>Quote of the day</p></div>
                                        <div class="person">By ...</div>
                                    </li>
                                    <li class="animated flipInX">
                                        <div class="quote"><p>Another Quote..</p></div>
                                        <div class="person">By another person</div>
                                    </li>

                                </ul>
                            </article>
                        </section>
                    </div>
                </div>
		<!-- Navbar -->
		<div class="navbar">
			 <div class="container">
                <div class="navbar-header">
                <a class="navbar-brand visible-xs" href="#">Menu</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
						<li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">Home</a></li>
					</ul>

                    <ul class="nav navbar-nav pull-right">
                        @if (Auth::check())
                        @if (Auth::user()->hasRole('admin'))
                        <li><a href="{{{ URL::to('admin') }}}">Admin Panel</a></li>
                        @endif
                        <li><a href="{{{ URL::to('user') }}}">{{{ Lang::get('site.logged_in') }}} {{{ Auth::user()->username }}}</a></li>
                        <li><a href="{{{ URL::to('user/logout') }}}">{{{ Lang::get('site.logout') }}}</a></li>
                        @else
                        <li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/login') }}}">Login</a></li>
                       {{-- <li {{ (Request::is('user/register') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">{{{ Lang::get('site.sign_up') }}}</a></li> --}}
                        @endif
    					<li class="dropdown taal">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{{Lang::get('site.choose_language')}}} <b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li>{{link_to_route('language.select', Lang::get('site.english'), array('en'))}}</li>
    					  <li>{{link_to_route('language.select', Lang::get('site.dutch'), array('nl'))}}</li>
    					  <li>{{link_to_route('language.select', Lang::get('site.dari'), array('da'))}}</li>
    					  <li>{{link_to_route('language.select', Lang::get('site.pashto'), array('pa'))}}</li>
				        </ul>
				        </li>
                    </ul>
					<!-- ./ nav-collapse -->
				</div>
			</div>
		</div>
		<!-- ./ navbar -->
        </div>
        </div>

		<!-- Container -->
		<div class="container">
			<div class="innerpage">
				<!-- Notifications -->
				@include('notifications')
				<!-- ./ notifications -->

				<!-- Content -->
				@yield('content')
				<!-- ./ content -->
			</div>
		</div>
		<!-- ./ container -->

		<!-- sticky footer -->
		<div id="push"></div>
		</div>
		<!-- ./wrap -->
	
	    <div id="footer">
	      <div class="container">
	      	<div class="row">
	      		<div class="col-md-4">
                    <h4>{{ Lang::get('site.about_us') }}</h4>
                    <ul class="list-unstyled">
                        <li>Volunteers</li>
                        <li>Organisation</li>
                        <li>Contact</li>
                    </ul>
	        	</div>
	        	<div class="col-md-4">
                    <h4>{{ Lang::get('site.service_facilities') }}</h4>
                    <ul class="list-unstyled">
                        <li>Funeral service</li>
                        <li>Marriage</li>
                        <li>Lessons</li>
                        <li>Visits &amp; Tours</li>
                    </ul>
	        	</div>
                <div class="col-md-4">
                    <h4>{{ Lang::get('site.something') }}</h4>
                    <ul class="list-unstyled">
                        <li>Something</li>
                        <li>Something</li>
                        <li>Something</li>
                        <li>Something</li>
                    </ul>
                </div>
	        </div>
	        <a href="#" class="back-to-top">Back to Top &hearts;</a>
	      </div>
	      
	    </div>

		<!-- Javascripts
		================================================== -->
        {{ Basset::show('public.js') }}
	</body>
</html>
