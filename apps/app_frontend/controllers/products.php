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

        var_dump($_POST);
        $this -> model -> setComment($product_id, $_POST['comment']);
      }
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

}
