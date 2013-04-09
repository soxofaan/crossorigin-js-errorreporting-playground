<?php

// Get run settings from GET params. //////////////////////////////////

// Whether to use the crossorigin attribute in the <script> element
$withCrossOriginAttribute = isset($_GET['withCrossOriginAttribute']);

// Whether to serve the JS file with CORS headers
$withCorsHeader = isset($_GET['withCorsHeader']);

// Domain to serve the JS file from
$jsServeDomain = isset($_GET['jsServeDomain']) ? $_GET['jsServeDomain'] : '';
$jsServePath = isset($_GET['jsServePath']) ? $_GET['jsServePath'] : '';

// Url and attributes of external main.js script
$scriptUrl = $jsServeDomain . $jsServePath . 'main.js.server.php';
if ($withCorsHeader) {
	$scriptUrl .= '?withCorsHeader=true';
}
$scriptAttributes = $withCrossOriginAttribute ? 'crossorigin="anonymous"' : '';


?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	#log .info { background-color: #EEF; }
	#log .error {background-color: #FA8; }
	</style>
</head>
<body>

	<h1>Hi there, let's test that crossorigin stuff</h1>

	<h2>Settings</h2>
	<ul>
		<li>withCrossOriginAttribute: <?php var_export($withCrossOriginAttribute); ?></li>
		<li>withCorsHeader: <?php var_export($withCorsHeader); ?></li>
		<li>scriptUrl: <code><?php echo $scriptUrl; ?></code></li>
	</ul>


	<h2>Here is what we do</h1>
	<ol id="log"></ol>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<script>
		/// General log function
 		function log(type, message) {
			$('#log').append($('<li class="' + type + '">' + message + '</li>'));
		}

		/// Set up window.onerror handler
		window.onerror = function(message, url, line) {
			log('error', 'Catched error: <blockquote>' + message + '</blockquote> (at url "<code>' + url + '</code>", line ' + line +')');
			// Let the error propagate.
			return false;
		};
	</script>

	<?php echo "<script src=\"$scriptUrl\" $scriptAttributes></script>"; ?>

	<script>
	function do_something_bad_from_inline()
	{
		var x = 456;
		log('info', 'Next up: doing something bad from inline.');
		x.len();
	}
	</script>

	<script>
		log('info', 'Starting main()');
		main();
	</script>

	<script>
		log('info', 'Starting do_something_bad_from_inline()');
		do_something_bad_from_inline();
	</script>


</body>
</html>

