<?php
include('init.php')
$searchs = $_POST['search'];
$stmt = $conn-> prepare("SELECT * FROM students ");

?>