<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">ID</th>
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            <th style="width: 120px">Trạng Thái</th>
            <th style="width: 40px">Option</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if ($data['customers']->num_rows > 0) {
                while ($row = $data['customers']->fetch_assoc()) {
        ?>
            <tr id="remove_<?=$row['id']?>">
                <td><?=$row['id']?></td>
                <td><?=$row['name']?></td>
                <td><a href="tel:<?=$row['phone']?>"><?=$row['phone']?></a></td>
                <td><?=$row['address']?></td>
                <td><?=$row['is_view'] == 0 ? 'MỚI' : 'ĐÃ XEM'?></td>
                <td>
                    <a href="/admin/cart/view/<?=$row['id']?>"><span class="badge bg-warning"><i class="fas fa-eye"></i></span></a>
                    <a href="#"><span class="badge bg-danger" onclick="removeRow(<?=$row['id']?>, '/admin/cart/remove')"><i class="fas fa-trash-alt"></i></span></a>
                </td>
            </tr>

        <?php  } } ?>

    </tbody>
</table>

<div class="card-footer clearfix">
    <?=$data['page']?>
</div>