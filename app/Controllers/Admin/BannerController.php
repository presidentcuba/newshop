<?php

class BannerController extends Auth 
{
    protected $bannerModel;
    public function __construct()
    {
        parent::__construct();

        $this->bannerModel = $this->loadModel('Admin/BannerModel');
    }

    public function add()
    {
        $data['title'] = 'Thêm Banner Mới';
        $data['template'] ='banner/add';
        
        return $this->loadView('admin/main', $data);
    }

    public function store()
    {

        if (isset($_POST['add'])) {

            $title = isset($_POST['title']) ? Helper::makeSafe($_POST['title']) : '';

            $active = isset($_POST['active']) ? intval($_POST['active']) : 0;

            if ($title == '') {
                Helper::flash('errors', 'Vui Lòng Nhập Tiêu Đề');
                return Helper::redirect('admin/banner/add');
            }
           
            if (!isset($_FILES['file']['name']) || $_FILES['file']['name'] == '') {
                Helper::flash('errors', 'Vui Lòng Chọn Ảnh');
                return Helper::redirect('admin/banner/add');
            }

            $check = getimagesize($_FILES["file"]["tmp_name"]);
         
            if (!$check) {
                Helper::flash('errors', 'File upload không đúng định dạng');
                return Helper::redirect('admin/banner/add');
            }

            if ($_FILES["file"]["size"] > 5000000) {
                Helper::flash('errors', 'File upload tối đa 5M');
                return Helper::redirect('admin/banner/add');
            }

            $pathImg = getPathFolder('banner') .basename($_FILES["file"]["name"]);

            move_uploaded_file($_FILES["file"]["tmp_name"], $pathImg);

            $dataInsert = [
                'title' => $title,
                'active' => $active,
                'thumb' => '/' . $pathImg,
                'created_at' => time()
            ];

            $result = $this->bannerModel->insert($dataInsert);
            if ($result) {
                Helper::flash('success', 'Thêm Banner Mới Thành Công');
                return Helper::redirect('admin/banner/add');
            }
            Helper::flash('errors', 'Thêm Banner Mới Lỗi');
            return Helper::redirect('admin/banner/add');
        }
        return Helper::redirect('admin/banner/add');
    }

    public function lists()
    {
        $data['title'] = 'Danh Sách Banner';
        $data['template'] = 'banner/list';
        $data['banner'] = $this->bannerModel->get();
        return $this->loadView('admin/main', $data);
    }

    public function edit($id = 0) 
    {
        $banner = $this->bannerModel->show($id);
 
        if ($banner) {
            $data['title'] = 'Chỉnh Sửa Banner:'. ' ' . $banner['title'];

            $data['template'] = 'banner/edit';
            // Chỉnh sửa sản phẩm thì cần load menus ra
            $data['banner'] = $banner;

            return $this->loadView('admin/main', $data);

        }
        Helper::flash('errors', 'ID không tồn tại');
        return Helper::redirect('admin/banner/lists');
    }

    public function update($id = 0)
    {
        if (isset($_POST['update'])) {

            #Kiểm tra tồn tại ID
            $banner = $this->bannerModel->show($id);
    
            if ($banner) {

                #Lấy toàn bộ thông tin form
                $title = isset($_POST['title']) ? Helper::makeSafe($_POST['title']) : '';
                $active = isset($_POST['active']) ? intval($_POST['active']) : 0;


                if ($title == '') {
                    Helper::flash('errors', 'Vui lòng nhập Tên Banner');
                    return Helper::redirect('admin/banner/add');
                }

                $dataUpdate = [
                    'title' => $title,
                    'active' => $active,
                ];


                #Kiểm tra Người dùng có chọn ảnh hay không
                if ($_FILES['file']['name'] != '') {
                    
                    #Kiểm tra định dạng Ảnh
                    $check = getimagesize($_FILES["file"]["tmp_name"]);
                    if (!$check) {
                        Helper::flash('errors', 'File upload không đúng định dạng');
                        return Helper::redirect('admin/banner/edit/' . $id);
                    }

                    // Check file size
                    if ($_FILES["file"]["size"] > 5000000) {
                        Helper::flash('errors', 'File upload tối đa 5M');
                        return Helper::redirect('admin/banner/edit/' . $id);
                    }

                    $pathImg = getPathFolder('banner') . basename($_FILES["file"]["name"]);
                    move_uploaded_file($_FILES['file']['tmp_name'], $pathImg);
                    
                    $dataUpdate['thumb'] = '/'. $pathImg;
                }


                $result = $this->bannerModel->update($dataUpdate, $id);
            
                if ($result) {
                    Helper::flash('success', 'Cập nhật Thành Công');
                    return Helper::redirect('admin/banner/lists');
                }

                Helper::flash('errors', 'Cập nhật  Lỗi');
                return Helper::redirect('admin/banner/edit/' . $id);
            }

            Helper::flash('errors', 'ID Không tồn tại');
            return Helper::redirect('admin/banner/lists');
        }

        return Helper::redirect('admin/banner/lists');
    }

    public function remove()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

            $banner = $this->bannerModel->show($id);
            if ($banner) {

                unlink("./". $banner['thumb']); //Xóa ảnh bằng link nội bộ

                $delete = $this->bannerModel->remove($id);
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