<?php

class home extends controller{

    public function index()
    {
        $this -> view -> data ['products'] = $this -> model -> getFeaturedProducts();
        $this -> view -> render('home/index', $this -> view -> data);
    }

    public function show($id = null)
    {
        $this -> view -> render('home/show');
    }
}
