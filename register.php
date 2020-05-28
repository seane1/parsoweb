<?php 
include 'header.php';
?>
<title>Join</title>
</head>
<body>
<?php
include 'menu.php';
?>
<div class="main">
<?php
$servername = "localhost";
$username = "parso1";
$password = "Pasm2890";
$dbname = "userssjp";

$conn = new mysqli($servername, $username, $password, $dbname);
$dbname = "users";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$sql = "SELECT * FROM ". $dbname ." WHERE Email = '" . $_REQUEST['email'] . "'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if(!empty($row["Email"])){
		echo "<p>Account already exists</p>";
	}
	if($_REQUEST['name'] == ""){
		echo "<p>Enter your name</p>";
	}
	if($_REQUEST['email'] == ""){
		echo "<p>Enter your email</p>";
	}
	if($_REQUEST['password'] == ""){
		echo "<p>Enter your password</p>";
	}
	if($_REQUEST['name'] != "" && $_REQUEST['email'] != "" && $_REQUEST['password'] != "" && empty($row["Email"])){
		$sql = "INSERT INTO users (Email, Password, Name) VALUES ('" . $_REQUEST['email'] . "','" . $_REQUEST['password'] . "','" . $_REQUEST['name'] . "')";
		$conn->query($sql);
		echo "<p>Account created</p>";
	}
}
?>
<?php
include 'footer.php';
?>