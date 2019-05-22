<?php

Class Delivery{
    public $status;
    public $adress;
    public $orders;
    public $total;
    public $id;

    public function __construct($s,$a,$o,$t,$i){
      $this->status = $s;
      $this->adress = $a;
      $this->orders = $o;
      $this->total = $t;
      $this->id = $i;
    }
}
?>
