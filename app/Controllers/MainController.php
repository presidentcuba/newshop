<?php

class MainController extends Controller
{
    protected $productModel;
    protected $bannerModel;
    public function __construct()
    {
        $this->productModel = $this->loadModel('ProductModel');
        $this->bannerModel = $this->loadModel('bannerModel');
    }

    public function index()
    {
        $data['title'] = 'Web Bán Hàng Bằng Mô Hình MVC';
        $data['products'] = $this->productModel->get();
        $data['banner'] = $this->bannerModel->get();
        $data['template'] = 'home';
        return $this->loadView('main', $data);
    }
}