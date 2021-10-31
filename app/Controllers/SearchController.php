<?php


class SearchController extends Controller
{
    protected $productModel;
    public function __construct()
    {
        $this->productModel = $this->loadModel('ProductModel');
    }

    public function index()
    {
        $key = isset($_GET['key']) ? Helper::makeSafe($_GET['key']) : '';
        if ($key) {

            #Xử lý Phân Trang
            $limit = 9;
            $page = 1;

            if (isset($_GET['page']) && $_GET['page'] > 1) {
                $page = intval($_GET['page']);
            }
            $offset = ($page - 1 ) * $limit;

            #Tính tổng số Row
            $numRows = $this->productModel->numSearch($key);
            $sumPage = ceil($numRows / $limit);
            #End Phân trang

            $data['page'] = page($sumPage, '/tim-kiem.html?key=' . $key);
            $data['products'] = $this->productModel->search($key, $limit, $offset);
            $data['title'] = 'Tìm Kiếm: ' . $key;
            $data['template'] = 'search';

            return $this->loadView('main', $data);
        }

        return Helper::redirect();
    }

    public function search()
    {
        $soA = ((isset($_GET['start']) && $_GET['start'] > 0) ? intval($_GET['start']) : 0);
        $soB = ((isset($_GET['end']) && $_GET['start'] > 0) ? intval($_GET['end']) : 0);

        if ($soA == 0 && $soB == 0) {
            return Helper::redirect();
        }

        #Xử lý Phân Trang
        $limit = 9;
        $page = 1;

        if (isset($_GET['page']) && $_GET['page'] > 1) {
            $page = intval($_GET['page']);
        }
        $offset = ($page - 1 ) * $limit;

        #Tính tổng số Row
        $numRows = $this->productModel->numFilter($soA, $soB);
        $sumPage = ceil($numRows / $limit);
        #End Phân trang

        $data['page'] = page($sumPage, '/loc-san-pham.html?start=' . $soA . '&end=' . $soB);

        $data['filter'] = 1;
        $data['products'] = $this->productModel->filter($soA, $soB, $limit, $offset);
        $data['title'] = 'Tìm Kiếm Giá Từ ' . $soA . ' => ' . $soB;
        $data['template'] = 'search';

        return $this->loadView('main', $data);
    }
}