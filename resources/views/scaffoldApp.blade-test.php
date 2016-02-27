<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Vue Test</title>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
		<link rel="stylesheet" href="{{asset('css/main.css')}}">
	</head>
	<body>
		<div id = "el1" class = 'container'>
			<h2 class = "thin">The <i>Scaffold Interface</i> for laravel</h2>
			<div style = 'margin-top: 2cm;'></div>
			<button v-if = '!show' class = 'btn blue' @click = 'show = ! show'>Create Table</button>
			<div class="row" v-if = 'show'>
				<div class="col s6">
					<p class = 'red-text' v-if = 'error'>Cannot Remove More</p>
					<form id = 'form' method = 'post' action = '{{URL::to("/")}}/scaffold/guipost/'>
						<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
						<table class = 'ta'>
							<tr>
								<td>
									<div class = 'input-field'>
										<input id = 'TableName' name='TableName' required='' aria-required='true' type='text'>
										<label for='TableName'>TableName</label>
									</div>
								</td>
							</tr>
							<tr v-for = "el in rows">
								<td>
									<div class="input-field col s12">
										<select class = 'browser-default' id = "opt@{{el}}" name = "opt@{{el}}" data-id = "@{{el}}">
											<option v-for = "element in select" value = "@{{element}}">@{{element}}</option>
											<label for = "opt@{{el}}">Select Type</label>
										</select>
									</div>
								</td>
								<td>
									<div class = 'input-field'>
										<input id = 'atr" + i + "' name = 'atr" + i + "' type='text'>
										<label for = 'atr" + i + "'>Attribute</label>
									</div>
								</td>
							</tr>
							<!-- One To Many Relationship-->
							<tr v-for = "el in OneToManyRows">
								<td>
									<div class="input-field col s12">
										<select @change = 'getAttr' class = 'browser-default' id = "tbl@{{el}}" name = "tbl@{{el}}" data-id = "@{{el}}">
											<option v-for = "element in OneToMany" value = "@{{element}}">@{{element}}</option>
											<label for = "tbl@{{el}}">Select Type</label>
										</select>
									</div>
								</td>
								<td>
									<select v-model = 'attributes' class = 'browser-default' id = "on@{{el}}" name = "on@{{el}}" data-id = "@{{el}}">
										<option v-for = "elementt in attributes" value = "@{{elementt}}">@{{elementt}}</option>
										<label for = "on@{{el}}">Select Type</label>
									</select>
								</td>
							</tr>
						</table>
						<div class 'row'>
							<button v-if = 'submit' type = 'submit' class = 'val btn green col s12'>
							<i class = 'material-icons left'>done</i>
							Done
							</button>
						</div>
					</form>
				</div>
				<div class="col s6">
					<div class='card-panel #fafafa grey lighten-5'>
						<h4 class = 'center'>Rows</h4>
						<div class = 'row center actionRow'>
							<a class = 'btn blue' v-if = '!submit' @click = "increment"><i class = 'material-icons left'>add</i>new</a>
							<a href = '#' v-if = '!submit' class = 'btn red' @click = 'decrement'><i class = 'material-icons left'>delete</i>remove</a>
							<a href = '#'v-if = '!submit' @click = 'submit = !submit' class = 'btn orange'><i class = 'material-icons left'>layers</i>ready</a>
							<a class = 'btn purple' v-if = 'submit' @click = 'submit = false'><i class = 'material-icons left'>arrow_back</i>back</a>
							<a href='#' v-if = 'submit' @click = 'addOneToMany' class = 'btn #0d47a1 blue darken-4'><i class = 'material-icons left'>device_hub</i>One To Many</a>
						</div>
					</div>
				</div>
			</div>
			<pre>
				@{{attributes}}
			</pre>
		</div>
	</body>
	<script type="text/javascript">
	var baseUrl = "{{URL::to('/')}}"
	var scaffoldList = {!! $scaffoldList !!}
	</script>
	<script type="text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
	<script type="text/javascript" src = "http://cdn.jsdelivr.net/vue/1.0.16/vue.js"></script>
	<script type="text/javascript" src = "/js/main.js"></script>
</html>
