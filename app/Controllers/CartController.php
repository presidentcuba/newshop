<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class CartController extends Controller
{
    protected $cartModel;

    public function __construct()
    {
        $this->cartModel = $this->loadModel('CartModel');
    }

    public function add($id = 0)
    {
        if (isset($_POST['addCart'])) {

            $number = isset($_POST['number']) ? intval($_POST['number']) : 0;
            if ($number <= 0) {
                Helper::flash('errors', 'Vui lòng nhập số lượng lớn hơn 0');
                return Helper::redirect('gio-hang.html');
            }

            #Lấy thông tin sản phẩm và kiểm tra giá tiền
            $product = $this->cartModel->getProduct($id);
            if ($product) {
                
                #nếu sản phẩm này đã được chọn
                if (isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id]['number'] = $_SESSION['cart'][$id]['number'] + $number;

                } else {
                    #Thêm Sản phẩm mới vào giỏ hàng
                    $_SESSION['cart'][$id] = [
                        'title' => $product['title'],
                        'thumb' => $product['thumb'],
                        'price' => $product['sale_price'] != 0 ? $product['sale_price'] : $product['price'],
                        'number' => $number
                    ];
                }
                Helper::flash('success', 'Thêm sản phẩm thành công ');
                return Helper::redirect('gio-hang.html');
            }
            
        }

        return Helper::redirect();
    }

    public function show()
    {
        $data['title'] = 'Danh Sách Đơn Hàng';
        $data['template'] = 'cart/content';

        return $this->loadView('main', $data);
    }

    public function update()
    {
        if (isset($_POST['update'])) {
            foreach ($_POST['cart'] as $key => $value) {
                if ($value > 0) {
                    $_SESSION['cart'][$key]['number'] =  $value;
                }
            }
        }

        return Helper::redirect('gio-hang.html');
    }

    public function delete($id = 0)
    {
        unset($_SESSION['cart'][$id]);

        return Helper::redirect('gio-hang.html');
    }

    public function store()
    {
        $data['title'] = 'Đặt Hàng';
        $data['template'] = 'cart/store';

        return $this->loadView('main', $data);
    }

    public function addCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            #Lấy toàn bộ dữ liệu từ form input
            $name = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
            $phone = isset($_POST['phone']) ? Helper::makeSafe($_POST['phone']) : '';
            $address = isset($_POST['address']) ? Helper::makeSafe($_POST['address']) : '';
            $email = isset($_POST['email']) ? Helper::makeSafe($_POST['email']) : '';
            $content = isset($_POST['content']) ? Helper::makeSafe($_POST['content']) : '';


            #kiểm tra một số trường bắt buộc
            if ($name == '' || $phone == '' || $address == '') {
                Helper::flash('errors', 'Vui lòng nhập vào Tên, Địa Chỉ, Số ĐT');
                return Helper::redirect('dat-hang.html');
            }

            #Lưu thông tin khách hàng
            $lastId = $this->cartModel->addCustomer($name, $phone, $address, $email, $content);

            if ($lastId != 0) { #Kiểm tra xem có ID Customer
                #xử lý data giỏ hàng
                $sql = '';
                foreach ($_SESSION['cart'] as $key => $cart) { 
                    $sql .= "(" . $lastId . ", '" .$cart['thumb']. "', '" .$cart['title']. "', 
                                " .$cart['price']. ",  " .$cart['number']. ", " .$key. "), ";
                }

                $sql = substr(trim($sql), 0, -1);
                
                #Insert vào Data Cart
                $this->cartModel->insertCart($sql);

                #Send Mail
                #mail('phanhongvan1992@gmail.com', 'My Subject', 'Test Email');

                $mail = new PHPMailer(true);
                try {

                 // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'presidentcubacuba@gmail.com';                     // SMTP username
                    $mail->Password   = 'yssntlecomcfoftx';                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    //Recipients
                    $mail->setFrom('presidentcubacuba@gmail.com', 'Mailer');
                    $mail->addAddress('presidentcubacuba@gmail.com', 'Joe User');     // Add a recipient
                    $mail->addAddress('presidentcubacuba@gmail.com');               // Name is optional
                    $mail->addReplyTo('info@example.com', 'Information');
                    #$mail->addCC('cc@example.com');
                    #$mail->addBCC('bcc@example.com');

                    // Attachments
                    #$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    #$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Here is the subject';
                    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
   
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

                #Xóa toàn bộ giỏ hàng
                unset($_SESSION['cart']);
                Helper::flash('success', 'Đặt Hàng Thành Công');
                return Helper::redirect('gio-hang.html');
               
               
            }
           
        }
        
        return Helper::redirect('dat-hang.html');
        
    }
}