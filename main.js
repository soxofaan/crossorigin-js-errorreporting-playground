

function do_something_bad_from_module() {
	var x = 123;
	log('info', 'Next up: doing something bad from main module.');
	x.len();
}

function main() {

	log('info', 'Doing some main stuff here.');

	do_something_bad_from_module();

	log('info', 'Hey, are we still here?');
}

