<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Anastasia</title>
    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo APP_ROOT; ?>public/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="../public/img/favicon.png">  
</head>
<body>
  <header>
    <div class="header-subnav">
      <ul>
        <li class="subnav-element"><a href="<?php echo APP_ROOT?>logout" class="subnav-element-a">Logout</a></li>
        <li class="subnav-element"><a href="<?php echo APP_ROOT?>home" class="subnav-element-a">Frontend</a></li>
      </ul>
      <a href="<?php echo APP_ROOT; ?>/home" class="mobile-logo"><img src="<?php echo APP_ROOT;?>/public/img/logo-mobile.png" alt="anastasia logo"></a>
      <!-- Burger icon  -->
      <div class="menu-button">
        <div class="menu-bar"></div>
        <div class="menu-bar"></div>
        <div class="menu-bar"></div>
      </div>
    </div>

    <div class="header-logo">
      <a href="<?php echo APP_ROOT;?>backend/home">
        <img src="<?php echo APP_ROOT; ?>public/img/logo-big.png" alt="logo" />
      </a>
    </div>

      <ul class="backend_menu">
        <li><a class="backend-button" href="<?php echo APP_ROOT?>backend/products">Produkte verwalten</a></li>
        <li><a class="backend-button" href="<?php echo APP_ROOT?>backend/users">User verwalten</a></li>
        <li><a class="backend-button" href="<?php echo APP_ROOT?>backend/order">Bestellungen</a></li>
        <li><a class="backend-button" href="<?php echo APP_ROOT?>backend/contact">Kontakanfragen</a></li>
      </ul>

  </header>
