<?php
require('../../includes/header.inc.php');
require('../../../../__CONNECT/dbconnect.php');
require('../../_controllers/BooksController.php');
$controller = new BooksController($connection);
$books      = $controller->index();
?>

<div class="container">
  <section id="content-books">
    <h2>Books Index</h2>
    <table class="table table-bordered">
      <tr>
        <th>ID</th>
        <th>Title</th>
      </tr>
      <?php foreach ($books as $book) {
          $id = $book['id'];
        ?>
        <tr>
          <td><?php echo($book['id']);?></td>
          <td><?php echo($book['title']);?></td>
          <td><a href="./show.php?book_id=<?php echo($id);?>">View Book</a></td>
        </tr>
      <?php  } ?>
    </table>
    <a href="./new">Add New Book</a>
  </section>
</div>
<?php require('../../includes/footer.inc.php'); ?>
