<?php


class CartController extends Auth 
{
    protected $cartModel;

    public function __construct() 
    {
        parent::__construct();
        $this->cartModel = $this->loadModel('Admin/CartModel');
    }
    public function lists()
    {
        $data['title'] = 'Danh Sách Đơn Hàng Mới';

        #Xử lý Phân Trang
        $limit = 5;
        $page = 1;

        if (isset($_GET['page']) && $_GET['page'] > 1) {
            $page = intval($_GET['page']);
        }
        $offset = ($page - 1 ) * $limit;

        #Tính tổng số Row
        $numRows = $this->cartModel->num();
        $sumPage = ceil($numRows / $limit);

        $data['page'] = page($sumPage, '/admin/cart/lists');

        $data['customers'] = $this->cartModel->getCustomer($limit, $offset);

        $data['template'] = 'cart/list';
        return $this->loadView('admin/main', $data);
    }
    public function view($id = 0)
    {
        $customer = $this->cartModel->showCustomer($id);

        if ($customer) {
            $cart = $this->cartModel->getCart($id);

            $data['title'] = 'Đơn Hàng: ' . Helper::decodeSafe($customer['name']);
            $data['customer'] = $customer;
            $data['cart'] = $cart;
            $data['template'] = 'cart/content';

            // Update is_view
            $this->cartModel->updateCustomer($id);

            return $this->loadView('admin/main', $data);
        }
    }
}