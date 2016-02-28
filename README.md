Instructions for CLI of API

Dependencies: Composer, PHPunit


Below are examples of how to send requests to the API through a Linux command line interface.

First start the built-in PHP webserver by running 

$  php -S localhost:8000 web/router.php

Then proceed to run one of the API calls by making the following curl commands


$ curl -X POST -d "key=solange&value=jay" localhost:8000/api/values -H "Cookie: PHPSESSID=5ec6cda6e88d667994435b92f8718a93;"

$ curl -X GET localhost:8000/api/values?key=solange -H "Cookie: PHPSESSID=5ec6cda6e88d667994435b92f8718a93;"

$ curl -X DELETE localhost:8000/api/values?key=solange -H "Cookie: PHPSESSID=5ec6cda6e88d667994435b92f8718a93;"


The frontend UI is not yet integrated with the backend API but when that integration is complete, you'll be able to start the webserver specifying views/frontend.php as the starting script and when the form is submitted, the script will programmatically run a curl command and pass the appropriate HTTP method, parameters and session ID to generate the correct response.