<?php

class order extends controller{
  public function index()
  {

    $this -> view -> data['orders'] =  $this ->  model -> getOrders();
    $this -> view -> render('order/index', $this -> view -> data, $includeAll = false);
  }

  public function detail($order_id)
  {
     $order = $this -> model -> getOrder($order_id);

     $adress = ltrim($order['adress'], ":");
     $adress = rtrim($adress, ":");
     $adress = explode("::", $adress);

     $order['adress'] = $adress;

     $this -> view -> data['order'] = $order;
     $this -> view -> render('order/detail', $this -> view -> data, $includeAll = false);
  }

  public function setOrderStatus($status_id)
  {
    $status = $this -> model -> setOrderStatus($status_id);
    if($status == true){
      return true;
    }else{
      return false;
    }
  }

  public function deletOrder($order_id)
  {
    $this -> model -> deletOrder($order_id);

      $this -> index();

  }
}
