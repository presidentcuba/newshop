<?php

class CartModel extends DB 
{
    public function getCustomer($limit, $offset)
    {
        $sql = "SELECT *  from customer order by is_view asc, id desc limit " .$limit. " offset " .$offset. "";

        return $this->query($sql);
    }

    public function num()
    {
        return $this->numRows('select id from customer');
    }
    public function showCustomer($id) 
    {
        return $this->fetch("select * from customer where id = " . $id . " ");
    }

    public function getCart($customerId = 0)
    {
        return $this->query("select * from cart where customer_id = " . $customerId . " ");
    }

    public function updateCustomer($id = 0)
    {
        return $this->query('update customer set is_view = 1 where id = ' .$id);
    }

}