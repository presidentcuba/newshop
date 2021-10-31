<?php

class SliderModel extends DB 
{
    public function insert($d)
    {
        $sql = "INSERT into sliders (title, url, active, sort_by, thumb)
                        values ('".$d['title']."', '".$d['url']."', ".$d['active'].", ".$d['sort'].", '".$d['thumb']."')";
               
        return $this->query($sql);
        
    }

    public function num()
    {
        return $this->numRows("select id from sliders");
    }

    public function get($limit, $offset)
    {
        return $this->query('select * from sliders order by id desc limit '. $limit .' offset ' . $offset . ' ');
    }

    public function show($id)
    {
        $sql = "SELECT * from sliders where id = ". $id . "";

        return $this->fetch($sql);
       
    }
    public function update($d, $id)
    {
        $sql = "update sliders set title = '".$d['title']."', url = '".$d['url']."',
                                     active = ".$d['active'].", sort_by = ".$d['sort_by']."";

        if (isset($d['thumb']) && $d['thumb'] != '')  {
            $sql .= ", thumb = '" . $d['thumb'] . "' ";
        } 

        $sql .= "where id = " . $id ."";                     

        return $this->query($sql);
    }

    public function remove($id)
    {
        return $this->query('delete from sliders where id = ' . $id .'');
    }
   

}