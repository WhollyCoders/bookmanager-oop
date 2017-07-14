<?php
class Author{
  public $connection;
  public function __construct($connection){
    $this->connection = $connection;
    // $this->welcome_message();
  }
  public function welcome_message(){
    echo('AUTHOR Class Instantiated...<br>');
  }
}
 ?>
