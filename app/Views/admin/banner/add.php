<form action="/admin/banner/store" method="POST" enctype ="multipart/form-data">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên Banner</label>
                    <input type="text" class="form-control" name="title">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Hình Ảnh</label>
                    <input type="file" class="form-control" name="file">
                </div>
            </div>  
        </div>
         

        <div class="row">
            <div class="col-md-6">
                <label>Kích Hoạt</label>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" name="active" checked="">
                        <label class="form-check-label">Có</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" name="active">
                        <label class="form-check-label">Không</label>
                    </div>    
                </div>
            </div>   
        </div>
    </div>
    <div class="card-footer">
        <input type="submit" name="add" class="btn btn-info" value="Thêm Mới"></button>
        <button type="submit" class="btn btn-default float-right">Cancel</button>
    </div>
</form>
