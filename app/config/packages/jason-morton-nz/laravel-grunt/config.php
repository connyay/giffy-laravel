<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Assets Folder Base Path
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom path to your assets
	| directory. We've set a sensible default, but feel free to update it.
	|
	*/
	'assets_path' => 'app/assets',

	/*
	|--------------------------------------------------------------------------
	| Published Assets Folder Path
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom path to your completed compiled,
	| minified and linted assets to be published to directory. We've set a 
	| sensible default, but feel free to update it.
	|
	*/
	'publish_path' => 'public/assets',

	/*
	|--------------------------------------------------------------------------
	| The CSS Path
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom path to your CSS
	| directory. We've set a sensible default, but feel free to update it.
	|
	*/
	'css_path' => 'app/assets/css',

	/*
	|--------------------------------------------------------------------------
	| The CSS File Order
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom order in which
	| CSS files will be concatenated, compiled and minified.
	| We've set a sensible default, but feel free to update it.
	|
	*/
	'css_files' => array(
		'app/assets/css/less.css'
	),

	/*
	|--------------------------------------------------------------------------
	| The JavaScript Path
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom path to your JavaScript
	| directory. We've set a sensible default, but feel free to update it.
	|
	*/
	'js_path' => 'app/assets/js',

	/*
	|--------------------------------------------------------------------------
	| The JavaScript File Order
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom order in which
	| JavaScript files will be concatenated, compiled and minified.
	| We've set a sensible default, but feel free to update it.
	|
	*/
	'js_files' => array(
		'app/assets/js/bootstrap.js',
		'app/assets/js/restfulizer.js',
		'app/assets/js/bootstrap-tagsinput.js',
	),

	/*
	|--------------------------------------------------------------------------
	| The LESS Path
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom path to your LESS
	| directory. We've set a sensible default, but feel free to update it.
	|
	*/
	'less_path' => 'app/assets/less',

	/*
	|--------------------------------------------------------------------------
	| The Main LESS file
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom path to your main LESS
	| file, which should include all imports to other LESS files.
	| We've set a sensible default, but feel free to update it.
	|
	| Note: you LESS will be compiled into a file named "less.css" in the
	| specified "css_path" above. So be sure to add it into your "css_files" array
	*/
	'less_file' => 'app/assets/less/master.less',

	/*
	|--------------------------------------------------------------------------
	| Bower Dependencies (vendor) Folder Path
	|--------------------------------------------------------------------------
	|
	| This is where you can specify a custom path for you bower dependencies to
	| reside in. We've set a sensible default, but feel free to update it.
	|
	*/
	"vendor_path" => "assets/vendor",

	/*
	|--------------------------------------------------------------------------
	| Bower Dependencies
	|--------------------------------------------------------------------------
	|
	| This is where you can specify your bower dependencies. We've set a 
	| sensible default, but feel free to update it.
	| 
	| **Note**: Please use key/value pair to represent dependency & version. Use 
	| the word "null" if you require the latest version, or don't know a version
	| number
	|
	*/
	"bower_dependencies" => array(
		"jquery"    => "~1.10.2",
		"bootstrap" => "~3"
	),

);
