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

    if($content['page_id'] === 9){
      $content['answer_imgs'][] = $_SESSION['page_3'];
      $content['answer_imgs'][] = $_SESSION['page_4'];
      $content['answer_imgs'][] = $_SESSION['page_5'];
      $content['answer_imgs'][] = $_SESSION['page_6'];
      $content['answer_imgs'][] = $_SESSION['page_7'];
      $content['answer_imgs'][] = $_SESSION['page_8'];

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

  public function setAnswerSession(){

// mit SESSION
    // $page = 'page_';
    // $page .= $_POST['page'];
    // $name = $_POST['name'];
    //
    // if($page == 'page_1' || $page >= 'page_9'){
    //   return false;
    // }else{
    //   sessions::set($page, $name);
    //   return $_POST['page'];
    // }

  }

  public function setAnswer(){

    if(isset($_POST['answer'])){

      // hier session mit user_id abfragen!!!!
      $user_id = '37';

      $res = $this -> db -> query("SELECT box_answers FROM users WHERE id = '$user_id'");

      $answers = $res -> fetch_assoc();

      if($answers['box_answers'] == NULL){

        $box_answer = ":".$_POST['answer'].":";

        $stmt = $this -> db -> prepare("UPDATE users SET  box_answers = ?  WHERE id = '$user_id'");
        $stmt -> bind_param("s", $box_answer);
        $stmt -> execute();

        $stmt -> close();

        return true;
  


        }else{

          $box_answer = $answers['box_answers'].":".$_POST['answer'].":";

          $stmt = $this -> db -> prepare("UPDATE users SET  box_answers = ?  WHERE id = '$user_id'");
          $stmt -> bind_param("s", $box_answer);
          $stmt -> execute();

          $stmt -> close();

          return true;
          return $_POST['answer'];
          return "Es gibt schon einen Eintrag";
        }
    }else{
      return false;
    }

  }

  public function setAnswers($user_id, $box_answer){


  }
}
