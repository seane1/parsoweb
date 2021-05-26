<?php
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "<div class = 'book'><a href='" . $row["Product_Page"] . "'><img src = '/bookimages/" . $row["Cover"]. "'></img></a>" . "<a class='titlelink' href='" . $row["Product_Page"] . "'>" . $row["Title"] . "</a>" . "<a class='authorlink' href='" . $row["Author_Page"] . "'>" . $row["Author"] . "</a>" . "<a href='" . $row["Genre_Page"]. "'>" . $row["Genre"] . "</a><p>$". $row["Price"] ."</p><form method='post' action='basket.php'><input name='book' type='hidden' value='" . $row["ID"] . "'><input name='price' type='hidden' value='" . $row["Price"] . "'><button type='submit' class='bookbutton'>Add to basket</button></form></div>";
    }
} else {
    echo "<p>0 results for: " . $_GET["search"] . "</p>";
}
?>