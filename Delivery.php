<?php

Class Delivery{
    public $status;
    public $adress;
    public $orders;

    public function __construct($s,$a,$o){
      $this->status = $s;
      $this->adress = $a;
      $this->orders = $o;

    }
}
?>
