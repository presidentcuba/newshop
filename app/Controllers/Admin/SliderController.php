<?php

class SliderController extends Auth 
{
    protected $sliderModel;

    public function __construct()
    {
        $this->sliderModel = $this->loadModel('Admin/SliderModel');
    }
    public function add()
    {
        $data['title'] = 'Thêm Slider Mới';
        $data['template'] = 'slider/add';

        return $this->loadView('admin/main', $data);
    }

    public function store()
    {
        if (isset($_POST['add'])) {
            $title = isset($_POST['title']) ? Helper::makeSafe($_POST['title']) : '';
            $url = isset($_POST['url']) ? Helper::makeSafe($_POST['url']) : '';
            $sort = intval($_POST['sort']);
            $active = intval($_POST['active']);

            if($title == '' || $url == '' || $_FILES['file']['name'] == '') {
                Helper::flash("errors", "Vui lòng nhập Tiêu đề, Hình ảnh và Đường dẫn");
                Helper::redirect('admin/slider/add');
            }

             #Kiểm tra đinh dạnh ảnh
             $check = getimagesize($_FILES["file"]["tmp_name"]);
             if (!$check) {
                 Helper::flash('errors', 'File upload không đúng định dạng');
                 return Helper::redirect('admin/slider/add');
             }
 
             if ($_FILES["file"]["size"] > 5000000) {
                 Helper::flash('errors', 'File upload tối đa 5M');
                 return Helper::redirect('admin/slider/add');
             }

            $pathImg = getPathFolder('slider') .'/'.basename($_FILES["file"]["name"]);

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $pathImg)) {
                $data = [
                    'title' => $title,
                    'url' => $url,
                    'active' => $active,
                    'sort' => $sort,
                    'thumb' => "/" . $pathImg
                ];

                $result = $this->sliderModel->insert($data);
            
                if ($result) {
                    Helper::flash("success", "Thêm Slider mới thành công");
                    return Helper::redirect('admin/slider/add');
                }
             }
             Helper::flash("errors", "File upload lỗi");
             return Helper::redirect('admin/slider/add');
        }
        return Helper::redirect('admin/slider/add');
    }

    public function lists()
    {
        $data['title'] = "Danh Sách Slider";
         #Xử lý Phân Trang
         $limit = 5;
         $page = 1;
 
         if (isset($_GET['page']) && $_GET['page'] > 1) {
             $page = intval($_GET['page']);
         }
         $offset = ($page - 1 ) * $limit;
 
         #Tính tổng số Row
         $numRows = $this->sliderModel->num();
         $sumPage = ceil($numRows / $limit);
 
         $data['sliders'] = $this->sliderModel->get($limit, $offset);
         $data['template'] = 'slider/list';
         $data['page'] = page($sumPage, '/admin/slider/lists');
 
 
         return $this->loadView('admin/main', $data);
    }

    public function edit($id = 0)
    {
        $slider = $this->sliderModel->show($id);
        
        if ($slider) {
            $data['title'] = 'Chỉnh Sửa Slider';
            $data['template'] = 'slider/edit';
            $data['slider'] = $slider;

            return $this->loadView('admin/main', $data);
        }
        Helper::flash('errors', 'ID không tồn tại');
        return Helper::redirect('admin/slider/lists');
    }

    public function update($id = 0)
    {
        if (isset($_POST['update'])) {

            $slider = $this->sliderModel->show($id);
    
            if ($slider) {
                $title = isset($_POST['title']) ? Helper::makeSafe($_POST['title']) : '';
                $url = isset($_POST['url']) ? Helper::makeSafe($_POST['url']) : '';
                $sort = intval($_POST['sort']);
                $active = intval($_POST['active']);

                if($title == '' || $url == '') {
                    Helper::flash("errors", "Vui lòng nhập Tiêu đề, Hình ảnh và Đường dẫn");
                    Helper::redirect('admin/slider/edit/' .$id);
                }

                # Nếu người dùng đã chọn thì mới kiểm tra
                if ($_FILES['file']['name'] != '') {
                    #Kiểm tra đinh dạnh ảnh
                    $check = getimagesize($_FILES["file"]["tmp_name"]);
                    if (!$check) {
                        Helper::flash('errors', 'File upload không đúng định dạng');
                        return  Helper::redirect('admin/slider/edit/' .$id);
                    }
        
                    if ($_FILES["file"]["size"] > 5000000) {
                        Helper::flash('errors', 'File upload tối đa 5M');
                        return Helper::redirect('admin/slider/edit/' . $id);
                    }

                    $pathImg = getPathFolder('slider') . '/ '.basename($_FILES["file"]["name"]);
                }
                

                if (move_uploaded_file($_FILES["file"]["tmp_name"], $pathImg)) {
                    $data['thumb'] = '/' . $pathImg;
                }
                $data['title'] = $title;
                $data['url'] = $url;
                $data['active'] = $active;
                $data['sort_by'] = $sort;
        
                $result = $this->sliderModel->update($data, $id);
            
                if ($result) {
                    Helper::flash("success", "Cập Nhật Slider mới thành công");
                    return Helper::redirect('admin/slider/lists');
                }
                
            }
            Helper::flash('errors', 'Cập nhật Slider lỗi');
            return Helper::redirect('admin/slider/edit/' . $id);
        }
        Helper::flash('errors', 'ID không tồn tại');
        return Helper::redirect('admin/slider/lists');
    }

    public function remove()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

            $slider = $this->sliderModel->show($id);
            if ($slider) { #nếu đúng

                unlink("./". $slider['thumb']);
                #Xóa file Ảnh

                $delete = $this->sliderModel->remove($id);
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