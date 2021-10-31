<div class="product__content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-5">
                <div class="image">
                    <img src="<?=$data['product']['thumb']?>" alt="<?=$data['product']['title']?>">
                </div>
               
                  
                
                <div class="carousel__detail mt-2 d-flex">
                    <div class="owl-carousel owl-theme">
                        <?php while ($row = $data['slider']->fetch_assoc()) {?> 
                            <div class="item">
                                <img src="<?=$row['url']?>" alt="" width = "50px" height="100%">
                            </div>
                            
                        <?php } ?>
                    </div> 
                </div>
            </div>
            <div class="col-7">
                <h1><?=$data['title']?></h1>
                <div class="gold">
                    <?=price($data['product']['price'], $data['product']['sale_price'])?>
                </div>
                <div class="description">
                    <?=Helper::decodeSafe($data['product']['description'])?>
                </div>
                <div class="cart">
                    <form action="/them-gio-hang/<?=$data['product']['id']?>" method="post">
                        <div class="row">
                            <div class="col-6">
                                <input type="number" value ="1" name = "number" min = "1" class = "form-control">
                            </div>
                            <div class="col-6">
                                <input type="submit" name = "addCart" value = "Thêm Vào Giỏ Hàng" class = "btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>

                

                <!-- <div class="icon" style="color: #1565C0">
                    <em>Shared: </em>
                    <a href="/"><i class="fab fa-facebook-square"></i></a>
                    <a href="/"><i class="fab fa-twitter-square"></i></a>
                    <a href="/"><i class="fab fa-twitter-square"></i></a>
                    <a href="/"><i class="fab fa-skype"></i></a>
                </div> -->
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <article class = "content__full">
                    <h5>Chi Tiết Sản Phẩm</h5>
                    <?=Helper::decodeSafe($data['product']['content'])?>
                </article>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <div class = "content__full">
                    <h5>Có Thể Bạn Quan Tâm</h5>
                </div>
            </div>
            <?php while ($row = $data['productMores']->fetch_assoc()) {

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
    </div>
</div>