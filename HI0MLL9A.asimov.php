<?php 
include 'header.php';
?>
<title>Isaac Asimov</title>
</head>
<body>
<?php
include 'menu.php';
?>
<div class="results">
<h3>Isaac Asimov</h3>
</div>
<div class="main">
<?php
include 'connection.php';

$sql = "SELECT * FROM " . $dbname . " WHERE " . "Author LIKE '%Asimov%'";
$result = $conn->query($sql);

include 'displayresults.php';
$conn->close();
?>

<?php
include 'footer.php';
?>