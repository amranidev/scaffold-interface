<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Vue Test</title>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
	</head>
	<body>
		<div id = "el1" class = 'container'>
			<br><br>
			<button v-if = '!show' class = 'btn blue' @click = 'show = ! show'>Create Table</button>
			<div class="row">
				<my-actions v-if = 'show' :list = "data"></my-actions>
			</div>
		</div>
	</body>
	<template id = "my-actions">
	<div class="col s4">
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
					<td>@{{el}}</td>
					<td>
						<div class = 'input-field'>
							<input id = 'atr" + i + "' name = 'atr" + i + "' type='text'>
							<label for = 'atr" + i + "'>Attribute</label>
						</div>
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
				<button class = 'btn blue' @click = "rows += 1"><i class = 'material-icons left'>add</i>new</button>
				<a href = '#' class = 'btn red' @click = 'rows -= 1'><i class = 'material-icons left'>delete</i>remove</a>
				<a href = '#' @click = 'submit = !submit' class = 'btn orange'><i class = 'material-icons left'>layers</i>ready</a>
			</div>
		</div>
	</div>
	</template>
	<script type="text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src = "http://cdn.jsdelivr.net/vue/1.0.16/vue.js"></script>
	<script type="text/javascript" src = "/js/main.js"></script>
</html>
