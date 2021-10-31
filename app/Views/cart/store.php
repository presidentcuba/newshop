<div class="products">
    <div class="title">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1><?=$data['title']?></h1>
                </div>
            </div>
        </div>
    </div>
    <?php include __DIR__.'/../admin/errors.php';?>
    <div class="cart_content">
        <form action="/dat-hang-nhanh.html" method="post">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thông Tin Khách Hàng</h3>

                        <div class="form-group">
                            <label for="">Tên khách hàng *</label>
                            <input type="text" name="name" class="form-control" placeholder="Vui lòng nhập tên Anh/Chị" required>
                        </div>

                        <div class="form-group">
                            <label for="">Số điện thoại *</label>
                            <input type="text" name="phone" class="form-control" placeholder="Vui lòng nhập số đt Anh/Chị" required>
                        </div>

                        <div class="form-group">
                            <label for="">Địa chỉ *</label>
                            <input type="text" name="address" class="form-control" placeholder="Vui lòng nhập địa chỉ" required>
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Ghi chú</label>
                            <textarea name="content" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-danger">Đặt Hàng</button>
                    </div>

                    <div class="col-md-6">
                        <h3>Danh Sách Sản Phẩm</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    $sum = 0;
                                    foreach ($_SESSION['cart'] as $key => $cart) { 
                                        $price = $cart['price'] * $cart['number'];
                                        $sum += $price;
                                    ?>
                                <tr>
                                    <th scope="row"><?=$i?></th>
                                    <td>
                                        <a slyle="text-decoration:none" href="/san-pham/<?=$key?>/<?=Helper::slug($cart['title'])?>" target="_blank">
                                            <img src="<?=$cart['thumb']?>" width="80px">
                                            <?=$cart['title']?>
                                        </a>
                                    </td>
        
                                    <td style="color: red"><?=number_format($price)?></td>
                                </tr>
                                <?php $i++; } ?>

                                <tr>
                                    <td colspan="2">Tổng Tiền:</td>
                                    <td style="color: red"><strong><?=number_format($sum)?></strong> <sup>đ</sup></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>