<?php


class Auth extends Controller 
{
    public function __construct()
    {
        if (!isset($_COOKIE['user'])) {
            return Helper::redirect('admin/login');
        }



    }
}