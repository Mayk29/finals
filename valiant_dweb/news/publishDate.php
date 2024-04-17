<?php
namespace publishDate;

class Table {
  public $date = "";
  public $time = "";

  public function message() {
    echo "<p>{$this->date} at {$this->time}</p>";
  }
}
?>

