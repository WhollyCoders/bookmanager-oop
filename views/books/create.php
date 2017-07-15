<?php
if(isset($_POST['add_book'])){
  $title        = $_POST['add_title'];
  $author_id    = $_POST['add_author_id'];
  // *** Checking for non integer data types ***
  if(gettype($author_id) === integer){
    $author_id = $_POST['add_author_id'];
  }else{
    $author_id = 0;
  }
  $description  = $_POST['add_description'];
  $keywords     = $_POST['add_keywords'];
  $isbn_10      = $_POST['add_isbn_10'];
  $isbn_13      = $_POST['add_isbn_13'];

  require('../../../../__CONNECT/dbconnect.php');
  require('../../_controllers/BooksController.php');
  $controller = new BooksController($connection);

  $book_params = array(
    'title'         =>    $title,
    'author_id'     =>    $author_id,
    'description'   =>    $description,
    'keywords'      =>    $keywords,
    'isbn_10'       =>    $isbn_10,
    'isbn_13'       =>    $isbn_13
  );

  $res = $controller->create($book_params);
  header('Location: ./index');
}
 ?>
