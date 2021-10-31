<form action="/admin/banner/update/<?=$data['banner']['id']?>" method="POST" enctype ="multipart/form-data">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên Banner</label>
                    <input type="text" class="form-control" name="title" value="<?=Helper::decodeSafe($data['banner']['title'])?>">
                </div>
            </div>
            
        </div>
         <div class="row">
         <div class="col-md-6">
                <div class="form-group">
                    <label>Hình Ảnh</label>
                    <input type="file" class="form-control" name="file">
                    <br />
                    <img style="padding-left: 12px" src="<?=$data['banner']['thumb']?>" width="120px">
                </div>
            </div>  
         </div>

        <div class="row">
            <div class="col-md-6">
                <label>Kích hoạt</label>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" name="active" <?=$data['banner']['active'] == 1 ? 'checked':''?>>
                        <label class="form-check-label">Có</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" name="active" <?=$data['banner']['active'] == 0 ? 'checked':''?>>
                        <label class="form-check-label">Không</label>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <div class="card-footer">
        <input type="submit" name="update" class="btn btn-info" value="Cập nhật"></button>
        <button type="submit" class="btn btn-default float-right">Cancel</button>
    </div>
</form>
