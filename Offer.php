<?php

Class Offer{
    public $name;
    public $path;
    public $price;

    public function __construct($n,$pa,$pr){
      $this->name = $n;
      $this->path = $pa;
      $this->price = $pr;
    }
}
?>