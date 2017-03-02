<?php

class order_model extends model{


  public function setOrder($abo_id, $data)
  {
    $adress = $data['adress'];
    $number = $data['number'];
    $zip = $data['zip'];
    $city = $data['city'];
    $country = $data['country'];
    $payment = $data['payment'];

    
  }
}
