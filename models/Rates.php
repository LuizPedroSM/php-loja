<?php
class Rates extends Model 
{
    public function getRates($id, $qt)
    {
        $array = array();

        $sql = "SELECT *,
        (SELECT users.name from users WHERE users.id = rates.id_user) as user_name
         FROM rates WHERE id_product = :id ORDER BY date_rated DESC LIMIT ".$qt;
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return $array;
    }
}
