<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>@yield('title')</title>
	</head>
	<body>
		@yield('content')
		<div id="modal1" class="modal">
			<div class = "row AjaxisModal">
			</div>
		</div>
		<script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
		<script>  var baseURL = "{{ URL::to('/') }}"</script>
		<script src = "{{URL::asset('js/AjaxisMaterialize.js')}}"></script>
		<script src = "{{URL::asset('js/scaffold-interface-js/customA.js')}}"></script>
		<script>
		$('select').material_select();
		</script>
	</body>
</html>
