<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>HomePage</title>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
	</head>
	<body>
		<nav>
			<div class="nav-wrapper #01579b light-blue darken-4">
				<div class="container">
					<a href="#" class="brand-logo">Logo</a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="#">item 1</a></li>
						<li><a href="#">item 2</a></li>
						<li><a href="#">item 3</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<h1>Dashboard</h1>
			<ul class="collection with-header">
				<li class="collection-header"><h4>Your App</h4></li>
				@foreach($Parse as $key)
				<li class="collection-item"><div>{{$key->tablename}}<a href="{{URL::to('/')}}/{{str_singular(lcfirst($key->tablename))}}" class="secondary-content"><i class="material-icons">send</i></a></div></li>
				@endforeach
			</ul>
		</div>
		<footer class="page-footer #01579b light-blue darken-4">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">Footer Content</h5>
						<p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
					</div>
					<div class="col l4 offset-l2 s12">
						<h5 class="white-text">Links</h5>
						<ul>
							<li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					© {{date('Y')}} Copyright Text
					<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
				</div>
			</div>
		</footer>
	</body>
	<!-- Compiled and minified JavaScript -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</html>
