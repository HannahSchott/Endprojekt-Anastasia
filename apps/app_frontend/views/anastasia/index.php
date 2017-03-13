<main class="main_book">
  <?php if(sessions::get('order') == false):?>
    <div class="backend-wrapper">
        <p>Bitte Fülle zuerst das <a class="header-link" href="<?php echo APP_ROOT;?>order/index/3">Bestllformular</a> aus um den Test zu machen</p>
    </div>

  <?php else:?>
  <?php if($page_id > 1) :?>
  <div class="button-wrapper">
      <a href="<?php echo APP_ROOT;?>anastasia/getPageContent/<?php echo $page_id - 1;?>" class="button button-back"  id=<?php echo $page_id -1; ?>>zrück</a>
      <a href="<?php echo APP_ROOT;?>anastasia/getPageContent/<?php echo $page_id + 1;?>" class="button button-next" id=<?php echo $page_id + 1; ?>>weiter</a>
  </div>
  <?php  endif; ?>

  <div class="book-wrapper" id='book'>

    <div class="content-wrapper">

      <?php
      if($page_id <= 1):?>
      <div class="welcome-text">
        <h3>Jetzt fehlt nur noch der letzte Schritt!</h3>
        <p>Der Anastasia Beautytest. Er wird uns helfen dich kennen zu lernen und deine Wünsche
          und Vorstellungen zu besser zu verstehen. Nimm dir ein bisschen Zeit und fang an! Versuche
          sponntan zu antoworten und sei ganz du selbst, nur so können wir deine Box am besten zusammenstellen.
          Es ist uns sehr wichtig das du mit unseren Boxen am Ende zufrieden bist  und dazu dient dieses Test.
          Wir wünschen dir viel Spaß damit!</p>
          <a href="<?php echo APP_ROOT;?>anastasia/getPageContent/2" class="button">weiter</a>
      </div>
    <?php endif;?>

    <?php if($page_id > 1) :?>
      <div class="question-wrapper" id="question-wrapper">
        <p class="question-text text<?php echo $page_id ?>"><?php echo $question;?></p>
        <?php if($page_id ==  9) : ?>
        <div class="finish_button">
          <a href="<?php echo APP_ROOT;?>anastasia/setAnswers/<?php echo sessions::get("user_id"); ?>" class="button">Fertig</a>
        </div>
        <?php endif; ?>
      </div>
      <div class="answerpage-wrapper" id="answerpage-wrapper">
        <div class="answer-wrapper">
        <?php for($i = 0; $i < count($images); $i++):?>
          <div class="answer_img-wrapper page-<?php echo $page_id;?>">
            <img src="<?php echo APP_ROOT;?>/public/img/anastasia/<?php echo $images[$i];?>.svg" alt="<?php echo $images[$i] ?>" class="answer_img answer<?php echo $i; ?>" id=<?php echo $i + 1;?>>
            <?php if( $answers > 0) : ?>
            <p class="answer-text"><?php echo $answers[$i];?></p>
            <?php endif; ?>
          </div>
      <?php endfor; ?>
        </div>
      </div>
    <?php endif;?>


    </div>
    <img src="<?php echo APP_ROOT; ?>/public/img/Book.png" alt="" class="book">
  </div>
<?php endif;?>
</main>
