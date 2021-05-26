<?php
$servername = "localhost";
$username = "parso1";
$password = "Pasm2890";
$dbname = "userssjp";

$conn = new mysqli($servername, $username, $password, $dbname);
$dbname = "users";
if($_SERVER["REQUEST_METHOD"] == "POST"){
		$sql = "SELECT * FROM ". $dbname ." WHERE Email = '" . $_REQUEST['email'] . "' AND Password = '" . $_REQUEST['password'] . "'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$_SESSION["Email"] = $row["Email"];
				$_SESSION["Name"] = $row["Name"];
			}
		}
		else{
			echo "<p>Incorrect email or password</p>";
		}
}

?>