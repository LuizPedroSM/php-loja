<?php
class Filters  extends model
{
    public function getFilters($filters)
    {
        $products = new Products();
        $brands = new Brands();

        $array = array(
            'brands' => array(),
            'maxslider' => 1000,
            'stars' => array(
                '0' => 0,
                '1' => 0,
                '2' => 0,
                '3' => 0,
                '4' => 0,
                '5' => 0
            ),
            'sale' => 0,
            'options' => array()
        );
        
        $array['brands'] = $brands->getList();
        $brand_products = $products->getListOfBrands($filters);

        //criando o filtro de Marcas
        foreach ($array['brands'] as $bkey => $bitem) {

            $array['brands'][$bkey]['count'] = '0';

            foreach ($brand_products as $bproduct) {
                if ($bproduct['id_brand'] == $bitem['id']) {
                    $array['brands'][$bkey]['count'] = $bproduct['c'];
                }
            }

            if ($array['brands'][$bkey]['count'] == '0') {
                unset($array['brands'][$bkey]);
            }
        }

        //Criando o filtro de Preços
        $array['maxslider'] = $products->getMaxPrice($filters);

        //Criando filtro das Estrelas
        $star_products = $products->getListOfStars($filters);
        foreach ($array['stars'] as $skey => $sitem) {
            foreach ($star_products as $sproduct) {
                if ($sproduct['rating'] == $skey) {
                    $array['stars'][$skey] = $sproduct['c'];
                }
            }
        }

        //Criando filtro das Promoções
        $array['sale'] = $products->getSaleCount($filters);

        //Criando filtro das Opções
        $array['options'] = $products->getAvailableOptions($filters);

        return $array;
    }
}
