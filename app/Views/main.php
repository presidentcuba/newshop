<!DOCTYPE html>
<html lang="vi">
    <?php include 'head.php'; ?>
<body>
    
    <header>
        <div class="header">
            <div class="width-default">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="logo">
                                <h1>
                                    <a href="/">
                                        New Shop
                                        <p>Shop anywhere</p>
                                    </a>
                                </h1>
                               
                            </div>
                        </div>
                       
                        <div class="col-md-5">
                            <div class="header__right">
                                <div class="search d-inline-block">
                                    <form action="/tim-kiem.html" method="get">
                                        <input type="text" class="form-control" name="key" placeholder="Nhập từ khóa">
                                        <div class="icon__search">
                                            <i class="fal fa-search"></i>
                                        </div>
                                    </form>
                                </div>
                                <div class="cart d-inline-block">
                                    <div class="icon__cart">
                                        <div class="cart__number">
                                            <?=((isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) ? count($_SESSION['cart']) : 0 )?>
                                        </div>
                                        <a href="/gio-hang.html">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <nav>
        <div class="width-default">
            <ul>
                <li><a href="/">Trang Chủ</a></li>
                <li><a href="/">Giới Thiệu</a></li>

               
                <?php $menus = getMenu();?>
                <?php while ($row = $menus->fetch_assoc()) { ?>
                    <li>
                        <a href="/danh-muc/<?=$row['id']?>/<?=Helper::slug($row['title'])?>">
                            <?=$row['title']?>
                        </a>
                    </li>
                <?php } ?>


                <li><a href="/">Sản Phẩm</a></li>
                <li><a href="/gio-hang.html">Giỏ Hàng</a></li>
                <li><a href="/">Liên Hệ</a></li>
            </ul>
        </div>
    </nav>
    
    <section>
        <div class="slider">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $sliders = getSlider(); $sliderI = 1?>

                    <?php while ($row = $sliders->fetch_assoc()) {?>
                        <div class="carousel-item <?=$sliderI == 1 ? 'active' : ''?>">
                            <a href="<?=$row['url']?>" alt="<?=$row['title']?>">
                                <img class="d-block w-100" src="<?=$row['thumb']?>" alt="<?=$row['title']?>">
                            </a>
                        </div>
                    <?php $sliderI++; } ?>
                    
                   
                    
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
           
    </section>

    
   
    <main>
        <div class="width-default">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                       <?php include $data['template'] . '.php'; ?>
                    </div>
                    <div class="col-md-3">
                    <?php include 'sidebar.php'; ?>
                    </div>
                </div>
            </div>
           
        </div>
    </main>
   <!-- <div class="banner">
        
   </div> -->
   
    <?php if ($data['template'] == 'home') { ?>
       <div class="banner">
            <?php include 'banner.php';?>
       </div>
       <div class="width-default">
        <?php include 'trends.php';?>
    </div>
    <?php } ?>
    
    <?php include 'footer.php'; ?>
</body>
</html>