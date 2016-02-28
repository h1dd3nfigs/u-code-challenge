<!DOCTYPE html>
<html>
	<head>
		<title>Ubersmith API</title>
		<style>
			.container{
				width:100%;
			}

			.row {
				margin-top: 15px;
			    width: 60%;
			} 

			.btn-left {
				/*float:left;*/
			    background-color: blue;
			    color: white;
	    	}

			.btn-right {
				/*float:right;*/
			    background-color: red;
			    color: white;
			}
			input{
			    border-top: none;
			    border-left: none;
			    border-right: none;
			    border-bottom-style: solid;
			    border-bottom-color: grey;
			    border-bottom-width: thin;
		        margin-right: 1%;
			    margin-left: 1%;
			    width:40%;
			}
			div.example, .uno{
				display:none;
			}

			.close{
				width: 20px;
				height: 20px;
				border-radius: 20px;
				background-color: black;
				color: white;
				text-align: center;
				vertical-align: center;
			}
		</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	</head>
	<body>
	<!-- Frontend UI form -->
	<div class="container">
		<div class="row">
			<input type="text" name="api_endpoint" id="api_endpoint" placeholder="API Endpoint" value="/api/values">

			<select name="request_method" id="request_method">
			  <option value="POST">POST</option>
			  <option value="GET">GET</option>
			  <option value="PUT">PUT</option>
			  <option value="DELETE">DELETE</option>
			</select>
		</div>
		<div class="row uno">
			<input type="text" name="param1key" id="param1key" placeholder="URL Parmameter Key">
			<input type="text" name="param1value" id="param1value" placeholder="Value">
			<button class="close" type="button" onClick="hideRow1()" >x</button>
		</div>
		<div class="row example">
			<input type="text" name="param2key" id="param2key" placeholder="URL Parmameter Key">
			<input type="text" name="param2value" id="param2value" placeholder="Value">
			<button class="close" type="button" onClick="hideRow2()" >x</button>
		</div>
		<div class="row">
			<button class="btn-left" type="submit" onClick="loadDoc()">Send</button>
			<button class="btn-right" type="submit" onClick="reset()">Reset</button>
		</div>
		<div class="row">
			<p>Body</p>
			<p><span id="api_response"></span></p>
		</div>
<!-- 		<div id="checkoutbutton">
			<p><a href="URL.htm">Checkout</a></p>
		</div> -->
	</div>
		<script>

			  $('#api_endpoint').focus(function() {
				    $('div.uno').css('display','block');
			   });

			  $('#param1key').focus(function() {
				    $('div.example').css('display','block');
			   });

			  $('#param1value').focus(function() {
				    $('div.example').css('display','block');
			  });

			  $('#param2key').focus(function() {
				    $('div.example').css('display','block');
			   });

			  $('#param2value').focus(function() {
				    $('div.example').css('display','block');
			  });


			function hideRow2(){
				$("#param2key").val("");
				$("#param2value").val("");
				$('#param2key').parent().fadeOut('medium');
			}


			function hideRow1(){
				$("#param1key").val("");
				$("#param1value").val("");
				$('#param1key').parent().fadeOut('medium');
			}

			function loadDoc(){
				// How do I sanitize inputs using JS, similar to filter_var() in php??
				var request_method = document.getElementById('request_method').value;
				var api_endpoint   = document.getElementById('api_endpoint').value;
				// $('div.whatever').text($('input.whatever').val());
				// text() method supposedly encodes < and > 
				var param1key 	   = document.getElementById('param1key').value;
				var param1value    = document.getElementById('param1value').value;
				var param2key 	   = document.getElementById('param2key').value;
				var param2value    = document.getElementById('param2value').value;
				var xhttp = new XMLHttpRequest();

				if (api_endpoint.length == 0) { 
				    document.getElementById("api_response").innerHTML = "";
				    return;
				}

				xhttp.onreadystatechange = function(){
					if (xhttp.readyState == 4 ){//&& xhttp.status == 200){
						document.getElementById("api_response").innerHTML = xhttp.responseText;
					}
				};

				switch (request_method) {
				    case "GET":
					    // get a list of all key-value pairs
				    	if(param1value == ""){ 
							xhttp.open(request_method, api_endpoint, true);
							xhttp.send();
							break;

						// get a single key-value pair
				    	} else { 
							xhttp.open(request_method, api_endpoint+"?"+param1key+"="+param1value, true);
							xhttp.send();
					        break;
				        }
				    case "PUT":
        				xhttp.open(request_method, api_endpoint+"?"+param1key+"="+param1value, true);
						xhttp.send(param2key+"="+param2value);
				        break;
				    case "POST":
        				xhttp.open(request_method, api_endpoint, true);
						xhttp.send(param1key+"="+param1value+"&"+param2key+"="+param2value);
				        break;
				    case "DELETE":
						xhttp.open(request_method, api_endpoint+"?"+param1key+"="+param1value, true);
						xhttp.send();
				        break;
				}
				
				// xhttp.open(request_method, api_endpoint, true);
				// xhttp.send("key="+key+"&value="+value);
			}

			function reset(){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if (xhttp.readyState == 4 && xhttp.status == 200){
						document.getElementById('api_endpoint').value = '/api/values';
						document.getElementById("api_response").innerHTML = '';
						document.getElementById('param1key').value = '';
						document.getElementById('param1value').value = '';
						document.getElementById('param2key').value = '';
						document.getElementById('param2value').value = '';
					}
				};
				xhttp.open("GET", "");
				xhttp.send();
			}

		</script>
	</body>
</html>

