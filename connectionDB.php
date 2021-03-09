<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'myaccess';

$mysql = new mysqli($host, $user, $password, $database);
if (mysqli_connect_errno()) {
    echo 'Ошибка соединения: ' . mysqli_connect_error();
}