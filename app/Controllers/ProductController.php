<?php

class ProductController extends Controller 
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = $this->loadModel('ProductModel');
    }
    public function view($id)
    {
        $product = $this->productModel->show($id);
        if ($product) {

            $data['title'] = Helper::decodeSafe($product['title']);
            $data['template'] = 'product/content';
            $data['product'] = $product;
           
            $data['slider'] = $this->productModel->getSlider($id);

            $data['productMores'] = $this->productModel->more($product);
            
            return $this->loadView('main', $data);
        }
        return Helper::redirect();
    }
}