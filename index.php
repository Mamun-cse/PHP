<?php 
$con = new PDO('mysql:host=localhost;dbname=bookstore', 'root', '');
$statement = $con->prepare('select * from booklists');
$statement->execute();
$booklists = $statement->fetchAll(PDO::FETCH_OBJ);

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
   <div class="card mt-7">
     <div class="card-header">
       <h2>All books</h2>
     </div>
     <div class="card-body">
      <table class="table table-bordered">
        <tr bgcolor="#C0C0C0">
          <th>Id</th>
          <th>Title</th>
          <th>Author</th>
          <th>Available</th>
          <th>Pages</th>
          <th>Isbn</th>
          <th>Action</th>
        </tr>
        <?php foreach($booklists as $book): ?>
        <tr>
          <td><?= $book->id; ?></td>
          <td><?= $book->title; ?></td>
          <td><?= $book->author; ?></td>
          <td><?= $book->available; ?></td>
          <td><?= $book->pages; ?></td>
          <td><?= $book->isbn; ?></td>
          <td>
            <a class="btn btn-info" href="edit.php?id=<?= $book->id; ?>">Edit</a>
            <a class="btn btn-danger" href="delete.php?id=<?= $book->id; ?>">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
      </table>
      <div class="form-group">
         <a class="btn btn-info" href="create.php">Create a new book</a>
      </div>
     </div>
   </div>
 </div> 
</body>
</html>