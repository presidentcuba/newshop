<?php

class MenuController extends Controller 
{
    protected $menuModel;
    protected $productModel;

    public function __construct()
    {
        $this->menuModel = $this->loadModel('MenuModel');
        $this->productModel = $this->loadModel('ProductModel');
    }
    public function view($id = 0)
    {
        $menu = $this->menuModel->show($id);
        if ($menu) {
           
            $data['title'] = ucfirst($menu['title']);
            $data['menu'] = $menu;
            $data['filter'] = 1;
             #Xử lý Phân Trang
            $limit = 6;
            $page = 1;

            if (isset($_GET['page']) && $_GET['page'] > 1) {
                $page = intval($_GET['page']);
            }
            $offset = ($page - 1 ) * $limit;

            #Tính tổng số Row
            $numRows = $this->productModel->num($id);
            $sumPage = ceil($numRows / $limit);

            #End Phân trang

            $data['products'] = $this->productModel->get($limit, $offset);
            $data['page'] = page($sumPage, '/danh-muc/' . $id .'/' . Helper::slug($menu['title']) . '');

            $data['products'] = $this->productModel->getAll($id, $limit, $offset);
            $data['template'] = 'menu';

            return $this->loadView('main', $data);
        }
        return Helper::redirect();
    }
}