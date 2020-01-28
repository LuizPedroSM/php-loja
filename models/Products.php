<?php
class Products  extends model
{
    public function getList($offset = 0, $limit = 3)
    {
        $array = array();
        $sql = "SELECT *,
        (SELECT brands.name FROM brands WHERE brands.id = products.id_brand) as brand_name,
        (SELECT categories.name FROM categories WHERE categories.id = products.id_category) as category_name        
         FROM products LIMIT $offset, $limit";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();

            // $brands = new Brands();
            // foreach ($array as $key => $item) {
            //     $array[$key]['brand_name'] = $brands->getNameById($item['id_brand']);
            // }
            foreach ($array as $key => $item) {
                $array[$key]['images'] = $this->getImagesByProductId($item['id']);
            }
        }

        return $array;
    }

    public function getTotal()
    {
        $sql = "SELECT COUNT(*) as c FROM products";
        $sql = $this->db->query($sql);
        $sql = $sql->fetch();
        return $sql['c'];
    }

    public function getImagesByProductId($id)
    {
        $array = array();

        $sql = "SELECT url FROM products_images WHERE id_product = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}
