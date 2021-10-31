<?php

class LoginController extends Controller 
{

    protected $userModel;

    public function __construct()
    {   
        if (isset($_COOKIE['user'])) {
            return Helper::redirect('admin/main');
        }
        $this->userModel = $this->loadModel('Admin/UserModel');

    }
    public function index() {
        $data['title'] = 'Đăng Nhập Hệ Thống';
        return $this->loadView('admin/login/login', $data);
    }

    public function store() 
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = isset($_POST['email']) ? Helper::makeSafe($_POST['email']) : '';
            $password = isset($_POST['password']) ? Helper::makeSafe($_POST['password']) : '';

            if ($email == '' || $password == '') {
                Helper::flash('errors', 'Vui lòng nhập đầy đủ thông tin');
                return Helper::redirect('admin/login');
            }
         
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Helper::flash('errors', 'Địa chỉ email không đúng định dạng');
                return Helper::redirect('admin/login');
            }

            $user = $this->userModel->login($email);
            if (!$user) {
                Helper::flash('errors', 'Email không tồn tại');
                return Helper::redirect('admin/login');
            }
            if (!password_verify($password, $user['password'])) {
                Helper::flash('errors', 'Mật khẩu không đúng');
                return Helper::redirect('admin/login');
            }
            #Nếu đăng nhập thành công
            setcookie('user', $email, time() + (86400 * 30), "/"); 
            return Helper::redirect('admin');
        }
         return Helper::redirect('admin/login');
    }
}