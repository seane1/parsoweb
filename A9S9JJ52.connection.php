<?php
$servername = "localhost";
$username = "parso1";
$password = "Pasm2890";
$dbname = "bookssjp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$dbname = "books";
?> 
