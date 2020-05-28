<?php 
include 'header.php';
?>
<title>Fantasy</title>
</head>
<body>
<?php
include 'menu.php';
?>
<div class="results">
<h3>Fantasy books</h3>
</div>
<div class="main">
<?php
include 'connection.php';

$sql = "SELECT * FROM " . $dbname . " WHERE " . "Genre LIKE '%Fantasy%'";
$result = $conn->query($sql);

include 'displayresults.php';
$conn->close();
?>

<?php
include 'footer.php';
?>