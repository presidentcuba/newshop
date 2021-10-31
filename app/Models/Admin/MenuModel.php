<?php

class MenuModel extends DB 
{
    public function insert($title, $description, $active) 
    {
        $sql = "INSERT into menus (title, description, active, created_at)
                            VALUES ('". $title ."', '". $description ."',  ". $active .", '". date('Y-m-d H:i:s') ."') ";

        return $this->query($sql);
    }

    public function get($limit, $offset)
    {
        $sql = "SELECT * from menus order by id desc limit ". $limit . " offset " . $offset . "";

        return $this->query($sql);
    }
    // public function get($limit, $offset)
    // {
    //     $sql = 'select * from menus order by id desc limit ' . $limit .' offset ' . $offset .'';

    //     return $this->query($sql);
    // }
    public function num()
    {
        $sql = "SELECT id from menus";
        return $this->numRows($sql);
    }

    public function show($id = 0)
    {
        $sql = "SELECT * from menus where id = " . $id . " ";
        return $this->fetch($sql);
    }

    public function  update($title, $description, $active, $id)
    {
        $sql = "update menus set title = '" . $title . "', description = '" . $description . "',
                                active = " . $active . " where id = " . $id . "";
        return $this->query($sql);                        
    }


    public function remove($id)
    {
        return $this->query("delete from menus where id = " . $id);
    }
}