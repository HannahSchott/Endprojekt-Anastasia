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
        $this -> saveEdit($product_id);
    }

    $product_categorie = $this -> model ->  getProductCategorie($product_id);
    $categories = $this -> model -> getAllCategoriesBackend();
    $product = $this -> model -> getProduct($product_id);


    $html = "<label for='categorie'>Kategorie</label><select name='categorie'>";


    foreach($categories as $categorie){

      $html .= "<option value=".$categorie['id'];

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

  public function saveEdit($product_id)
  {
    $this -> view -> data['errors'] = [];

    // Validation
    $val = new validator();
    $val -> val($_POST['name'], "Name", true, "text", 6, 50);
    $val -> val($_POST['description'], "Beschreibung", true, "text", 20,500);
    $val -> val($_POST['link'], "Link", true, "textnumber", 20);
    $val -> val($_POST['price'], "Preis", true, "number", 2,4);
    $val  -> val($_POST['month'], "Monat", true, "number", 2, 2);
    $val -> val($_POST['year'], "Jahr", true, "number", 2,2);

    if(count($val -> getErrors()) > 0) {
      $this -> view -> data['errors'] = $val -> getErrors();
    }else{
      if(isset($this->view->data['errors']) && count($this->view->data['errors']) > 0){
          return false;
      }

      $this -> model -> saveEdit($product_id);

      header('Location:'.APP_ROOT.'backend/products/success');
      exit();
    }
  }

  public function newProduct()
  {

    if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
        $this -> saveNewProduct();
    }
    $categories = $this -> model -> getAllCategoriesBackend();

    $html = "<label for='categorie'>Kategorie</label><select name='categorie'>";


    foreach($categories as $categorie){

      $html .= "<option value=".$categorie['id'].">".$categorie['name']."</option>";
    }

    $html .= "</select>";

    $this -> view -> data['categories'] = $html;
    $this -> view -> render('products/newProduct', $this -> view -> data, $includeAll = false);
  }

  public function saveNewProduct()
  {
    $this -> view -> data['errors'] = [];
    // Validation
    $val = new validator();
    $val -> val($_POST['name'], "Name", true, "text", 6, 50);
    $val -> val($_POST['description'], "Beschreibung", true, "text", 20,500);
    $val -> val($_POST['link'], "Link", true, "textnumber", 20);
    $val -> val($_POST['price'], "Preis", true, "number", 2,4);
    $val  -> val($_POST['month'], "Monat", true, "number", 2, 2);
    $val -> val($_POST['year'], "Jahr", true, "number", 2,2);

    if(count($val -> getErrors()) > 0) {
      $this -> view -> data['errors'] = $val -> getErrors();
    }else{
      if(isset($this->view->data['errors']) && count($this->view->data['errors']) > 0){
          return false;
      }

      $result = $this -> model -> saveNewProduct();

      // var_dump($result);

      header('Location:'.APP_ROOT.'backend/products/success');
      exit();
    }
  }

  public function delete($product_id)
  {
    $this -> model -> deleteProduct($product_id);
    $this -> success();
  }


  public function success()
  {
    $this -> view -> data['products'] = $this -> model -> getAllProductsBackend();
    $this -> view -> data['success'] = "Änderungen erfolgreich";
    $this -> view -> render('products/index', $this -> view -> data, $includeAll = false);
  }
}
