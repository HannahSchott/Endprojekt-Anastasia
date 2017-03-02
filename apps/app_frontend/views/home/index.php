
    <main>
      <div class="header-image">
        <img src="<?php echo APP_ROOT?>public/img/header.jpeg" alt="header-img" />
      <div class="header-text">
          <h2>Anastasia im März</h2>
          <p>
            Hurra der Frühling ist da! Das gehört gefeiert, mit der neuen März Beauty Box. Gleich <a class="header-link" href="<?php echo APP_ROOT?>abos">hier</a> bestellen!
          </p>
        </div>
      </div>

    <h2>Anastasia Produkte</h2>
      <div class="featured_products">
        <?php foreach($products as $product) :?>
        <div class="featured_products-product">

          <div class="product-image">
          <a href="<?php echo APP_ROOT?>products/detail/<?php echo $product['id']; ?>"><img src="<?php echo APP_ROOT?>public/img/productimages/<?php echo $product['main_img']; ?>" alt="<?php echo $product['slug']; ?>"/></a>
          </div>

          <div class="featrued_products-crowns">
            <img src="<?php echo APP_ROOT?>public/img/crowns/<?php echo $product['comments_rating']; ?>.png" alt="crowns"/>
          </div>

          <h3><?php echo $product['name']; ?></h3>

        </div>
      <?php endforeach; ?>
      </div>
            <div class="abos">
              <div class="abos-element abos-three_months">
                <h4>3-Monats-Abo</h4>
                <h2>15€/Monat</h2>
                <p>
                  Das Anastasia 3 Monats Abo ist perfekt für Neukundinnen.
                </p>
                <!-- <a href="#" class="btn-0">abonnieren</a> -->
                <div class="abos-button abos-button__three_months"><a href="<?php echo APP_ROOT?>order/1">abonnieren</a></div>
              </div>

              <div class="abos-element abos-six_months">
                <h4>6-Monats-Abo</h4>
                <h2>13€/Monat</h2>
                <p>
                  6 Monate Anastasia Beauty Boxen direkt vor deine Haustür! Probier es gleich aus.
                </p>
                <div class="abos-button abos-button__six_months"><a href="<?php echo APP_ROOT?>order/2">abonnieren</a></div>
              </div>
              <div class="abos-element abos-one_year">
                <h4>1-Jahres-Abo</h4>
                <h2>12€/Monat</h2>
                <p>
                  Ein ganzes Jahr jedes Monate eine neue auf dich zugeschnitte Box? Gleich hier bestellen
                </p>
                <div class="abos-button abos-button__one_year"><a href="<?php echo APP_ROOT?>order/3">abonnieren</a></div>
              </div>
            </div>

            <div class="about">
              <h2>Über uns</h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
    </main>
