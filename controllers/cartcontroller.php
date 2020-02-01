<?php
class cartController extends controller 
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
        $cart = new Cart();

        if (
            !isset($_SESSION['cart']) ||
            (isset($_SESSION['cart']) && count($_SESSION['cart']) == 0)
        ) {
            header("Location: ".BASE_URL);exit;  
        }

        $data = $store->getTemplateData();    
        $data['list'] = $cart->getList();    


        $this->loadTemplate('cart', $data);
    }

    public function del($id)
    {
        if (!empty($id)) {
            unset($_SESSION['cart'][$id]);
        }
        header("Location: ".BASE_URL."cart");exit; 
    }

    public function add()
    {
        if (!empty($_POST['id_product'])) {
            $id = intval($_POST['id_product']);
            $qt = intval($_POST['qt_product']);

            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] +=$qt;
            } else {
                $_SESSION['cart'][$id] =$qt;                
            }
        }
        header("Location: ".BASE_URL."cart");exit;            
    }
}