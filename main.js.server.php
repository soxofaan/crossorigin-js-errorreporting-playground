<?php

// Simple serving script so we can serve the JS with desired headers

// Whether to serve the JS file with CORS headers
$withCorsHeader = isset($_GET['withCorsHeader']);


// Send headers.
if ($withCorsHeader) {
	header('Access-Control-Allow-Origin: *');
}

header('Content-Type: text/javascript');

// Send data
echo file_get_contents('main.js');
