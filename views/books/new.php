<?php
require('../../includes/header.inc.php');
require('../../../../__CONNECT/dbconnect.php');
require('../../_controllers/BooksController.php');
$controller = new BooksController($connection);
?>
<div class="container">
  <section id="content-books">
    <h2>Add New Book</h2>
    <form class="form-addbook col-md-4" action="./create.php" method="post">
      <div class="form-group">
        <label for="add_title">Title</label>
        <input type="text" class="form-control" id="add_title" name="add_title" placeholder="Title">
      </div>
      <div class="form-group">
        <label for="add_author_id">Author ID</label>
        <input type="text" class="form-control" id="add_author_id" name="add_author_id" placeholder="Author ID">
      </div>
      <div class="form-group">
        <label for="add_description">Description</label>
        <input type="text" class="form-control" id="add_description" name="add_description" placeholder="Description">
      </div>
      <div class="form-group">
        <label for="add_keywords">Keywords</label>
        <input type="text" class="form-control" id="add_keywords" name="add_keywords" placeholder="Keywords">
      </div>
      <div class="form-group">
        <label for="add_isbn_10">ISBN-10</label>
        <input type="text" class="form-control" id="add_isbn_10" name="add_isbn_10" placeholder="ISBN-10">
      </div>
      <div class="form-group">
        <label for="add_isbn_13">ISBN-13</label>
        <input type="text" class="form-control" id="add_isbn_13" name="add_isbn_13" placeholder="ISBN-13">
      </div>

      <input type="submit" class="btn btn-default" name="add_book" value="Add Book">

    </form>
  </section>
</div>
<?php require('../../includes/footer.inc.php'); ?>
