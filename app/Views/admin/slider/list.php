<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">ID</th>
            <th>Tiêu đề</th>
            <th>Hình Ảnh</th>
            <th style="width: 120px">Trạng Thái</th>
            <th style="width: 40px">Option</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if ($data['sliders']->num_rows > 0) {
                while ($row = $data['sliders']->fetch_assoc()) {
        ?>
            <tr id="remove_<?=$row['id']?>">
                <td><?=$row['id']?></td>
                <td><?=$row['title']?></td>
    
                <td>
                    <a href="<?=$row['thumb']?>" target="_blank">
                        <img src="<?=$row['thumb']?>" width="60px">
                    </a>
                </td>
                
                <td><?=activeAdmin($row['active'])?></td>
                <td>
                    <a href="/admin/slider/edit/<?=$row['id']?>"><span class="badge bg-warning"><i class="fas fa-edit"></i></span></a>
                    <a href="#"><span class="badge bg-danger" onclick="removeRow(<?=$row['id']?>, '/admin/slider/remove')"><i class="fas fa-trash-alt"></i></span></a>
                </td>
            </tr>

        <?php  } } ?>

    </tbody>
</table>

<div class="card-footer clearfix">
    <?=$data['page']?>
</div>