<?php

/**
 * cài đặt router
 */
$env_routes['danh-muc'] = 'menu/view';
$env_routes['san-pham'] = 'product/view';


$env_routes['them-gio-hang'] = 'cart/add';
$env_routes['gio-hang.html'] = 'cart/show';
$env_routes['cap-nhat-don-hang'] = 'cart/update';
$env_routes['xoa-san-pham'] = 'cart/delete';
$env_routes['dat-hang.html'] = 'cart/store';
$env_routes['dat-hang-nhanh.html'] = 'cart/addCart';

$env_routes['tim-kiem.html'] = 'search/index';
$env_routes['loc-san-pham.html'] = 'search/search';