<?php

class BannerModel extends DB 
{
    public function insert($ar)
    {
        $sql = "insert into banner (title, active, thumb, created_at) 
            values ('". $ar['title'] ."',". $ar['active'] .", '". $ar['thumb'] ."', ". $ar['created_at'] . ") ";
            
        return $this->query($sql);
    }
    public function show($id)
    {
        $sql = "SELECT * from banner where id = " .$id;
        
        return $this->fetch($sql);
    }
    public function get()
    {
        $sql = "SELECT * from banner where active = 1";
        

        return $this->query($sql);
    }

    public function update($ar, $id)
    {
        $sql = "UPDATE banner set 
            title = '". $ar['title'] ."', active = ". $ar['active'];
        
        if (isset($ar['thumb']) && $ar['thumb'] != '/') {
            $sql .= " , thumb = '". $ar['thumb'] ."'" ;
        }
            
        $sql .=" where id = " . $id;
  
        return $this->query($sql);
    }

    public function remove($id)
    {
        return $this->query('delete from banner where id = ' .$id);
    }
}