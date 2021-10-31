<?php

class UserModel extends DB
{
    public function login($email) 
    {
        $sql = 'SELECT * from users where email = "' . $email .'"';

        return $this->fetch($sql);
        
    }
}