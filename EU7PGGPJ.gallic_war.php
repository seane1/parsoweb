<?php 
include 'header.php';
?>
<title>Gallic War</title>
</head>
<body>
<?php
include 'menu.php';
?>
<div class="main">
<?php
include 'connection.php';

$sql = "SELECT * FROM " . $dbname . " WHERE " . "Title LIKE 'Gallic War'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "<div class='product'><img src = '/bookimages/" . $row["Cover"]. "'></img><div class='productinfo'><h3>" . $row["Title"] . "</h3><p>By (author) <a class='authorlink' href='" . $row["Author_Page"] . "'>" . $row["Author"] . "</a></p><p>" . $row["Description"]. "</p><p><a href='" . $row["Genre_Page"]. "'>" . $row["Genre"] . "</a></p></div></div>";
    }
} else {
    echo "<p>0 results for: " . $_GET["search"] . "</p>";
}
$conn->close();
?>

<?php
include 'footer.php';
?>