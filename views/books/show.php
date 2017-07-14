<?php
if(isset($_GET['book_id'])){
  require('../../../../__CONNECT/dbconnect.php');
  require('../../_controllers/BooksController.php');
  $controller = new BooksController($connection);
  $id = $_GET['book_id'];
  $book = $controller->show($id);

  echo('<pre>');
  print_r($book);
  echo('</pre>');
}else{
  echo('ERROR --- Book ID is missing...<br>');
}
 ?>
