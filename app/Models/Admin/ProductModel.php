<?php

class ProductModel extends DB 
{
    public function getMenu()
    {
        return $this->query("SELECT * from menus where active = 1");
    }

    public function insert($ar)
    {
        $sql = "insert into products (title, menu_id, price, sale_price, description, content, active, thumb, created_at) 
            values ('". $ar['title'] ."', ". $ar['menu_id'] .", ". $ar['price'] .", ". $ar['sale_price'] .", 
            '". $ar['description'] ."', '". $ar['content'] ."', ". $ar['active'] .", '". $ar['thumb'] ."', 
            ". $ar['created_at'] . ") ";
            
        return $this->query($sql);
    }

    public function num()
    {
        $sql = "SELECT id from products";
        return $this->numRows($sql);
    }

    public function get($limit, $offset)
    {
        $sql = 'SELECT products.id, products.title, products.thumb, products.active, menus.title as menu_title from products JOIN menus on menus.id = products.menu_id
                order by id desc limit '. $limit .' offset '.$offset;
        return $this->query($sql);
    }

    public function show($id)
    {
        $sql = "SELECT * from products where id = " .$id;
        
        return $this->fetch($sql);
    }

    public function update($ar, $id)
    {
        $sql = "UPDATE products set 
            title = '". $ar['title'] ."', menu_id = ". $ar['menu_id'] .", price = ". $ar['price'] .", 
            sale_price = ". $ar['sale_price'] .", description = '". $ar['description'] ."', 
            content = '". $ar['content'] ."', active = ". $ar['active'];
        
        if (isset($ar['thumb']) && $ar['thumb'] != '/') {
            $sql .= " , thumb = '". $ar['thumb'] ."'" ;
        }
            
        $sql .=" where id = " . $id;
   
        return $this->query($sql);
    }

    public function updateslider($ar, $id)
    {
        $sql = "insert into product_slider (title, url, product_id) 
        values ('". $ar['title'] ."', '". $ar['url'] ."', ". $ar['product_id'] .")";

        return $this->query($sql);
    }

    public function remove($id)
    {
        return $this->query('delete from products where id = ' .$id);
    }
    

}