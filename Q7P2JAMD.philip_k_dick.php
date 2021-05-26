<?php 
include 'header.php';
?>
<title>Philip K. Dick</title>
</head>
<body>
<?php
include 'menu.php';
?>
<div class="results">
<h3>Philip K. Dick</h3>
</div>
<div class="main">
<?php
include 'connection.php';

$sql = "SELECT * FROM " . $dbname . " WHERE " . "Author LIKE '%Dick%'";
$result = $conn->query($sql);

include 'displayresults.php';
$conn->close();
?>

<?php
include 'footer.php';
?>