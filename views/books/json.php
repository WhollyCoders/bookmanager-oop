<?php
require('../../../../__CONNECT/dbconnect.php');
require('../../_controllers/BooksController.php');
$controller = new BooksController($connection);
$json = $controller->json();
echo($json);
 ?>
