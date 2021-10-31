<?php

class CartModel extends DB 
{
    public function getProduct($id)
    {
        $sql = "SELECT id, title, price, sale_price, thumb from products
                where active = 1 && id = " . $id . " && price !=0
        ";

        return $this->fetch($sql);
    }

    public function addCustomer($name, $phone, $address, $email, $content) 
    {
        $sql = "INSERT into customer 
                            (name, phone, address, email, content, time_create, is_view)
                      values
                            ('" . $name . "', '" . $phone . "','" . $address . "','" . $email . "', '" . $content . "', ". time() .", 0)";
         return $this->getLastId($sql);
    }
//    public function insertCart($sqlOld) {
//        $sql = "INSERT into cart (customer_id, thumb, name, price, number, product_id) values " . $sqlOld;

//        return $this->query($sql);
//    }

   public function insertCart($sqlOld)
   {
       $sql = "INSERT into cart (customer_id, thumb, name, price, number, product_id) values " . $sqlOld ." " ;

       return $this->query($sql);
   }
}