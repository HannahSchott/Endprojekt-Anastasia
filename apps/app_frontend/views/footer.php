<footer>
<div class="footer-navigation footer_item">
 <h3>Navigation</h3>
 <ul>
   <li><a href="#">Startseite</a></li>
   <li><a href="#">Über uns</a></li>
   <li><a href="#">Abos</a></li>
   <li><a href="#">Produkte</a></li>
 </ul>
</div>

<div class="footer-newsletter footer_item">
 <h3>Newsletter</h3>
 <p>
Möchtest du auf dem Laufenden bleiben und immer neue Angebote bekommen?
 </p>
 <form class="footer-newsletter-form" action="index.html" method="post">
   <label for="newsletter-email"></label>
   <input type="email" id="newsletter-email" name="email" placeholder="Emailadresse">
   <label for="newsletter"></label>
   <span class="newsletter_wrapper"><input type="submit" id="newsletter" name="newsletter" value="anmelden"></span>
 </form>
</div>

<div class="footer-contact footer_item">
 <h3>Kontakt</h3>
 <p>
Hast du eine Frage?
 </p>
 <form action="index.html" method="post">
   <label for="email"></label>
   <input class="input" type="email" name="email" id="email" placeholder="Emailadresse">

   <label for="subject"></label>
   <input class="input" type="text" id="subject"  name="subject" placeholder="Betreff">

   <textarea class="input" name="message" rows="8" cols="40" placeholder="Nachricht"></textarea>

   <label for="contact"></label>
   <div class="contact_wrapper input"><input type="submit" id="contact" name="contact" value="absenden"></div>

 </form>
</div>

<div class="footer-socialmedia footer_item">
 <h3>Socialmedia</h3>
 <ul>
   <li><a href="#" class="facebook">facebook</a></li>
   <li ><a href="#" class="youtube">youtube</a></li>
   <li ><a href="#" class="instagram">instagram</a></li>
   <li ><a href="#" class="pinterest">pinterest</a></li>
 </ul>
</div>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
<script src="<?php echo APP_ROOT; ?>/libs/jquery-3.1.1.min.js"></script>


<?php
if($_GET == null || $_GET["url"] == 'home' ||$_GET["url"] == 'test'){
  echo "<script src=\"" . APP_ROOT . "/public/js/home-animation.js\"></script>";
}
?>
<script src="<?php echo  APP_ROOT ?>/public/js/main.js"></script>


</body>
