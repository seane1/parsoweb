<?php 
include 'header.php';
?>
<title>Robert E. Howard</title>
</head>
<body>
<?php
include 'menu.php';
?>
<div class="results">
<h3>Robert E. Howard</h3>
</div>
<div class="main">
<?php
include 'connection.php';

$sql = "SELECT * FROM " . $dbname . " WHERE " . "Author LIKE '%Howard%'";
$result = $conn->query($sql);

include 'displayresults.php';
$conn->close();
?>

<?php
include 'footer.php';
?>