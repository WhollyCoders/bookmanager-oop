<?php
// require('../../../__CONNECT/dbconnect.php');
require('../../models/Book.php');
class BooksController{
  public $connection;
  public $Book;

  public function __construct($connection){
    $this->connection = $connection;
    $this->Book = new Book($this->connection);
    // $this->welcome_message();
  }

  public function index(){
    return $this->Book->get_all_books();
  }

  public function show($id){
    return $this->Book->get_one_book($id);
  }

  public function create($data){
    $this->Book->add_book($data);
  }

  public function json(){
    $this->Book->get_all_books();
    return $this->Book->json;
  }

  public function welcome_message(){
    echo('BooksController Class Instantiated...<br>');
  }
}

$controller = new BooksController($connection);
// echo('<pre>');
// print_r($controller);
// echo('</pre>');
$books = $controller->index();
// echo('<pre>');
// print_r($books);
// echo('</pre>');
// echo('<pre>');
// print_r($controller);
// echo('</pre>');
 ?>
