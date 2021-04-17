<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "dumb_7ds";
session_start();
try {
	$pdo = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);
} catch (Exception $e) {
	echo $e->getMessage();
}
?>