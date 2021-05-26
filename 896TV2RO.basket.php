<?php 
include 'header.php';
include 'connection.php';
?>
<title>Basket</title>
</head>
<body>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!isset($_SESSION["Order"])){
		$_SESSION["Order"] = array();
	}
	if(isset($_POST["book"])){
		array_push($_SESSION["Order"],$_POST["book"]);
		$_SESSION["Total"] += $_POST["price"];
	}
	if(isset($_POST["removebook"])){
			unset($_SESSION["Order"][$_POST["removebook"]]);
			$_SESSION["Order"] = array_values($_SESSION["Order"]);
			$_SESSION["Total"] -= $_POST["removeprice"];
			if(empty($_SESSION["Order"])){
				unset($_SESSION["Order"]);
				unset($_SESSION["Total"]);
			}
	}
}
?>
<?php
include 'menu.php';
?>
<div class="results">
<h3>Your Basket</h3>
</div>
<div class="main">
<?php
	if(isset($_SESSION["Order"])){
		$len = count($_SESSION["Order"]);
		for($i = 0; $i < $len; $i++){
			$sql = "SELECT * FROM ". $dbname ." WHERE ID = '" . $_SESSION["Order"][$i] ."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
						echo "<div class = 'book'><a href='" . $row["Product_Page"] . "'><img src = '/bookimages/" . $row["Cover"]. "'></img></a>" . "<a class='titlelink' href='" . $row["Product_Page"] . "'>" . $row["Title"] . "</a>" . "<a class='authorlink' href='" . $row["Author_Page"] . "'>" . $row["Author"] . "</a>" . "<a href='" . $row["Genre_Page"]. "'>" . $row["Genre"] . "</a><p>$". $row["Price"] ."</p><form method='post' action='basket.php'><input name='removebook' type='hidden' value='" . $i . "'><input name='removeprice' type='hidden' value='" . $row["Price"] . "'><button type='submit' class='bookbutton'>Remove</button></form></div>";
				}
			}
		}
	}
	else{ 
		echo "<p>Your basket is empty</p>";
	}
?>
<?php
include 'footer.php';
?>
