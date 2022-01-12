<?php 
$id = $_GET['id'];
$con = new PDO('mysql:dbname=bookstore;host=localhost', 'root', '');
$statement = $con->prepare('delete from booklists where id=:id');
$statement->execute([
  ':id' => $id
]);

header('location: index.php');
