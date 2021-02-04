<?php 
    require("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
</head>

<body>
    <div class="container fluid">
        <div class="row">
            <div class="col-12">
            <?php 
                 if(isset($_GET["task"]) && $_GET["task"] == "update"){
                    $id = $_GET["id"];
                    $sql_select = 'select * from tbl_baiviet where ma_baiviet = '.$id;
                    $ketqua = mysqli_query($conn,$sql_select);
                    if(mysqli_num_rows($ketqua)>0){
                        while($row = mysqli_fetch_assoc($ketqua)){
                            echo '
                            <h1 style="text-align: center;">Edit documents</h1>
                            <form action="new-fix.php" method = "post">
                            <h3 style="text-align: center;margin-top: 20px;">Nhập nội dung ở đây: </h3>
                            <input type = "hidden" name = "mabaiviet" value = "'.$row['ma_baiviet'].'">
                            <textarea name="noidung"></textarea>
                            <script>
                                CKEDITOR.replace( "noidung" );
                            </script>
                            <h3 style="text-align: center;">Tên tài liệu</h3>
                            <input type="text" style="width: 100%;padding: 10px 12px;" name = "tenbaiviet" value = "'.$row['ten_baiviet'].'" margin: 15px 0;" placeholder="Nhập tên tài liệu...">
                            <input type="submit" name="fix" value = "Sửa" class="btn btn-success" style="width: 200px;margin-top: 20px">
                        </form>
                        <button class="btn btn-danger" style="width: 200px;margin: 20px 0;" onclick = window.open("index.php","_self")>Hủy</button>';
                        }
                    }
                }else {
                    echo '
                    <h1 style="text-align: center;">Add new documents</h1>
                    <form action="new-fix.php" method = "post">
                            <h3 style="text-align: center;margin-top: 20px;">Nhập nội dung ở đây: </h3>
                            <textarea name="noidung"></textarea>
                            <script>
                                CKEDITOR.replace( "noidung" );
                            </script>
                            <h3 style="text-align: center;">Tên tài liệu</h3>
                            <input type="text" style="width: 100%;padding: 10px 12px; margin: 15px 0;" name = "tenbaiviet" placeholder="Nhập tên tài liệu...">
                            <input type="submit" name="add" value = "Thêm" class="btn btn-success" style="width: 200px;margin-top: 20px">
                        </form>
                        <button class="btn btn-danger" style="width: 200px;margin: 20px 0;" onclick = window.open("index.php","_self")>Hủy</button>
                    ';
                }
            ?>
            <?php 
                if(isset($_POST["fix"])){      
                    $sql_update = "update tbl_baiviet set noidung = N'".$_POST["noidung"]."',ten_baiviet = N'".$_POST["tenbaiviet"]."' where ma_baiviet = ".$_POST["mabaiviet"]."";
                    if(mysqli_query($conn,$sql_update)){
                        header("location: index.php");
                    }else{
                        echo "Sửa thất bại";
                    }
                }
                if(isset($_POST["add"])){            
                    $sql_new = "insert into tbl_baiviet(ten_baiviet,noidung) values(N'".$_POST["tenbaiviet"]."',N'".$_POST["noidung"]."')";
                    if(mysqli_query($conn,$sql_new)){
                        header("location: index.php");
                      
                    }else{
                        echo "thêm mới thất bại";
                    }
                    
                }        
            ?>
              
            </div>
        </div>
    </div>
</body>

</html>