<?php

class BannerModel extends DB 
{
    public function get()
    {
        $sql = "SELECT thumb 
                from banner where active = 1";

        return $this->query($sql);
    }

}