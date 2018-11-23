<?php
$databaseHost = 'localhost';
$databaseName = 'jari_13086(1)';
$databaseUsername = 'jari';
$databasePassword = 'neymar@11';
 
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>
