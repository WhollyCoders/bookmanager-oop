<?php
require('../../includes/header.inc.php');
require('../../../../__CONNECT/dbconnect.php');
require('../../_controllers/BooksController.php');
$controller = new BooksController($connection);
?>
<div class="container">
  <section id="content-books">
    <h2>Delete Book</h2>
    
  </section>
</div>
<?php require('../../includes/footer.inc.php'); ?>
