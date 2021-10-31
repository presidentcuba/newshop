

function removeRow(id, link)
{
    if (confirm('Xóa mà không thể khôi phục ?')) {
        $.ajax({
            type : 'POST',
            dataType : 'json',
            url : link,
            data : { id },
            success : function (result) {
                if (result.error === false) {
                    $('#remove_' + id).remove();
                }

                alert(result.message);
            }
        });
    }
}