<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Übersicht</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="js/functions.js"></script>
    <link rel="shortcut icon" href="../res/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!-- (unessescary) stuff
      <base href="https://www.example.de/">
      <meta name="robots" content="index,follow">
      <meta name="description" content="Timo stinkt">
      <meta name="generator" content="Timo Knock">
    -->
  </head>


  <body>
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
            <div class="item">
              <div class="text">Kleiner Döner</div>
              <div class="thumb"></div>
              <div class="price">3€</div>
            </div>
            <div class="item">
              <div class="text">Veget. Döner</div>
              <div class="thumb"></div>
              <div class="price">3,50€</div>
            </div>
            <div class="item">
              <div class="text">Döner Pizza</div>
              <div class="thumb"></div>
              <div class="price">5€</div>
            </div>
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

      <!-- <div class="cookiebar open">
        <div class="left">Zur optimalen Nutzererfahrung nutzen wir auf unserer Website Cookies. 🍪 <a href="datenschutz.html">Mehr Informationen</a></div>
        <div class="right"><button class="cookiebar-close" onclick="cookieClose()">Verstanden!</button></div>
      </div> -->
  </body>
</html>
