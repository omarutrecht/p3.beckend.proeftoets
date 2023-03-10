<?php
$db_host = 'localhost';
$db_name = 'atractiepark';
$db_user = 'root';
$db_password = '';
$dsn = "mysql:host=$db_host;dbname=$db_name";
$db = new PDO($dsn, $db_user, $db_password);