
<?php while ($row = $data['banner']->fetch_assoc()) {

?>
    <div class="item">
        <div class="image">
            <img class="w-100" src="<?=$row['thumb']?>" alt="">
        </div>
        <div class="content">
            <p>20% Discount on</p>
            <h1>trending designs</h1>
        </div>
    </div>
<?php } ?>
