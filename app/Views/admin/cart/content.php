<div class="customer_info">
    <ul>
        <li style = "margin-top:10px">Tên Khách Hàng: <strong><?=$data['customer']['name']?></strong></li>
        <li>Địa Chỉ: <strong><?=$data['customer']['address']?></strong></li>
        <li>Điện Thoại: <strong><a href="tel:<?=$data['customer']['phone']?>"><?=$data['customer']['phone']?></a></strong></li>
        <li>Email: <strong><a href="mailto:<?=$data['customer']['email']?>"><?=$data['customer']['email']?></a></strong></li>
        <li>Ghi chú: <strong><?=$data['customer']['content']?></strong></li>
        <li>Ngày Đặt Hàng: <strong><?=date("d-m-Y h:i:s", $data['customer']['time_create'])?></strong></li>
    </ul>
</div>

<div class="cart_list">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Đơn Giá</th>
                <th scope="col" style="width: 100px">Số Lượng</th>
                <th scope="col">Thành Tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                $sum = 0;
                foreach ($data['cart'] as $key => $cart) { 
                    $price = $cart['price'] * $cart['number'];
                    $sum += $price;
                ?>
            <tr>
                <th scope="row"><?=$i?></th>
                <td>
                    <a href="/san-pham/<?=$key?>/<?=Helper::slug($cart['title'])?>" target="_blank">
                        <img src="<?=$cart['thumb']?>" width="80px">
                        <?=ucfirst($cart['name'])?>
                    </a>
                </td>
                <td><?=number_format($cart['price'])?></td>
                <td><input type="number" name="cart[<?=$key?>]" value="<?=$cart['number']?>"></td>
                <td style="color: red"><?=number_format($price)?></td>
            </tr>

            <?php $i++; } ?>

            <tr>
                <td colspan="4" style="text-align:right">Tổng Tiền:</td>
                <td style="color: red"><strong><?=number_format($sum)?></strong> <sup>đ</sup></td>
            </tr>
        </tbody>
    </table>
</div>