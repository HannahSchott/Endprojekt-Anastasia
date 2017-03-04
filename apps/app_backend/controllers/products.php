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
    $categories = $this -> model -> getAllCategoriesBackend();
    $product = $this -> model -> getProduct($product_id);


    $html = "<label for='categorie'>Kategorie</label><select name='categorie'>";


    foreach($categories as $categorie){

      $html .= "<option value=".$categorie['name'];

      if($categorie['name'] == $product_categorie['categorie_name']){
        $html .= " selected";
      }

      $html .=">".$categorie['name']."</option>";
    }

    $html .= "</select>";

    $this -> view -> data['categories'] = $html;

    $date = explode('.', $product['month_id']);

    $month = $date[0];

    $year = $date[1];

    $product['month'] = $month;
    $product['year'] = $year;

    $this -> view -> data['product'] = $product;
    $this -> view -> render('products/edit', $this -> view -> data, $includeAll = false);
  }

  public function save_edit()
  {

  }
}
