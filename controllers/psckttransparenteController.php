<?php
class psckttransparenteController extends controller 
{
	private $user;

    public function __construct() 
    {
        parent::__construct();
    }

    public function index() 
    {        
        $store = new Store();        
        $products = new Products();

        $data = $store->getTemplateData();   
        $this->loadTemplate('cart_psckttransparente', $data);
    }
}