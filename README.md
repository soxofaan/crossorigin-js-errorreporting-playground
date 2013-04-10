
Simple test setup to test cross origin error reporting
======================================================

This is a simple project to test and play with JavaScript
error reporting from window.onerror handler in a 
cross origin (e.g. CDN) JavaScript serving context.

Browsers like Firefox, Chrome, Opera and Safari by default obfuscate
the error info for errors that happen in a script that is
served from another domain than the loaded page, for security reasons.
Instead of a descriptive error message, you get an undescriptive "Script error.".
For more info see the related reading below.

To circumvent this default behavior there, browsers are starting to implement
cross origin measures, as described at http://blog.errorception.com/2012/12/catching-cross-domain-js-errors.html


Set up
------

* Put the code somewhere on a PHP enabled web server (e.g. your localhost)
* Make sure the web server is reachable from different host names (e.g. add entries in /etc/hosts)
* Surf to the index.php script and play with the settings (e.g. you need the alternative host names to do the cross origin stuff).
* The "app" will trigger two errors, the first one in a cross origin context (if an alternative host name is used), and a simple "local" one.


Related reading
---------------

* http://blog.errorception.com/2012/04/script-error-on-line-0.html
* http://blog.errorception.com/2012/12/catching-cross-domain-js-errors.html
* Firefox issue tracker: https://bugzilla.mozilla.org/show_bug.cgi?id=696301
* WebKit issue tracker: https://bugs.webkit.org/show_bug.cgi?id=81438
* Chrome/Chromium issue tracker: https://code.google.com/p/chromium/issues/detail?id=159566
