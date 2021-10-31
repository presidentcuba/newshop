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
    <div class="product">
        <div class="container-fluid">
            <div class="row">
                <?php while ($row = $data['products']->fetch_assoc()) {

                    $productTitle = Helper::decodeSafe(ucfirst($row['title']));
                    ?>
                        <div class="col-md-4">
                            <div class="item">
                                <div class="image">
                                    <a href="/san-pham/<?=$row['id']?>/<?=Helper::slug($productTitle)?>" title="<?=$productTitle?>">
                                        <img src="<?=$row['thumb']?>" alt="">
                                    </a>
                                </div>
                                <div class="info">
                                    <a href="/san-pham/<?=$row['id']?>/<?=Helper::slug($productTitle)?>" title="<?=$productTitle?>">
                                        <?=$productTitle?>
                                    </a>
                                    <div class="price">
                                        <p><?=price($row['price'], $row['sale_price'])?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php } ?>
            </div>

            <?=$data['page']?>
        </div>
    </div>
</div>