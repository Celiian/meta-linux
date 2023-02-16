<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Content-Type");
header("content-type:application/json");

require_once  __DIR__ . '/ConfigDb.php';
require_once __DIR__ . '/helper/function.php';

//GIVE CONFIG FOR CONNECT TO  DB
$dsn = 'mysql:host=' . $config_db['host'] . ';dbname=' . $config_db['dbname'] . ';port=' . $config_db['port'] . '';

// TRY TO CONNECT WITH PDO
try {
	$db = new PDO($dsn, $config_db['user'], $config_db['pass']);
} catch (Exception $e) {
	// ELSE DIE() FOR CRASH WEBSITE WITH ERROR MSG
	die('Erreur MySQL, maintenance en cours.' . $e->getMessage());
}
