<?php
class MenuModel extends DB 
{
    public function show($id)
    {
        $sql = 'select * from menus where active = 1 && id = ' . $id;
        return $this->fetch($sql);
    }

}