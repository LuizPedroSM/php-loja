<?php
class Users extends model 
{
    public function emailExists($email)
    {
        $sql = "SELECT * FROM users WHERE email =:email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {            
            return false;
        }
    }

    public function validate($email, $pass)
    {
        $uid = '';
        $sql = "SELECT * FROM users WHERE email =:email AND password =:pass";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":pass", $pass);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $uid = $sql['id'];
        }

        return $uid;
    }

    public function createUser($email, $pass, $name)
    {
        $sql = "INSERT INTO users (email, password, name) VALUES (:email, :pass, :name)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":pass", $pass);
        $sql->bindValue(":name", $name);
        $sql->execute();
        return $this->db->lastInsertId();
    }
}
