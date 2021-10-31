<?php

class MainController extends Auth
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index() 
    {
        $data['title'] = 'Trang Quản Trị Viên Administrator';
        $data['template'] = 'home';


        return $this->loadView('admin/main', $data);
    }
    public function logout() 
    {
        setcookie("user", "", time() - (86400 * 30), "/");
        return Helper::redirect('admin/login');
    }
}