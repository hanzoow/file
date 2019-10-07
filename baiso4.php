<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>
<?php
#Code bài số 4
    include_once("model/book.php");

    //$book = new Book(50, "OOP in PHP", "ndungithue", 2019);
    //$book->display();
    //$ls = $book::getList();
    $lsFromFile = Book::getListFromFile();
    $keyWord = $_REQUEST["ser"];
    if($_REQUEST['action'] == 'delete'){
        Book::delete($_REQUEST['id']);
    }
    if($_REQUEST['action'] == 'edit'){
        if($_REQUEST['id'] && $_REQUEST['title'] && $_REQUEST['price'] && $_REQUEST['author'] && $_REQUEST['year']){
            Book::edit($_REQUEST['id'],$_REQUEST['title'],$_REQUEST['price'],$_REQUEST['author'],$_REQUEST['year']);
        }
    }
    //Book::getListFromFile();
    // for($i=0;$i<=count($ls);$i++){
    //     echo $ls->display() . "<br>";    
    // }
?>
<table class="table table-bordered table-dark">
    <form action="baiso4.php" method="get">

        <input type="text" placeholder="Search" name="ser" value="<?php $keyWord ?>"> <button type="submit"><i class="fas fa-search"></i></button>
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên sách</th>
            <th>Giá</th>
            <th>Tác giả</th>
            <th>Năm xuất bản</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        </body>
                <?php 
                    foreach($lsFromFile as $key => $value){
                ?>
                <tr>
                    <td name="k<?php echo $key ?>"><?php echo $key ?></td>
                    <td name="tieude<?php echo $key ?>"><?php echo $value->title?></td>
                    <td name="gia<?php echo $key ?>"><?php echo $value->price?></td>
                    <td name="tacgia<?php echo $key ?>"><?php echo $value->author?></td>
                    <td name="nam<?php echo $key ?>"><?php echo $value->year?></td>
                    <td>
                    <div class="modal" id="form-edit-<?php echo $value->id?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">form edit with id: <?php echo $value->id?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <form action="" method="POST">
                                <div class="modal-body">
                                <input type="hidden" name="action" value="edit">
                                <input type="hidden" name="id" value="<?php echo $value->id?>">
                                    <div class="form-group">
                                        <label>title</label>   
                                        <input class="form-control" type="text" value="<?php echo $value->title?>" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>price</label>   
                                        <input class="form-control" type="number" value="<?php echo $value->price?>" name="price">
                                    </div>
                                    <div class="form-group">
                                        <label>author</label>   
                                        <input class="form-control" type="text" value="<?php echo $value->author?>" name="author">
                                    </div>
                                    <div class="form-group">
                                        <label>year</label>   
                                        <input class="form-control" type="text" value="<?php echo $value->year?>" name="year">
                                    </div> 
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">submit</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>

                            </div>
                        </div>
                    </div>
                    <button class="btn btn-outline-warning" data-toggle="modal" data-target="#form-edit-<?php echo $value->id?>"><i class="fas fa-pencil-alt"></i> Edit</button>
                    <form action="" style=" display: inline-block;" method="POST">
                        <input type="hidden" name="action" value="delete"> 
                        <input type="hidden" name="id" value="<?php echo $value->id?>"> 
                        <button  class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                    </form>
                    </td>
                </tr>    
                <?php 
                   } 
                ?>
        </tbody>
    </form>
</table>

<?php include_once("footer.php") ?>