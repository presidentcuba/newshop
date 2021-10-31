<?php

class MenuController extends Auth
{
    protected $menuModel;

    public function __construct()
    {
        parent::__construct();

        $this->menuModel = $this->loadModel('Admin/MenuModel');
    }

    public function add()
    {
        $data['title'] = 'Thêm Danh Mục Mới';
        $data['template'] = 'menu/add';

        return $this->loadView('admin/main', $data);
    }

    public function store()
    {
        if (isset($_POST['add'])) {
            $title = isset($_POST['title']) ? Helper::makeSafe($_POST['title']) : '';
            $description = isset($_POST['description']) ? Helper::makeSafe($_POST['description']) : '';
            $active = isset($_POST['active']) ? intval($_POST['active']) : 1;

            if ($title == '') {
                Helper::flash('errors', 'Vui lòng nhập tiêu đề Danh mục');
                return Helper::redirect('admin/menu/add');
            }


            $result = $this->menuModel->insert($title, $description, $active);
            if ($result) {
                Helper::flash('success', 'Thêm Danh Mục Thành Công');
                return Helper::redirect('admin/menu/add');
            }

            Helper::flash('errors', 'Thêm Danh Mục Lỗi');
            return Helper::redirect('admin/menu/add');
        }


        return Helper::redirect('admin/menu/add');
    }

    public function lists()
    {
        $data['title'] = 'Danh Sách Danh Mục';

        #Xử lý Phân Trang
        $limit = 10;
        $page = 1;

        if (isset($_GET['page']) && $_GET['page'] > 1) {
            $page = intval($_GET['page']);
        }
        $offset = ($page - 1 ) * $limit;

        #Tính tổng số Row
        $numRows = $this->menuModel->num();
        $sumPage = ceil($numRows / $limit);

        $data['menus'] = $this->menuModel->get($limit, $offset);
        $data['template'] = 'menu/list';
        $data['page'] = page($sumPage, '/admin/menu/lists');

        return $this->loadView('admin/main', $data);
    }

    public function edit($id = 0)
    {
        $menu = $this->menuModel->show($id);
        if ($menu) {
            $data['title'] = 'Chỉnh Sửa Danh Mục';
            $data['menu'] = $menu;
            $data['template'] = 'menu/edit';

            return $this->loadView('admin/main', $data);
        }

        Helper::flash('errors', 'ID không tồn tại');
        return Helper::redirect('admin/menu/lists');
    }
    

    public function update($id = 0)
    {
        if (isset($_POST['update'])) {
            #Kiểm tra Id có tồn tại trong data hay không
            $menu = $this->menuModel->show($id);
            if ($menu) {

                $title = isset($_POST['title']) ? Helper::makeSafe($_POST['title']) : '';
                $description = isset($_POST['description']) ? Helper::makeSafe($_POST['description']) : '';
                $active = isset($_POST['active']) ? intval($_POST['active']) : 1;

                if ($title == '') {
                    Helper::flash('errors', 'Vui lòng nhập tiêu đề Danh mục');
                    return Helper::redirect('admin/menu/edit/' . $id);
                }

                $result = $this->menuModel->update($title, $description, $active, $id);
                if ($result) {
                    Helper::flash('success', 'Cập nhật Menu thành công');
                    return Helper::redirect('admin/menu/lists');
                }

                Helper::flash('errors', 'Cập nhật Menu Lỗi');
                return Helper::redirect('admin/menu/edit/' . $id);
            }

            Helper::flash('errors', 'ID không tồn tại');
            return Helper::redirect('admin/menu/lists');
        }

        return Helper::redirect('admin/menu/lists');
    }

    public function remove()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

            $menu = $this->menuModel->show($id);
            if ($menu) {

                $delete = $this->menuModel->remove($id);
                if ($delete) {
                    return Helper::json([
                        'error' => false,
                        'message' => 'Xóa thành công'
                    ]);
                }
            }
        }

        return Helper::json([
            'error' => true,
            'message' => 'Xóa Lỗi'
        ]);
    }
}
