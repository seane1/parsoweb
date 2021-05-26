<?php 
include 'header.php';
?>
<title>Homer</title>
</head>
<body>
<?php
include 'menu.php';
?>
<div class="results">
<h3>Homer</h3>
</div>
<div class="main">
<?php
include 'connection.php';

$sql = "SELECT * FROM " . $dbname . " WHERE " . "Author LIKE '%Homer%'";
$result = $conn->query($sql);

include 'displayresults.php';
$conn->close();
?>

<?php
include 'footer.php';
?>