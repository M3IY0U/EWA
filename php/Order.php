<?php

Class Order{
    public $status;
    public $name;

    public function __construct($s,$i){
      $this->status = $s;
      $this->name = $i;
    }
}
?>
