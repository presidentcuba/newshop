<form action="/admin/menu/store" method="POST">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên Danh Mục*</label>
                    <input type="text" class="form-control" name="title">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" name="description"></textarea>
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
