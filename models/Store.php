<?php
class Store extends model 
{
    public function getTemplateData()
    {
        $data = array();
        $categories = new Categories();
        $products = new Products();

        $data['categories'] = $categories->getList();

        $data['widget_featured1'] = $products->getList(0, 5, array('featured' => '1'), true);
        $data['widget_featured2'] = $products->getList(0, 3, array('featured' => '1'), true);
        $data['widget_sale'] = $products->getList(0, 3, array('sale' => '1'), true);
        $data['widget_toprated'] = $products->getList(0, 3, array('toprated' => '1'));

        return $data;
    }
}
