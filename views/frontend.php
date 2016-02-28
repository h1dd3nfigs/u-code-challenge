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

			.tabs-menu {
			    height: 30px;
			    float: left;
			    clear: both;
			}

			.tabs-menu li {
			    height: 30px;
			    line-height: 30px;
			    float: left;
			    margin-right: 10px;
			    background-color: #ccc;
			    border-top: 1px solid #d4d4d1;
			    border-right: 1px solid #d4d4d1;
			    border-left: 1px solid #d4d4d1;
			}

			.tabs-menu li.current {
			    position: relative;
			    background-color: #fff;
			    border-bottom: 1px solid #fff;
			    z-index: 5;
			}

			.tabs-menu li a {
			    padding: 10px;
			    text-transform: uppercase;
			    color: #fff;
			    text-decoration: none; 
			}

			.tabs-menu .current a {
			    color: #2e7da3;
			}

			.tab {
			    border: 1px solid #d4d4d1;
			    background-color: #fff;
			    float: left;
			    margin-bottom: 20px;
			    width: auto;
			}

			.tab-content {
			    width: 660px;
			    padding: 20px;
			    display: none;
			}

			#tab-1 {
			 /*display: block;   */
			}
			ul{
				list-style: none
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
		
			<?php /*
			<div id="tabs-container">
				<ul class="tabs-menu">
			        <li class="current"><a href="#tab-1">Tab 1</a></li>
			        <li><a href="#tab-2">Tab 2</a></li>
			        <li><a href="#tab-3">Tab 3</a></li>
			        <li><a href="#tab-4">Tab 4</a></li>
			    </ul>
			    <div class="tab">
			        <div id="tab-1" class="tab-content">
			            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sit amet purus urna. Proin dictum fringilla enim, sit amet suscipit dolor dictum in. Maecenas porttitor, est et malesuada congue, ligula elit fermentum massa, sit amet porta odio est at velit. Sed nec turpis neque. Fusce at mi felis, sed interdum tortor. Nullam pretium, est at congue mattis, nibh eros pharetra lectus, nec posuere libero dui consectetur arcu. Quisque convallis facilisis fermentum. Nam tincidunt, diam nec dictum mattis, nunc dolor ultrices ipsum, in mattis justo turpis nec ligula. Curabitur a ante mauris. Integer placerat imperdiet diam, facilisis pretium elit mollis pretium. Sed lobortis, eros non egestas suscipit, dui dui euismod enim, ac ultricies arcu risus at tellus. Donec imperdiet congue ligula, quis vulputate mauris ultrices non. Aliquam rhoncus, arcu a bibendum congue, augue risus tincidunt massa, vel vehicula diam dolor eget felis.</p>
			        </div>
			        <div id="tab-2" class="tab-content">
		            <p>Donec semper dictum sem, quis pretium sem malesuada non. Proin venenatis orci vel nisl porta sollicitudin. Pellentesque sit amet massa et orci malesuada facilisis vel vel lectus. Etiam tristique volutpat auctor. Morbi nec massa eget sem ultricies fermentum id ut ligula. Praesent aliquet adipiscing dictum. Suspendisse dignissim dui tortor. Integer faucibus interdum justo, mattis commodo elit tempor id. Quisque ut orci orci, sit amet mattis nulla. Suspendisse quam diam, feugiat at ullamcorper eget, sagittis sed eros. Proin tortor tellus, pulvinar at imperdiet in, egestas sed nisl. Aenean tempor neque ut felis dignissim ac congue felis viverra. </p>
		        
		        </div>
		        <div id="tab-3" class="tab-content">
		            <p>Duis egestas fermentum ipsum et commodo. Proin bibendum consectetur elit, hendrerit porta mi dictum eu. Vestibulum adipiscing euismod laoreet. Vivamus lobortis tortor a odio consectetur pulvinar. Proin blandit ornare eros dictum fermentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur laoreet, ante aliquet molestie laoreet, lectus odio fringilla purus, id porttitor erat velit vitae mi. Nullam posuere nunc ut justo sollicitudin interdum. Donec suscipit eros nec leo condimentum fermentum. Nunc quis libero massa. Integer tempus laoreet lectus id interdum. Integer facilisis egestas dui at convallis. Praesent elementum nisl et erat iaculis a blandit ligula mollis. Vestibulum vitae risus dui, nec sagittis arcu. Nullam tortor enim, placerat quis eleifend in, viverra ac lacus. Ut aliquam sapien ut metus hendrerit auctor dapibus justo porta. </p>
		        </div>
		        <div id="tab-4" class="tab-content">
		            <p>Proin sollicitudin tincidunt q egestas fermentum ipsum et commodo. Proin bibendum consectetur elit, hendrerit porta mi dictum eu. Vestibulum adipiscing euismod laoreet. Vivamus lobortis tortor a odio consectetur pulvinar. Proin blandit ornare eros dictum fermentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur laoreet, ante aliquet molestie laoreet, lectus odio fringilla purus, id porttitor erat velit vitae mi. Nullam posuere nunc ut justo sollicitudin interdum. Donec suscipit eros nec leo condimentum fermentum. Nunc quis libero massa. Integer tempus laoreet lectus id interdum. Integer facilisis egestas dui at convallis. Praesent elementum nisl et erat iaculis a blandit ligula mollis. Vestibulum vitae risus dui, nec sagittis arcu. Nullam tortor enim, placerat quis eleifend in, viverra ac lacus. Ut aliquam sapien ut metus hendrerit auctor dapibus justo porta</p>
				</div>
			</div> 
			*/?>
		</div>
		<script>

			// $(document).ready(function() {
			//     $(".tabs-menu a").click(function(event) {
			//         event.preventDefault();
			//         $(this).parent().addClass("current");
			//         $(this).parent().siblings().removeClass("current");
			//         var tab = $(this).attr("href");
			//         $(".tab-content").not(tab).css("display", "none");
			//         $(tab).fadeIn().css("display", "inline");
			//     });
			// });


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

