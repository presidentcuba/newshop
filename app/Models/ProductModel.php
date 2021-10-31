<?php

class ProductModel extends DB
{
    public function get()
    {
        $sql = "SELECT id, title, price, sale_price, thumb 
                from products where active = 1 order by id desc limit 6";

        return $this->query($sql);
    }

    public function getAll($menuId, $limit, $offset)
    {
        $sql = "SELECT id, title, price, sale_price, thumb 
                from products where active = 1 && menu_id = " . $menuId . " 
                order by id desc limit " . $limit . " offset " . $offset . "
                ";

        return $this->query($sql);
    }

    public function num($menuId)
    {
        $sql = 'select id from products where active = 1 && menu_id = ' . $menuId;

        return $this->numRows($sql);
    }

    public function show(int $id)
    {
        return $this->fetch("select * from products where id = " . $id . "  && active = 1");
    }

    public function getSlider($id)
    {
        $sql = "select * from product_slider where product_id = " . $id . " order by id desc limit 6";
       
        return $this->query($sql);
    }

    public function more($product)
    {
        return $this->query("select id, title, price, sale_price, thumb  
                        from products 
                        where id != " . $product['id'] ." && menu_id = ".$product['menu_id']." 
                        order by id desc limit 3");
    }

    public function search($key = '', $limit = 10, $offset = 0)
    {
        $sql = "SELECT id, title, price, sale_price, thumb 
                from products where active = 1 
                and (title like '%" .$key. "%' 
                        or description like '%" .$key. "%' 
                        or content like '%" .$key. "%' )
                order by id desc limit " .$limit. " offset " .$offset. " ";

        return $this->query($sql);
    }

    public function numSearch($key = '')
    {
        $sql = "SELECT id
                from products where active = 1 
                and (title like '%" .$key. "%' 
                        or description like '%" .$key. "%' 
                        or content like '%" .$key. "%' )";

        return $this->numRows($sql);
    }

    public function filter($soA, $soB, $limit, $offset)
    {
        $sql = "SELECT id, title, price, sale_price, thumb 
                from products where active = 1 
                and ( 
                    price between " .$soA. " and " .$soB. "
                    or 
                    sale_price between " .$soA. " and " .$soB. " 
                )
                order by id desc  limit " .$limit. " offset " .$offset. " ";

        return $this->query($sql);
    }

    public function numFilter($soA, $soB)
    {
        $sql = "SELECT id
                from products where active = 1 
                and ( 
                    price between " .$soA. " and " .$soB. " or sale_price between " .$soA. " and " .$soB. " 
                ) ";

        return $this->numRows($sql);
    }
}