<?php	// UTF-8 marker äöüÄÖÜß€
/**
 * Class Bestellung for the exercises of the EWA lecture
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

require_once './Page.php';
require_once './Offer.php';

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
class Bestellung extends Page
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
        $offeritems = $this->_database->query("SELECT * FROM offer");
        if (!$offeritems)
            throw new Exception("Query failed:" .$_database->error());
        $result=[];
        while($item = $offeritems->fetch_assoc()){
          #$name = $item['OfferName'];
          #$path = $item['OfferImgPath'];
          #$price = $item['OfferPrice'];
          array_push($result,new Offer($item['OfferName'],$item['OfferImgPath'],$item['OfferPrice']));
          #$result[] = new Offer($name, $path, $price);
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

        $this->generatePageHeader('Bestellung');
        // to do: call generateView() for all

echo <<< header

      <div class="header">
        <img src="../res/banner.svg" alt="banner" id="logo" onclick="toggleMode()">
        <div class="header-right">
            <a class="active" href="bestellung.php">Bestellung</a>
            <a href="kunde.php">Kunde</a>
            <a href="baecker.php">Bäcker</a>
            <a href="fahrer.php">Fahrer</a>
        </div>
      </div>


      <div id="main">
        <div class="content">
          <div class="headerimage">
          </div>
            <h1>Unsere Speisekarte</h1>

header;
        foreach ($items as $item){
            $oname = htmlspecialchars($item->name);
            $opath = htmlspecialchars($item->path);
            $oprice = htmlspecialchars($item->price);
            $toPass = htmlspecialchars(json_encode($item));
echo <<<item
                        <div class="item">
                          <div class="text">$oname</div>
                          <img src="$opath" alt="$oname" onclick="addToBasket('$toPass')">
                          <div class="thumb"></div>
                          <div class="price">$oprice €</div>
                        </div>
item;
        }

echo <<<form
        </div>
      </div>
      <div id="right">
        <div class="warenkorb">
          Ihr Warenkorb
          <form action="bestellung.php" method="post" onsubmit="return isValidForm()">
              <label>
                <select name="Bestellung[]" id="wk" size="6" tabindex="1" multiple="multiple">
                <!--  <option value="Großer Döner">Großer Döner</option>
                  <option value="Borgar">Borgar</option>
                  <option value="Lamacun" selected>Lamacun</option> -->
                </select>
              </label>
              <div class="total" id="sumField">Total: 0€</div>
                <input type="button" value="Auswahl Löschen" onclick="removeFromBasket()" tabindex="2">
                <input type="button" value="Alle Löschen" onclick="emptyBasket()" tabindex="3">
                <input type="text" name="Name" value="" placeholder="Name" id="name" tabindex="4">
                <input type="text" name="Adresse" value="" placeholder="Adresse" id="adr"tabindex="5">
                <input type="text" name="PLZ" value="" placeholder="PLZ" id="plz"pattern="\b\d{5}\b" tabindex="6">
                <input type="submit" disabled="true" value="Bestellen" id="send" onclick="submitOrder()" tabindex="7">
          </form>
        </div>
      </div>



form;
        $this->generatePageFooter();
    }

    /**
     * Processes the data that comes via GET or POST i.e. CGI.
     * If this page is supposed to do something with submitted
     * data do it here.
     * If the page contains blocks, delegate processing of the
	 * respective subsets of data to them.
     * @return none
     */
    protected function processReceivedData()
    {
        parent::processReceivedData();

        if (sizeof($_POST) > 0){
          if(!isset($_POST['Name'])||!isset($_POST['PLZ'])||!isset($_POST['Adresse'])||(sizeof($_POST['Bestellung'])<0)){
            return;
          }

          try {
              $sql = "INSERT INTO `order` (OrderID, Adress, OrderTime) VALUES (NULL, ? , CURRENT_TIMESTAMP)";
              if($stmt = $this->_database->prepare($sql)){
                $adr = $this->_database->real_escape_string(htmlspecialchars($_POST['Name'] . " " . $_POST['Adresse'] . " " . $_POST['PLZ']));
                $stmt->bind_param("s", $adr);
                $stmt->execute();
                $oid = $this->_database->insert_id;
                $_SESSION['oid'] = $oid;
              }else{
                echo "something broke.:/<br>";
              }

              $stmt->close();
              $sql = "";

              foreach (($_POST['Bestellung']) as $item){
                $item = $this->_database->real_escape_string($item);
                $sql = "INSERT INTO `orderitem` (fOrderID, fOfferID) SELECT $oid, OfferID FROM `offer` WHERE offer.OfferName = '$item'; ";
                $this->_database->query($sql);
                //echo ($sql . "\n");
              }

              header('Location: kunde.php');
          } catch (\Exception $e) {
            throw $e;
          }
        }
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
            session_start();
            $page = new Bestellung();
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
Bestellung::main();

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends).
// Not specifying the closing ? >  helps to prevent accidents
// like additional whitespace which will cause session
// initialization to fail ("headers already sent").
//? >
