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
    $this->create_books_table();
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

  public function add_book($data){
    $this->set_book_params($data);
    $this->insert_book();
  }

  public function set_book_params($data){
    $this->title        = $data['title'];
    $this->author_id    = $data['author_id'];
    $this->description  = $data['description'];
    $this->keywords     = $data['keywords'];
    $this->isbn_10      = $data['isbn_10'];
    $this->isbn_13      = $data['isbn_13'];
  }

  public function insert_book(){
    $sql = "INSERT INTO `books` (
      `book_ID`,
      `book_title`,
      `book_author_ID`,
      `book_description`,
      `book_keywords`,
      `book_isbn_10`,
      `book_isbn_13`,
      `book_date_entered`
    ) VALUES (
      NULL,
      '$this->title',
      '$this->author_id',
      '$this->description',
      '$this->keywords',
      '$this->isbn_10',
      '$this->isbn_13',
      CURRENT_TIMESTAMP
    );";
    $result = mysqli_query($this->connection, $sql);
    if(!$result){echo('*** Error INSERTING Book ***<br>');}
  }

  public function create_books_table(){
    // *** Include Table Description ***
    $sql = "CREATE TABLE IF NOT EXISTS `whollycoders`.`books` (
       `book_ID` INT(11) NOT NULL AUTO_INCREMENT ,
       `book_title` VARCHAR(255) NOT NULL ,
       `book_author_ID` INT(11) NULL ,
       `book_description` TEXT NULL ,
       `book_keywords` VARCHAR(255) NULL ,
       `book_isbn_10` VARCHAR(15) NULL ,
       `book_isbn_13` VARCHAR(20) NULL ,
       `book_date_entered` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
       PRIMARY KEY (`book_ID`)
     ) ENGINE = InnoDB;";
     // prewrap($sql);
    $result = mysqli_query($this->connection, $sql);
    if(!$result){echo('*** ERROR Creating BOOKS Table ***<br>');}
  }

  public function welcome_message(){
    echo('BOOK Class Instantiated...<br>');
  }
}

// $book = new Book($connection);

 ?>
