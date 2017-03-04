<?php

class products extends controller{

  public function index()
  {

    $this -> view -> data['products'] = $this -> model -> getAllProductsBackend();
    $this -> view -> render('products/index', $this -> view -> data, $includeAll = false);
  }

  public function edit($product_id)
  {

    if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
        $this -> save_edit();
    }
    $product_categorie = $this -> model ->  getProductCategorie($product_id);
    $product = $this -> model -> getProduct($product_id);
    $categories = $this -> model -> getAllCategoeries();
    $this -> view -> data['product'] = $product;


    foreach($categories as $categorie){

    }


    $this -> view -> render('products/edit', $this -> view -> data, $includeAll = false);
  }

  public function save_edit()
  {

  }
}
