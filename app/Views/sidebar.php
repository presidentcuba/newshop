<?php if (isset($data['filter'])) { ?>    
    <div class="box">
        <div class="title">
            <span><i class="fas fa-filter"></i> Giá Tìm Kiếm</span>
        </div>

        <div class="form">
            <form action="/loc-san-pham.html" method="get">
                <div class="valueA">
                    <label style="float: left; width: 20%">Từ:</label>
                    <input style="float: left; width: 80%; padding-left: 5px" min = "0" value="<?=isset($_GET['start']) ? $_GET['start'] : 0?>" type="number" name="start">
                    <div style="clear: both"></div>
                </div>

                <div class="valueB">
                    <label style="float: left; width: 20%">Đến:</label>
                    <input style="float: left; width: 80%; padding-left: 5px" min="0" value="<?=isset($_GET['end']) ? $_GET['end'] : 0?>" type="number" name="end">
                    <div style="clear: both"></div>
                </div>
                <div class="d-flex justify-content-end">
                    <input type="submit" class="btn btn-danger text-right" value="Tìm Kiếm">
                </div>
               
            </form>
        </div>
    </div>
<?php } ?>

<div class="box">
    <div class="title">
        <span><i class="fas fa-signal"></i> Sản Phẩm Bán Chạy</span>
    </div>
    <div class="lists">
        <?php $productSale = productSale();
            while ($row = $productSale->fetch_assoc()) { 
        ?>
        <div class="item">
            <div class="row">
                <div class="col-4">
                    <div class="image">
                        <a href="/san-pham/<?=$row['id']?>/<?=Helper::slug($row['title'])?>" title="<?=$row['title']?>">
                            <img src="<?=$row['thumb']?>">
                        </a>
                    </div>  
                </div>
                <div class="col-8">
                    <div class="info">
                        <a href="/san-pham/<?=$row['id']?>/<?=Helper::slug($row['title'])?>" title="<?=$row['title']?>">
                            <?=$row['title']?>
                        </a>
                        <div class="price">
                            <p><?=price($row['price'], $row['sale_price'])?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>
</div>