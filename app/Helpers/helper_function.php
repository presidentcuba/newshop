<?php

function price($price = 0, $salePrice = 0)
{
    if ($price != 0 && $salePrice != 0) return number_format($salePrice) . '<sup>đ</sup>';

    if ($price != 0) return number_format($price) . '<sup>đ</sup>';

    return '<a href="/lien-he">Liên Hệ</a>';
}

function productSale()
{
    $db = new DB();

    return $db->query("SELECT id, title, price, sale_price, thumb 
                        from products where active = 1 && sale_price != 0 
                        order by sale_price asc limit 5");
}

function getSlider()
{
    $db = new DB();
    return $db->query('SELECT * from sliders where active = 1 order by sort_by desc');
}

function getMenu()
{
    $db = new DB();
    return $db->query('SELECT * from menus where active = 1');
}

function getPathFolder($path = '')
{
    $year = date("Y");
    $month = date("m");
    $day = date("d");

    $path = 'upload/' . $path . '/';

    if (!is_dir($path . $year)) { #Chưa có thư mục
        mkdir($path . $year, 0755);
    }

    if (!is_dir($path . $year . '/' . $month)) { #Chưa có thư mục
        mkdir($path . $year . '/' . $month, 0755);
    }

    if (!is_dir($path . $year . '/' . $month . '/' . $day)) { #Chưa có thư mục
        mkdir($path . $year . '/' . $month . '/' . $day, 0755);
    }

    return $path . $year . '/' . $month . '/' . $day . '/';
}

if (!function_exists('activeAdmin')) {

    function activeAdmin($number = 0)
    {
        if ($number == 0) return '<span class="badge bg-danger">Không Kích Hoạt</span>';

        return '<span class="badge bg-success">Kích Hoạt</span>';
    }
}


if (!function_exists('page')) {

    function page($sumPage, $link ='')
    {
        #Update
        $char = strpos($link, "?") != false ? '&' : '?';

        
        $html = '<ul class="pagination pagination-sm m-0 float-right">';
        $html .= '<li class="page-item"><a class="page-link" href="' . $link . $char . 'page=1">Về Đầu</a></li>';

        $pageNow = isset($_GET['page']) ? $_GET['page'] : 1;

        if ($pageNow - 1 > 0) {
            $html .= '<li class="page-item"><a class="page-link" href="' . $link . $char . 'page=' . ($pageNow - 1) . '">Lùi</a></li>';
        }

        $start = $pageNow - 3;
        $start = $start <= 0 ? 1 : $start;

        $end  = $pageNow + 3;
        $end = $end > $sumPage ? $sumPage : $end;

        for ($i = $start; $i <= $end; $i++) {
            $html .= '<li class="page-item ' . (($pageNow == $i) ? 'active' :'') . '"><a class="page-link" href="' . $link . $char .'page=' . $i . '">' . $i .' </a></li>';
        }

        if ($sumPage - $pageNow > 0) {
            $html .= '<li class="page-item"><a class="page-link" href="' . $link . $char .'page=' . ($pageNow + 1) . '">Tiến</a></li>';
        }

        $html .= '<li class="page-item"><a class="page-link" href="' . $link . $char .'page=' . $sumPage . '">Về Cuối</a></li>';

        $html .='</ul>';
        return $html;
    }
}