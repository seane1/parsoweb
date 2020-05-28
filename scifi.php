<?php 
include 'header.php';
?>
<title>Sci Fi</title>
</head>
<body>
<?php
include 'menu.php';
?>
<div class="results">
<h3>Sci fi books</h3>
</div>
<div class="main">
<?php
include 'connection.php';

$sql = "SELECT * FROM " . $dbname . " WHERE " . "Genre LIKE '%Sci Fi%'";
$result = $conn->query($sql);

include 'displayresults.php';
$conn->close();
?>

<?php
include 'footer.php';
?>