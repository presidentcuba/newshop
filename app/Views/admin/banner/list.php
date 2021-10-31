<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">ID</th>
            <th>Tên Tiêu Đề</th>
            <th>Hình Ảnh</th>
            <th style="width: 120px">Trạng Thái</th>
            <th style="width: 40px">Option</th>
        </tr>
    </thead>
    <tbody>

        <?php
            if ($data['banner']->num_rows > 0) {
                while ($row = $data['banner']->fetch_assoc()) {
        ?>
            <tr id="remove_<?=$row['id']?>">
                <td><?=$row['id']?></td>
                <td><?=$row['title']?></td>
                <td>
                    <a href="<?=$row['thumb']?>" target ="_blank">
                        <img src="<?=$row['thumb']?>" alt="" width="60px">  
                    </a>
                </td>
                <td><?=activeAdmin($row['active'])?></td>
                <td>
                    <a href="/admin/banner/edit/<?=$row['id']?>"><span class="badge bg-warning"><i class="far fa-edit"></i></span></a>
                    <a href="#"><span class="badge bg-danger" onclick ="removeRow(<?=$row['id']?>, '/admin/banner/remove')"><i class="fas fa-trash-alt"></i></span></a>
                    <!-- <button type="submit" name="submit" class="btn btn-success mt-2"><i class="fas fa-plus"></i></button> -->
                </td>
            </tr>
        <?php } } ?>

    </tbody>
</table>


