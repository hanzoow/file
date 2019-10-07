<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php
#Code bài diem

?>
<style>
    .a{
        width: auto;
        height:auto;
    }
</style>
<table class="table table-bordered table-dark">
    <tr>
        <th>STT</th>
        <th>Từ năm</th>
        <th>Đến năm</th>
        <th>Lớp</th>
        <th>Nơi học</th>
        <th>Thao tác</th>
    </tr>
    <tr>
        <td>1</td>
        <td>2018</td>
        <td>2019</td>
        <td>K40D</td>
        <td>Huế</td>
        <td>
        <button type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i>Xóa</button>
        <button type="button" class="btn btn-outline-warning" ><i class="fas fa-plus-circle"></i>
        Sửa</button>    
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td>2018</td>
        <td>2019</td>
        <td>K40C</td>
        <td>Huế</td>
        <td>
        <button type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i>Xóa</button>
        <button type="button" class="btn btn-outline-warning"><i class="fas fa-plus-circle"></i>
        Sửa</button>
        </td>
    </tr>
</table>
<?php include_once("footer.php") ?>