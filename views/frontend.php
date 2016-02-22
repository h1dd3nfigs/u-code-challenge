<!-- Frontend UI form -->
<style>
	.param-row{
		margin-top: 15px;
	    width: 100%;
	}

	.row {
		margin-top: 15px;
	    width: 100%;
	} 
	.submit-fields {
		margin-top: 15px;
	}
</style>

<div>
	<form action="<?php echo __FILE__ ; ?>" method="post">
		<div class="row">
			<input type="text" name="api_endpoint" placeholder="API Endpoint">

			<select name="request_method">
			  <option value="GET">GET</option>
			  <option value="POST">POST</option>
			  <option value="PUT">PUT</option>
			  <option value="DELETE">DELETE</option>
			</select>
		</div>
		<div class="param-row row" id="param-row-1">
			<input type="text" name="key1" placeholder="URL Parmameter Key">
			<input type="text" name="value1" placeholder="Value">
		</div>
		<div class="row">
			<input type="submit" value="Send">
			<input type="button" value="Reset">
		</div>
	</form>
</div>



<!-- Response Body -->
<div>
	<p>Body</p>
	<div class="api_response">
		<?php echo htmlentities('{API JSON RESPONSE GOES HERE}', ENT_QUOTES, 'UTF-8');?>
	</div>
</div>