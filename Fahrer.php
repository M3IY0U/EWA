<?php	// UTF-8 marker äöüÄÖÜß€
/**
 * Class Fahrer for the exercises of the EWA lecture
 * Demonstrates use of PHP including class and OO.
 * Implements Zend coding standards.
 * Generate documentation with Doxygen or phpdoc
 *
 * PHP Version 5
 *
 * @category File
 * @package  Pizzaservice
 * @author   Bernhard Kreling, <b.kreling@fbi.h-da.de>
 * @author   Ralf Hahn, <ralf.hahn@h-da.de>
 * @license  http://www.h-da.de  none
 * @Release  1.2
 * @link     http://www.fbi.h-da.de
 */

// to do: change name 'Fahrer' throughout this file
require_once './Page.php';
require_once './Delivery.php';

/**
 * This is a template for top level classes, which represent
 * a complete web page and which are called directly by the user.
 * Usually there will only be a single instance of such a class.
 * The name of the template is supposed
 * to be replaced by the name of the specific HTML page e.g. baker.
 * The order of methods might correspond to the order of thinking
 * during implementation.
 * @author   Bernhard Kreling, <b.kreling@fbi.h-da.de>
 * @author   Ralf Hahn, <ralf.hahn@h-da.de>
 */
class Fahrer extends Page
{
    // to do: declare reference variables for members
    // representing substructures/blocks

    /**
     * Instantiates members (to be defined above).
     * Calls the constructor of the parent i.e. page class.
     * So the database connection is established.
     *
     * @return none
     */
    protected function __construct()
    {
        parent::__construct();
        // to do: instantiate members representing substructures/blocks
    }

    /**
     * Cleans up what ever is needed.
     * Calls the destructor of the parent i.e. page class.
     * So the database connection is closed.
     *
     * @return none
     */
    protected function __destruct()
    {
        parent::__destruct();
    }

    /**
     * Fetch all data that is necessary for later output.
     * Data is stored in an easily accessible way e.g. as associative array.
     *
     * @return none
     */
    protected function getViewData()
    {


        // to do: fetch data for this view from the database
        $orders = $this->_database->query("SELECT * FROM `order`");
        if (!$orders)
            throw new Exception("Query failed:" .$_database->error());
        $result=[];
        while($item = $orders->fetch_assoc()){
          $prp = (string) $item['OrderID'];
          $orderitems = $this->_database->query("SELECT OfferName FROM `orderitem`, `offer` WHERE fOrderID = $prp AND fOfferID = OfferID");
          if (!$orderitems)
              throw new Exception("Query failed:" .$_database->error());
          $items=[];
          while($x = $orderitems->fetch_assoc()){
            array_push($items, $x['OfferName']);
          }


          array_push($result,new Delivery($item['Status'],$item['Adress'],$items));

        }
        return $result;
    }

    /**
     * First the necessary data is fetched and then the HTML is
     * assembled for output. i.e. the header is generated, the content
     * of the page ("view") is inserted and -if avaialable- the content of
     * all views contained is generated.
     * Finally the footer is added.
     *
     * @return none
     */
    protected function generateView()
    {
        $items = $this->getViewData();
        $this->generatePageHeader('Fahrer');
        // to do: call generateView() for all members
echo <<<code

<div class="header">
  <img src="../res/banner.svg" alt="banner" id="logo">
  <div class="header-right">
      <a href="bestellung.php">Bestellung</a>
      <a href="kunde.php">Kunde</a>
      <a href="baecker.php">Bäcker</a>
      <a class="active" href="fahrer.php">Fahrer</a>
  </div>
</div>

code;

foreach ($items as $item){
    $ostatus = htmlspecialchars($item->status, ENT_QUOTES | ENT_HTML5 | ENT_DISALLOWED | ENT_SUBSTITUTE, 'UTF-8');
    $oadress = htmlspecialchars($item->adress);
    $oitems = "";
    foreach ($item->orders as $x){
      $oitems .= $x ." ";
    }
    var_dump($item);
}
echo <<<code
<div class="todo">
  <form action="Fahrer.php" method="post">
    <div class="contents">Großer Döner</div>
    <div class="price">14,30€</div>
    <div class="radio">
      <fieldset>
        <input type="radio" id="f" name="Status" value="fertig">
        <label for="f"> Fertig</label>
        <input type="radio" id="u" name="Status" value="unterwegs">
        <label for="u"> Unterwegs</label>
        <input checked type="radio" id="g" name="Status" value="geliefert">
        <label for="g">Geliefert</label>
      </fieldset>
      <input class="submit" type="submit" value="Bestellen" tabindex="7">
    </div>
  </form>
</div>
code;
echo <<<code

<div id="main">
  <div class="content">

  </div>
</div>

<div id="footer">
    <ul>
        <li><a href="bestellung.php">Bestellung</a></li>
        <li><a href="kunde.php">Kunde</a></li>
        <li><a href="baecker.php">Bäcker</a></li>
        <li><a href="fahrer.php">Fahrer</a></li>
      </ul>
</div>

code;
        $this->generatePageFooter();
    }

    /**
     * Processes the data that comes via GET or POST i.e. CGI.
     * If this page is supposed to do something with submitted
     * data do it here.
     * If the page contains blocks, delegate processing of the
	 * respective subsets of data to them.
     *
     * @return none
     */
    protected function processReceivedData()
    {
        parent::processReceivedData();
        // to do: call processReceivedData() for all members
    }

    /**
     * This main-function has the only purpose to create an instance
     * of the class and to get all the things going.
     * I.e. the operations of the class are called to produce
     * the output of the HTML-file.
     * The name "main" is no keyword for php. It is just used to
     * indicate that function as the central starting point.
     * To make it simpler this is a static function. That is you can simply
     * call it without first creating an instance of the class.
     *
     * @return none
     */
    public static function main()
    {
        try {
            $page = new Fahrer();
            $page->processReceivedData();
            $page->generateView();
        }
        catch (Exception $e) {
            header("Content-type: text/plain; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

// This call is starting the creation of the page.
// That is input is processed and output is created.
Fahrer::main();

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends).
// Not specifying the closing ? >  helps to prevent accidents
// like additional whitespace which will cause session
// initialization to fail ("headers already sent").
//? >
