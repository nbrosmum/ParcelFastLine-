<?php
    $host = 'localhost';//127.0.0.1';//localhost
    $username = 'root';
    $password = '';
    $database = 'parcelfastline';

    $connection = mysqli_connect($host,$username,$password,$database);

    if ($connection === false){
        die('Error in the connection'.mysqli_connect_error());
    }