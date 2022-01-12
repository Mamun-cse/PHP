<?php 
$id = $_GET['id'];

$con = new PDO('mysql:host=localhost;dbname=bookstore', 'root', '');
$statement = $con->prepare('select * from booklists where id=:id');
$statement->execute([
  ':id' => $id
]);
if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['available']) && isset($_POST['pages']) && isset($_POST['isbn'])) {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $available = $_POST['available'];
  $pages = $_POST['pages'];
  $isbn = $_POST['isbn'];
  $statement = $con->prepare("update booklists set title=:title, author=:author, available=:available, pages=:pages, isbn=:isbn where id=:id");
  $statement->execute([
    ':title' => $title,
    ':author' => $author,
    ':available' => $available,
    ':pages' => $pages,
    ':isbn' => $isbn,
    ':id' => $id,
  ]);
  header('location: index.php');
}


$book = $statement->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
 <div class="container">
   <div class="card mt-8">
     <div class="card-header">
       <h2>Update a book</h2>
     </div>
     <div class="card-body">
     <form action="" method="post">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <input type="text" name="author" id="author" class="form-control">
        </div>
        <div class="form-group">
          <label for="available">Available</label>
          <input type="text" name="available" id="available" class="form-control">
        </div>
        <div class="form-group">
          <label for="pages">Pages</label>
          <input type="text" name="pages" id="pages" class="form-control">
        </div>
        <div class="form-group">
          <label for="isbn">Isbn</label>
          <input type="text" name="isbn" id="isbn" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-outline-info">Update a book</button>
          <a class="btn btn-info" href="index.php">Go to home</a>
        </div>
      </form>
     </div>
   </div>
 </div> 
</body>
</html>