<?php

class anastasia extends controller{

    public function index()
    {
      if(!isset($page_id)){
        $page_id = 0;
      }
      $this -> view -> data['page_id']=$page_id;
      $this -> view -> render('anastasia/index',$this -> view -> data);
    }

    public function getPageContent($page_id)
    {
      $content = $this -> model -> getPageContent($page_id);

      $this -> view -> data['page_id']=$page_id;
      $this -> view -> data['question'] = $content['question'];
      $this -> view -> data['images'] = $content['answer_imgs'];
      $this -> view -> data['answers'] = $content['answer_text'];

      $this -> view -> render('anastasia/index', $this -> view -> data);
    }

    public function setAnswers(){

      $this -> model -> setAnswers();
    }

}
