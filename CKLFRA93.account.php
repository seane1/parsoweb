<?php 
include 'header.php';
?>
<title>My Account</title>
</head>
<body>
<?php
include 'menu.php';
?>
<div class="main">
<?php
echo "<p>Name: " . $_SESSION["Name"] . "</p>";
echo "<p>Email: " . $_SESSION["Email"] . "</p>";
?>
<?php
include 'footer.php';
?>