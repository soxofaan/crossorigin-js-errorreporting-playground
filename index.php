<?php

// Current domain+path
$currentDomain = 'http://' . $_SERVER['SERVER_NAME'];
$currentPath = dirname($_SERVER['PHP_SELF']) . '/';

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

	<form action="app.php" method="get">
		<div>
			<input type="checkbox" name="withCrossOriginAttribute" value="true" id="withCrossOriginAttribute"/>
			<label for="withCrossOriginAttribute">
				<code>&lt;script&gt;</code> with <code>crossorigin="anonymous"</code>
			</label>
		</div>
		<div>
			<input type="checkbox" name="withCorsHeader" value="true" id="withCorsHeader"/>
			<label for="withCorsHeader">
				serve JavaScript module with CORS header (<code>'Access-Control-Allow-Origin: *'</code>).
			</label>
		</div>
		<div>
			Serve JavaScript module from:<br />
			<input type="text" name="jsServeDomain" value="<?php echo $currentDomain; ?>" id="jsServeDomain" size="20" />
			<input type="text" name="jsServePath" value="<?php echo $currentPath; ?>" id="jsServePath" size="80" />
		</div>
		<div>
			<input type="submit" />
		</div>
	</form>




</body>
</html>

