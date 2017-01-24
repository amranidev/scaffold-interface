<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Graph</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.18.0/vis.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.18.0/vis.min.js"></script>
	<script>
		var nodes = null;
		var edges = null;
		var network = null;
		function draw() {
		    nodes = {!! $nodes !!};
			edges = {!! $edges !!};
		    var container = document.getElementById('mynetwork');
		    var data = {
		        nodes: nodes,
		        edges: edges
		    };
		    var options = {
		        nodes: {
		            borderWidth: 1,
		            size: 50,
		            color: {
		                border: '#222222',
		                background: '#2196F3'
		            },
		            font: {
		                color: 'white'
		            }
		        },
		        edges: {
		            color: '#D50000',
		            length: 300
		        }
		    };
		    network = new vis.Network(container, data, options);
		}
		</script>

	</script>

	<style>
		#mynetwork{
			height: 500px;
			border: .1px solid #2196F3;
			border-radius: 20px;
		}
	</style>
</head>
<body onload="draw()">
		<div class="container">
			<h1>Entities graph</h1>
			<div id="mynetwork"></div>
		</div>
</body>
</html>
