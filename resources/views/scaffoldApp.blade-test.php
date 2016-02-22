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
			<button class = 'btn blue' @click = 'show = ! show'>Create Table</button>
			<div class="row">
				<div class="col s4">
					<my-form :list = "data" v-show = 'show'></my-form>
				</div>
				<div class="col s6">
					<my-actions v-show = 'show'></my-actions>
				</div>
			</div>
		</div>
		<template id = "myform">
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
				<tr v-for = "el in list">
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
				<button  type = 'submit' class = 'val btn green col s12'>
				<i class = 'material-icons left'>done</i>
				Done
				</button>
			</div>
		</form>
		</template>
		<template id= "my-actions">
		<div class='card-panel #fafafa grey lighten-5'>
			<h4 class = 'center'>Rows</h4>
			<div class = 'row center actionRow'>
				<button class = 'btn blue' v-on:click = "add"><i class = 'material-icons left'>add</i>new</button>
				<a href = '#' class = 'btn red' v-on:click = 'remove'><i class = 'material-icons left'>delete</i>remove</a>
				<a href = '#' class = 'btn orange'><i class = 'material-icons left'>layers</i>ready</a>
			</div>
		</div>
		</template>
</body>
<script type="text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src = "http://cdn.jsdelivr.net/vue/1.0.16/vue.js"></script>
<script type="text/javascript">
		Vue.component('my-form', {
		props: ['list'],
		template: '#myform',
		});
		Vue.component('my-actions', {
		template: "#my-actions",
		methods: {
		add: function() {
		$('.ta tr:last').after(c.template)
		},
		remove: function() {
		$('.ta tr:last').remove();
		}
		}
		});
		new Vue({
		el: 'body',
		data: {
		message: 'TotO',
		message2: '',
		show: false,
		data:['tata','gogo','bobo']
		}
		})
</script>
</html>
