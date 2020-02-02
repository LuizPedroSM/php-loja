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

        try {
            $sessionCode = \PagSeguro\Services\Session::create(
                \PagSeguro\Configuration\Configure::getAccountCredentials()
            );
            $data['sessionCode'] = $sessionCode->getResult();
        } catch (Exception $e) {
            echo "ERRO ".$e->getMessage();exit;
        }
         
        $this->loadTemplate('cart_psckttransparente', $data);
    }
}