<?php
define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'));

date_default_timezone_set('UTC');

// Error reporting level (E_ALL recommended for development)
error_reporting(E_ALL);

// Character encoding
if (function_exists('mb_internal_encoding') === true) {
	mb_internal_encoding('UTF-8');
}

// Default Locale Change as needed or feel free to remove.
if (function_exists('setlocale') === true) {
	setlocale(LC_ALL, 'en_US.UTF-8');
}

// Get the $app var to use below
if (empty($app) === true) {
	$app = Flight::app();
}

// This autoloads your code in the app directory so you don't have to require_once everything
// You'll need to namespace your classes with "app\folder\" to include them properly
$app->path(__DIR__ . $ds . '..' . $ds . '..');

// Core config variables
$app->set('flight.base_url', '/', );           // Base URL for your app. Change if app is in a subdirectory (e.g., '/myapp/')
$app->set('flight.case_sensitive', false);    // Set true for case sensitive routes. Default: false
$app->set('flight.log_errors', true);         // Log errors to file. Recommended: true in production
$app->set('flight.handle_errors', false);     // Let Tracy handle errors if false. Set true to use Flight's error handler
$app->set('flight.views.path', __DIR__ . $ds . '..' . $ds . 'views'); // Path to views/templates
$app->set('flight.views.extension', '.php');  // View file extension (e.g., '.php', '.latte')
$app->set('flight.content_length', false);    // Send content length header. Usually false unless required by proxy

// Generate a CSP nonce for each request and store in $app
$nonce = base64_encode(random_bytes(16));
$app->set('csp_nonce', $nonce);

// Utilisez une politique permissive mais sécurisée pour les CDNs
$csp_policy = "default-src 'self'; " .
	"script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; " .
	"style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; " .
	"font-src 'self' https://cdnjs.cloudflare.com; " .
	"img-src 'self' data:; " .
	"object-src 'none';";

// Dans config.php, après la définition de $csp_policy
Flight::before('start', function() use ($csp_policy) {
    Flight::response()->header("Content-Security-Policy", $csp_policy);
});

$app->response()->header("Content-Security-Policy", $csp_policy);

return [
	/**************************************
	 *         Database Settings          *
	 **************************************/
	'database' => [
		'host' => '127.0.0.1',      // Database host (e.g., 'localhost', 'db.example.com')
		'dbname' => 'Takalo_takalo',   // Database name (e.g., 'flightphp')
		'user' => 'root',  // Database user (e.g., 'root')
		'password' => '',  // Database password (never commit real passwords)

		// SQLite Example:
		// 'file_path' => __DIR__ . $ds . '..' . $ds . 'database.sqlite', // Path to SQLite file
	],

];
