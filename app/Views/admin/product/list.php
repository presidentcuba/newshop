<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Danh Mục</th>
            <th>Hình Ảnh</th>
            <th style="width: 120px">Trạng Thái</th>
            <th style="width: 40px">Option</th>
        </tr>
    </thead>
    <tbody>

        <?php
            if ($data['products']->num_rows > 0) {
                while ($row = $data['products']->fetch_assoc()) {
        ?>
            <tr id="remove_<?=$row['id']?>">
                <td><?=$row['id']?></td>
                <td><?=$row['title']?></td>
                <td><?=$row['menu_title']?></td>
                <td>
                    <a href="<?=$row['thumb']?>" target ="_blank">
                        <img src="<?=$row['thumb']?>" alt="" width="60px">  
                    </a>
                </td>
                <td><?=activeAdmin($row['active'])?></td>
                <td>
                    <a href="/admin/product/edit/<?=$row['id']?>"><span class="badge bg-warning"><i class="far fa-edit"></i></span></a>
                    <a href="#"><span class="badge bg-danger" onclick ="removeRow(<?=$row['id']?>, '/admin/product/remove')"><i class="fas fa-trash-alt"></i></span></a>
                   
                    <a href="/admin/product/addslider/<?=$row['id']?>"><span class="badge bg-success"><i class="fas fa-plus"></i></span></a>
                   
                    <!-- <button type="submit" name="submit" class="btn btn-success mt-2"><i class="fas fa-plus"></i></button> -->
                </td>
            </tr>
        <?php } } ?>

    </tbody>
</table>
<div class="card-footer clearfix">
    <?=$data['page']?>
</div>


