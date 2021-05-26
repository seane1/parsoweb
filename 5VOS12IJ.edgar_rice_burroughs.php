<?php 
include 'header.php';
?>
<title>Edgar Rice Burroughs</title>
</head>
<body>
<?php
include 'menu.php';
?>
<div class="results">
<h3>Edgar Rice Burroughs</h3>
</div>
<div class="main">
<?php
include 'connection.php';

$sql = "SELECT * FROM " . $dbname . " WHERE " . "Author LIKE '%Burroughs%'";
$result = $conn->query($sql);

include 'displayresults.php';
$conn->close();
?>

<?php
include 'footer.php';
?>