<?php

class products extends controller{

    public function index()
    {

      $this -> view -> data['categories'] = $this -> model -> getAllCategoeries();
      $this -> view -> data['products'] = $this -> model -> getAllProducts();

      $this -> view -> render('products/index', $this -> view -> data);
    }


    public function detail($product_id)
    {

      if($_SERVER['REQUEST_METHOD']=="POST" && !empty($_POST)) {
          $this -> proceed($product_id);
      }

      $token = uniqid();
      $this -> view -> data['token'] = $token;
      sessions::set('form-token', $token);

      $this -> view -> data['product'] = $this -> model -> getProduct($product_id);
      $this -> view -> data['comments'] = $this -> model -> getComments($product_id);

      $this -> view -> render('products/detail', $this -> view -> data);
    }

    public function getProductsByCategorie($categorie_id)
    {
      $this -> view -> data['categories'] = $this -> model -> getAllCategoeries();
      $this -> view -> data['products'] = $this -> model -> getProductsByCategorie($categorie_id);

      $this -> view -> render('products/index', $this -> view -> data);

    }

    public function proceed($product_id)
    {

      if(sessions::get('form-token') == $_POST['token']){

        $this -> view -> data['errors'] = [];

        $val = new validator();
        $val -> val($_POST['comment'], "Kommentar", true, "text", 3, 200);

        if(count($val -> getErrors()) > 0) {

        $this -> view -> data['errors'] = $val -> getErrors();
        }else{
          if($this -> model -> checkIfCommentExist($_POST['comment']) == true) {
            echo 'Ist gleich';
            array_push($this -> view -> data['errors'], "Das Kommentar wurde bereits geschrieben.");
          }
          elseif(isset($this->view->data['errors']) && count($this->view->data['errors']) > 0){
              return false;
            
          }else{
            $this -> model -> setComment($product_id, $_POST['comment']);
            //Headerlocation

          }

        }

      }

    }

}
