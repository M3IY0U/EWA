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
            <a href="bestellung.php">Bestellung</a>
            <a class="active" href="#kunde">Kunde</a>
            <a href="baecker.php">Bäcker</a>
            <a href="fahrer.php">Fahrer</a>
        </div>
      </div>


      <div id="main">
        <div class="content">
          <div class="order">
              <div class="Item">Großer Döner</div>
              <div class="Status">Bestellt</div>
          </div>
          <div class="order">
              <div class="Item">Kleiner Döner</div>
              <div class="Status">In Zubereitung</div>
          </div>
          <div class="order">
              <div class="Item">Döner Pizza</div>
              <div class="Status">Fertig</div>
          </div>
          <div class="order">
              <div class="Item">Veget. Döner</div>
              <div class="Status">In Zustellung</div>
          </div>
        </div>
      </div>

      <div id="footer">
          <ul>
              <li><a href="bestellung.php">Bestellung</a></li>
              <li><a href="#kunde">Kunde</a></li>
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
