<?php
if(isset($_GET['book_id'])){
  require('../../../../__CONNECT/dbconnect.php');
  require('../../_controllers/BooksController.php');
  $controller = new BooksController($connection);
  $id = $_GET['book_id'];
  $book = $controller->show($id);

}else{
  echo('ERROR --- Book ID is missing...<br>');
}
require('../../includes/header.inc.php');
?>
<div class="container">
  <section id="content-show-books">
    <h2>Show Book</h2>
    <ul>
      <li> <strong>ID:</strong> <?php echo($book['id']); ?></li>
      <li> <strong>Title:</strong> <?php echo($book['title']); ?></li>
      <li> <strong>ISBN-10:</strong> <?php echo($book['isbn_10']); ?></li>
      <li> <strong>ISBN-13:</strong> <?php echo($book['isbn_13']); ?></li>
      <li> <strong>Date Entered:</strong> <?php echo($book['date_entered']); ?></li>
    </ul>
    <a href="./edit.php?book_id=<?php echo($id);?>">Update Book</a> |
    <a href="./delete.php?book_id=<?php echo($id);?>">Delete Book</a>
  </section>
</div>
<?php require('../../includes/footer.inc.php'); ?>
