<?php

class App
{
    protected $controller = 'Main'; #Controller mặt định
    protected $action = 'index'; #Action mặt định
    protected $param = [];
    protected $queryArray;

    public function __construct()
    {
        $this->queryArray = $this->queryHandle();

        $pathController = $this->controller($this->queryArray);

        #Nếu tồn tại File Controller
        if (file_exists('./app/Controllers/' . $pathController . 'Controller.php')) {
            $this->controller = $pathController;
        }

        #Xử lý Controller
        $this->controller = $this->controllerHandle($this->controller);

        #Load file Controller
        if (!file_exists('./app/Controllers/' . $this->controller .'Controller.php')) {
            throw new Exception('Error 404');
        }
        
        include './app/Controllers/' . $this->controller .'Controller.php';

        $loadController = explode("/", $this->controller);
        $loadController = end($loadController) . 'Controller';
        $this->controller = new $loadController;

        #Action
        if (!is_null($this->queryArray) && count($this->queryArray) > 0) {

            #Kiểm tra trong Controller có method hay không
            if (method_exists($this->controller, $this->queryArray[0])) {
                $this->action = $this->queryArray[0];
            }

            unset($this->queryArray[0]);
        }

        $paramArray = $this->queryArray ? array_values($this->queryArray) : [];
        call_user_func_array([$this->controller, $this->action], $paramArray);
    }

    #Xử lý MainController
    protected function controllerHandle($controller = '')
    {
        $queryArray = $this->queryHandle();

        #Nếu controller là Main và query không NULL
        if ($controller == 'Main' && !is_null($queryArray)) {
            $pathController = '';

            foreach ($queryArray as $key => $query) {
                $pathController .= ucfirst($query) . '/';
            }
            return $pathController. 'Main';
        }

        return $controller;
    }

    #Xử lý chuỗi thành mảng
    protected function queryHandle()
    {
        if (isset($_GET['query']) && $_GET['query'] != '') {

            $arrayQuery = explode("/", filter_var(trim($_GET['query'], "/")));

            if (isset($GLOBALS['env_routes'][$arrayQuery[0]])) {
                $arrayQuery[0] = $GLOBALS['env_routes'][$arrayQuery[0]];
            }
            $implode = implode("/", $arrayQuery);
            
            return explode("/", $implode);
        }

        return null;
    }

    #Xử lý Controller
    protected function controller($array, $path = '') /* = product/edit/2/*/
    {
        if (is_null($array)) {
            return false;
        }

        $path = $path == '' ? './app/Controllers' : $path;

        foreach ($array as $key => $value) {
            
            $pathController = $path . '/' . ucfirst($value);

            if (!is_dir($pathController)) { #Không phải thư mục
                  
                unset($array[$key]); #Xóa phần tử để dễ xử lý tới action

                $this->queryArray = array_values($array); #Cập nhật lại query mới

                return str_replace('./app/Controllers/', '', $pathController);
            }

            unset($array[$key]); #Xóa phần tử để dễ xử lý tới Controller

            return $this->controller($array, $pathController);
        }
    }
}