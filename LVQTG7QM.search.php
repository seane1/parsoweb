<?php 
include 'header.php';
?>
<?php
echo "<title>Results for " . $_GET["search"] . " | Bookstore</title>";
?>
</head>
<body>
<?php
include 'menu.php';
?>
<?php
if ($_GET["search"] != ""){
	echo "
		<div class='results'>
		<h3>Search results for " . $_GET["search"] . "</h3>
		</div>
	";
	
}
?>
<div class="main">
<?php
include 'connection.php';

$sql = "SELECT * FROM " . $dbname . " WHERE " . "Author LIKE '%" . $_GET["search"] . "%' OR Title LIKE '%". $_GET["search"] . "%' OR Genre LIKE '%" . $_GET["search"] . "%'";
$result = $conn->query($sql);
if ($_GET["search"] == ""){
		echo "<p>Enter search information to begin</p>";
	
}
else{
	include 'displayresults.php';
}
$conn->close();
?>
<?php
include 'footer.php';
?>
