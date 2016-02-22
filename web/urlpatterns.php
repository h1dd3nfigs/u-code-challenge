<?php 

// Allowed URL patterns
 $url_patterns = array(

						'get'    =>array(
										'method'=> 'GET',
										'pattern'=>'/\/api\/values[?]key=[a-zA-Z0-9]+/',
										'params'=> array('key'),
										'body_params' => array()
										),
					 'create'    =>array(
										'method'=> 'POST',
										'pattern'=>'/\/api\/values$/',
										'params'=> array(),
										'body_params' => array('key','value')
										),						

						'getAll'   =>array(
										'method'=> 'GET',
										'pattern'=>'/\/api\/values$/',
										'params'=> array(),
										'body_params' => array()
										),
						'update' =>array(
										'method'=> 'PUT',
										'pattern'=>'/\/api\/values[?]key=[a-zA-Z0-9]+/',
										'params'=> array(),
										'body_params' => array('key')
										),						
						'delete' =>array(
										'method'=> 'DELETE',
										'pattern'=>'/\/api\/values[?]key=[a-zA-Z0-9]+/',
										'params'=> array('key'),
										'body_params' => array()
										),						
					);