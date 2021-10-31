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

    <div class="cart_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0 ) {  ?>  

                    <form action="/cap-nhat-don-hang" method="post">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Đơn Giá</th>
                                    <th scope="col" style="width: 100px">Số Lượng</th>
                                    <th scope="col">Thành Tiền</th>
                                    <th scope="col">Xóa</th>
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
                                        <a href="/san-pham/<?=$key?>/<?=Helper::slug($cart['title'])?>" target="_blank">
                                            <img src="<?=$cart['thumb']?>" width="80px">
                                            <?=$cart['title']?>
                                        </a>
                                    </td>
                                    <td><?=number_format($cart['price'])?></td>
                                    <td><input type="number" name="cart[<?=$key?>]" value="<?=$cart['number']?>"></td>
                                    <td style="color: red"><?=number_format($price)?></td>
                                    <td><a href="/xoa-san-pham/<?=$key?>">Xóa</td>
                                </tr>

                                <?php $i++; } ?>

                                <tr>
                                    <td colspan="4">Tổng Tiền:</td>
                                    <td style="color: red"><strong><?=number_format($sum)?></strong> <sup>đ</sup></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="d-inline">
                            <input type="submit" name="update" class="btn btn-info" value="Cập Nhật Đơn Hàng">
                            <a href="/dat-hang.html" class="btn btn-success" >Đặt Hàng</a>
                        </div>
                    </form>

                    <?php } else { ?>
                        <div class="text-center">Chưa có sản phẩm nào trong giỏ hàng</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>