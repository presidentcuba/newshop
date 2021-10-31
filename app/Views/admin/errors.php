<?php if (isset($_SESSION["errors"])) { ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Lỗi!</h5>
       
        <ul>
            <?php foreach($_SESSION["errors"] as $key => $error) { ?>

                <li><?=$error?></li>
            
            <?php } ?>
        </ul>
    </div>
    <?php Helper::clearFlash('errors'); ?>
<?php } ?>


<?php if (isset($_SESSION["success"])) { ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Thành Công!</h5>
       
        <ul>
            <?php foreach($_SESSION["success"] as $key => $success) { ?>

                <li><?=$success?></li>
            
            <?php } ?>
        </ul>
    </div>
    <?php Helper::clearFlash('success'); ?>
<?php } ?>


