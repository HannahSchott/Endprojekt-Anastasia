<?php

class anastasia_model extends model{

  public $counter = 2;

  public function getPageContent($page_id)
  {

      if($page_id >= 9){
        $page_id = '9';
      }

     $res = $this -> db -> query("SELECT * FROM anastasia WHERE page_id = '$page_id' LIMIT 1");

     $content= $res -> fetch_assoc();

    //answer text
    if(count($content['answer_text']) >= 1){
      $answers = ltrim($content['answer_text'], ":");
      $answers = rtrim($answers, ":");
      $answers = explode("::", $answers);
    }else{
      $answers = 0;
    }

    $content['answer_text'] = $answers;

    if($content['page_id'] == 9){
      //localStorage ??
      $images = explode(',', $_POST['images']);
      $content['answer_imgs'] = $images;

    }else{
      //image name
      $images = ltrim($content['answer_imgs'], ":");
      $images = rtrim($images, ":");
      $images = explode("::", $images);

      $content['answer_imgs'] = $images;
    }

    if($content['page_id'] >= 9){
      $content['page_id'] = '9';
    }


    return $content;

  }

  public function setAnswers()
  {
    //Aus session user id
    // $user_id = sessions::get['user_id']

    $user_id = '40';
    $answers = $_POST['answers'];

    $stmt = $this -> db -> prepare("UPDATE users SET box_answers = ? WHERE id = ? ");
    $stmt -> bind_param("si", $answers,$user_id);
    $stmt -> execute();
    $stmt -> close();

  }
}
