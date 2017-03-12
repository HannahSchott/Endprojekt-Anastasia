
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
                <div class="abos-button abos-button__three_months"><a href="<?php echo APP_ROOT?>order/index/1">abonnieren</a></div>
              </div>

              <div class="abos-element abos-six_months">
                <h4>6-Monats-Abo</h4>
                <h2>13€/Monat</h2>
                <p>
                  6 Monate Anastasia Beauty Boxen direkt vor deine Haustür! Probier es gleich aus.
                </p>
                <div class="abos-button abos-button__six_months"><a href="<?php echo APP_ROOT?>order/index/2">abonnieren</a></div>
              </div>
              <div class="abos-element abos-one_year">
                <h4>1-Jahres-Abo</h4>
                <h2>12€/Monat</h2>
                <p>
                  Ein ganzes Jahr jedes Monate eine neue auf dich zugeschnitte Box? Gleich hier bestellen
                </p>
                <div class="abos-button abos-button__one_year"><a href="<?php echo APP_ROOT?>order/index/3">abonnieren</a></div>
              </div>
            </div>

            <div class="about">
              <h2>Über uns</h2>
              <p class="about-text">
                Finden Sie den perfekten Lippenstift für verführerische Lippen-Make-ups und die
                richtige Mascara für einen dramatischen Blick. Mit Ihrer
                <i>Anastasia-Beautybox</i> können Sie sich Produktproben aus dem Kosmetikbereich
                einfach nach Hause bestellen. Jeden Monat erhalten Sie jeweils fünf ausgewählte
                Kosmetikproben über den <i>Anastasia</i>- Kosmetikversand geliefert. Erstellen
                Sie gleich Ihr persönliches Beauty-Profil und erhalten Sie typgerechte
                Make-up-Proben und die neusten Makeuptrends in Ihrer Kosmetikbox. <a class="header-link" href="<?php echo APP_ROOT;?>about">mehr</a>
              </p>
            </div>
    </main>
