<?php
// we connect to example.com and port 3307
$conn = mysql_connect('localhost', 'root', '', 'tratu') or die('Could not connect to mysql server.');
mysql_select_db("tratu", $conn) or die("Could not select examples");
?>
