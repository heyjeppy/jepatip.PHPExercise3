<?php 

$server = "localhost";
$username = "root";
$password = "";

$database = "todo_list";

$host = mysqli_connect("$server","$username","$password","$database");

if (!$host) {
    echo "Connection failed!";
}