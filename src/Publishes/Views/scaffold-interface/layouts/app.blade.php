<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title')</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/css/skins/_all-skins.min.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<!-- Logo -->
				<a href="{{url('scaffold-dashboard')}}" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>S</b>IN</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>ScaffoldInterface</b></span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- Notification Navbar List-->
							<li class="dropdown notifications-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-bell-o"></i>
									<span class="label notification-label">new</span>
								</a>
								<ul class="dropdown-menu">
									<li class="header">Your notifications</li>
									<li>
										<!-- inner menu: contains the actual data -->
										<ul class="menu notification-menu">
										</ul>
									</li>
									<li class="footer"><a href="#">View all</a></li>
								</ul>
							</li>
							<!-- END notification navbar list-->
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="http://ahloman.net/wp-content/uploads/2013/06/user.jpg" class="user-image" alt="User Image">
									<span class="hidden-xs">{{Auth::user()->name}}</span>
								</a>
								<ul class="dropdown-menu">
									<!-- User image -->
									<li class="user-header">
										<img src="http://ahloman.net/wp-content/uploads/2013/06/user.jpg" class="img-circle" alt="User Image">
										<p>
											{{Auth::user()->name}}
										</p>
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-right">
											<a href="{{url('logout')}}" class="btn btn-default btn-flat"
												onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">Sign out</a>
											<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
											</form>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- search form -->
					<form action="#" method="get" class="sidebar-form">
						<div class="input-group">
							<input type="text" name="q" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
								<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
					<!-- /.search form -->
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="header">MAIN NAVIGATION</li>
						<li class="active treeview">
							<a href="{{url('scaffold-dashboard')}}">
								<i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
							</a>
						</li>
						<li class="header">ADMINISTRATOR</li>
						<li class="treeview"><a href="{{url('/scaffold-users')}}"><i class="fa fa-users"></i> <span>Users</span></a></li>
						<li class="treeview"><a href="{{url('/scaffold-roles')}}"><i class="fa fa-user-plus"></i> <span>Role</span></a></li>
						<li class="treeview"><a href="{{url('/scaffold-permissions')}}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
						<li class="header">Scaffold Interface</li>
						<li class="treeview"><a href="{{url('/scaffold')}}"><i class="fa fa-desktop"></i> <span>Scaffold Interface</span></a></li>
					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>
			<div class="content-wrapper">
				@yield('content')
			</div>
		</div>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class = 'AjaxisModal'>
			</div>
		</div>
		<!-- Compiled and minified JavaScript -->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/js/app.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/js/demo.js"></script>
		<script> var baseURL = "{{ URL::to('/') }}"</script>
		<script src = "{{URL::asset('js/AjaxisBootstrap.js') }}"></script>
		<script src = "{{URL::asset('js/scaffold-interface-js/customA.js') }}"></script>
		<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
		<script>
		// pusher log to console.
		Pusher.logToConsole = true;
		// here is pusher client side code.
		var pusher = new Pusher("{{env("PUSHER_APP_KEY")}}", {
		encrypted: true
		});
		var channel = pusher.subscribe('test-channel');
		channel.bind('test-event', function(data) {
		// display message coming from server on dashboard Notification Navbar List.
		$('.notification-label').addClass('label-warning');
		$('.notification-menu').append(
			'<li>\
<<<<<<< HEAD
							<a href="#">\
											<i class="fa fa-users text-aqua"></i> '+data.message+'\
							</a>\
=======
				<a href="#">\
					<i class="fa fa-users text-aqua"></i> '+data.message+'\
				</a>\
>>>>>>> 36e331d580b33e2ad155aae685046a239e096ca2
			</li>'
			);
		});
		</script>
	</body>
</html>
