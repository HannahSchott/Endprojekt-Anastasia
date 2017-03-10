<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Anastasia</title>
    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo APP_ROOT; ?>public/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="<?php echo APP_ROOT;?>public/img/favicon.png">
</head>
<body>
  <header>
    <div class="header-subnav">
      <ul>
        <?php
        foreach($nav as $key => $val){
              echo "<li class= \"subnav-element\"><a href=\"" .APP_ROOT. "$key\" class= \"subnav-element-a \">$val</a></li>";
        }
        ?>
      </ul>
      <a href="<?php echo APP_ROOT; ?>/home" class="mobile-logo"><img src="<?php echo APP_ROOT;?>/public/img/logo-mobile.png" alt="anastasia logo"></a>
      <!-- Burger icon  -->
      <div class="menu-button">
        <div class="menu-bar"></div>
        <div class="menu-bar"></div>
        <div class="menu-bar"></div>
      </div>
    </div>
    <div class="mobile-menu">
      <ul>
        <li><a href="<?php echo APP_ROOT; ?>/home">Startseite</a></li>
        <li><a href="<?php echo APP_ROOT; ?>/about">Über uns</a></li>
        <li><a href="<?php echo APP_ROOT; ?>/abos">Abos</a></li>
        <li><a href="<?php echo APP_ROOT; ?>/products">Produkte</a></li>
        <li><a href="<?php echo APP_ROOT; ?>/login">Login</a></li>
        <li><a href="<?php echo APP_ROOT; ?>/register">Registrieren</a></li>
      </ul>
    </div>
    <div class="header-logo">
      <a href="<?php echo APP_ROOT; ?>">
      <img src="<?php echo APP_ROOT; ?>/public/img/logo-big.png" alt="logo" />
      </a>
    </div>

    <div class="header-navigation">
      <ul>
        <li><a href="<?php echo APP_ROOT; ?>about" class="navigation-element">Über uns</a></li>
        <li><a href="<?php echo APP_ROOT; ?>abos" class="navigation-element">Abos</a></li>
        <li><a href="<?php echo APP_ROOT; ?>products" class="navigation-element">Produkte</a></li>
      </ul>
    </div>
  </header>
