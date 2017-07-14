<?php
// require('../../../__CONNECT/dbconnect.php');
require('../../models/Author.php');
class Book{
  public $connection;
  public $Author;
  public $id;
  public $title;
  public $subtitle;
  public $description;
  public $keywords;
  public $isbn_10;
  public $isbn_13;
  public $author_id;
  public $data;
  public $json;

  public function __construct($connection){
    $this->connection = $connection;
    $this->Author = new Author($this->connection);
    // $this->welcome_message();
  }

  public function get_all_books(){
    $sql = "SELECT * FROM `books`;";
    $result = mysqli_query($this->connection, $sql);
    if($result){
      return $this->get_book_data($result);
    }else{
      echo('ERROR Getting All Books...<br>');
    }
  }

  public function get_one_book($id){
    $this->id = $id;
    $sql = "SELECT * FROM `books` WHERE book_ID='$this->id';";
    $result = mysqli_query($this->connection, $sql);
    if($result){
      return $this->get_book_data($result);
    }else{
      echo('ERROR Getting One Book...<br>');
    }
  }

  public function get_book_data($result){
    $rows = mysqli_num_rows($result);
    $this->data = array();
    if($rows > 1){

      while($row = mysqli_fetch_array($result)){
        $this->data[] = array(
          'id'            =>    $row['book_ID'],
          'title'         =>    $row['book_title'],
          'author_ID'     =>    $row['book_author_ID'],
          'description'   =>    $row['book_description'],
          'keywords'      =>    $row['book_keywords'],
          'isbn_10'       =>    $row['book_isbn_10'],
          'isbn_13'       =>    $row['book_isbn_13'],
          'date_entered'  =>    $row['book_date_entered'],
        );
      }

    }else{
      $row = mysqli_fetch_array($result);
        $this->data[] = array(
          'id'            =>    $row['book_ID'],
          'title'         =>    $row['book_title'],
          'author_ID'     =>    $row['book_author_ID'],
          'description'   =>    $row['book_description'],
          'keywords'      =>    $row['book_keywords'],
          'isbn_10'       =>    $row['book_isbn_10'],
          'isbn_13'       =>    $row['book_isbn_13'],
          'date_entered'  =>    $row['book_date_entered'],
        );

        $this->data = $this->data[0];
    }

    $this->json = json_encode($this->data);
    return $this->data;
  }

  public function welcome_message(){
    echo('BOOK Class Instantiated...<br>');
  }
}

// $book = new Book($connection);

 ?>
