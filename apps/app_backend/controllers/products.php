<?php

class products extends controller{

  public function index()
  {

    $this -> view -> data['products'] = $this -> model -> getAllProductsBackend();
    $this -> view -> render('products/index', $this -> view -> data, $includeAll = false);
  }

  public function edit($product_id)
  {
    $this -> view -> data['product'] = $this -> model -> getProduct($product_id);

    $form = new formbuilder('edit', 2);

    $form -> addInput("text", "label_name", "Firmen Name")
          -> addInput("text", "product_name", "Produkt Name")
          -> addTextarea("decription", "Beschreibung", $value = "", $attr = array())
          -> addInput("file", "picture", "Bild")
          -> addButton("submit", "speichern", array("class" => "register-button"));

          // ($type = "text", $name = "", $label = false, $attr = array())

    $this -> view -> data['form'] = $form -> output();

    $this -> view -> render('products/edit', $this -> view -> data, $includeAll = false);
  }
}
