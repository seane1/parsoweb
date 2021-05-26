<?php 
include 'header.php';
?>
<title>History</title>
</head>
<body>
<?php
include 'menu.php';
?>
<div class="results">
<h3>History books</h3>
</div>
<div class="main">
<?php
include 'connection.php';

$sql = "SELECT * FROM " . $dbname . " WHERE " . "Genre LIKE '%History%'";
$result = $conn->query($sql);

include 'displayresults.php';
$conn->close();
?>

<?php
include 'footer.php';
?>