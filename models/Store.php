<?php
class Store extends model 
{
    public function getTemplateData()
    {
        $data = array();
        $categories = new Categories();
        $products = new Products();
        $cart = new Cart();

        $data['categories'] = $categories->getList();

        $data['widget_featured1'] = $products->getList(0, 5, array('featured' => '1'), true);
        $data['widget_featured2'] = $products->getList(0, 3, array('featured' => '1'), true);
        $data['widget_sale'] = $products->getList(0, 3, array('sale' => '1'), true);
        $data['widget_toprated'] = $products->getList(0, 3, array('toprated' => '1'));

        if (isset($_SESSION['cart'])) {
            $qt = 0;
            foreach ($_SESSION['cart'] as $qtd) {
                $qt +=$qtd;
            }
            $data['cart_qt'] = $qt;
            // $data['cart_qt'] = count($_SESSION['cart']);

        } else {
            $data['cart_qt'] = 0;
        }

         $data['cart_subtotal'] = $cart->getSubtotal();
        return $data;
    }
}
