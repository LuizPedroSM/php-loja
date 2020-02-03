<?php
class Purchases extends model 
{
    public function createPurchase($uid, $total, $payment_type)
    {
        $sql = "INSERT INTO purchases 
        (id_user, total_amount, payment_type, payment_status) VAlUES 
        (:uid, :total, :type, 1)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":uid", $uid);
        $sql->bindValue(":total", $total);
        $sql->bindValue(":type", $payment_type);
        $sql->execute();
        
        return $this->db->lastInsertId();
    }

    public function addItem($id, $id_product, $qt, $price)
    {
        $sql = "INSERT INTO purchases_products 
        (id_purchase, id_product, quantity, product_price) VAlUES 
        (:id, :idp, :qt, :price)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":idp", $id_product);
        $sql->bindValue(":qt", $qt);
        $sql->bindValue(":price", $price);
        $sql->execute();
    }
}
