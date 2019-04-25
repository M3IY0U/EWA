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

// to do: change name 'Bestellung' throughout this file
require_once './Page.php';

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
            throw new Exception("Query failed: ".$_database->error);
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
        $this->getViewData();
        $this->generatePageHeader('Bestellung');
        // to do: call generateView() for all
echo <<<timoschw

      <div class="header">
        <img src="../res/banner.svg" alt="banner" id="logo">
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
            <!--banner - image mit text?-->
          </div>
            <h1>Unsere Speisekarte</h1>
            <div class="item">
              <div class="text">Großer Döner</div>
              <div class="thumb"></div>
              <div class="price">4€</div>
            </div>
timoschw;
echo <<<code

            <div class="item">
              <div class="text"></div>
              <div class="thumb"></div>
              <div class="price">4€</div>
            </div>

code;
echo <<<code
        </div>
      </div>

      <div id="right">
        <div class="warenkorb">
          Ihr Warenkorb
          <form action="https://echo.fbi.h-da.de/">
              <label>
                <select name="Bestellung[]" size="6" tabindex="1" multiple>
                  <option value="gdoener">Großer Döner</option>
                  <option value="pizza">Döner Pizza</option>
                  <option value="vdoener" selected>Veget. Döner</option>
                </select>
              </label>
              <div class="total">14,30€</div>
                <input type="submit" value="Auswahl Löschen" tabindex="2">
                <input type="submit" value="Alle Löschen" tabindex="3">
                <input type="text" name="Name" value="" placeholder="Name" tabindex="4">
                <input type="text" name="Adresse" value="" placeholder="Adresse" tabindex="5">
                <input type="text" name="PLZ" value="" placeholder="PLZ" pattern="\b\d{5}\b" tabindex="6">
                <input type="submit" value="Bestellen" tabindex="7">
          </form>
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
