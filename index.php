<?php
    require("config.php");
    if(isset($_GET["task"]) && $_GET["task"]=="delete"){
        $sql_delete = "delete from tbl_baiviet where ma_baiviet = ".$_GET["id"]." ";
        mysqli_query($conn,$sql_delete);
    }
?>
<!DOCTYPE html>
<html lang="en" id = "top">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="csss.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>
    <a href = "#top" class="onTop"><i class="far fa-caret-square-up"></i></a>
    <header>
        <h1>Q's Document</h1>
    </header>
    <div class="add-icon" onclick = "window.open('new-fix.php','_self')"><i class="fas fa-plus-square"></i></div>
    <form action="index.php" method = "post">
        <input type="text" class="search-input" name = "search-input">
        <button class="search-btn" type="submit" name = "search-btn">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <div class="q-document">
        <ul class="q-list">
            <?php 
                if(isset($_POST["search-btn"])){
                    $sql_select = "select * from tbl_baiviet where ten_baiviet like '%".$_POST["search-input"]."%'";
                    $ketqua = mysqli_query($conn,$sql_select);
                }else{
                    $sql_select = "select * from tbl_baiviet";
                    $ketqua = mysqli_query($conn,$sql_select);
                }
                if(mysqli_num_rows($ketqua)>0){
                    while($row = mysqli_fetch_assoc($ketqua)){
                        echo '
                        <div class="todo">
                            <li class="title" style = "cursor: pointer;" onclick = window.open("baiviet.php?task=post&id='.$row['ma_baiviet'].'","_self")>'.$row['ten_baiviet'].'</li>
                            <button class="edit-btn" onclick = \'window.open("new-fix.php?task=update&id='.$row['ma_baiviet'].'","_self")\'><i class="fas fa-edit"></i></button>
                            <button class="trash-btn" onclick = \'window.open("index.php?task=delete&id='.$row['ma_baiviet'].'","_self")\'><i class="fas fa-trash"></i></button>
                        </div>
                        ';
                    }
                }
            ?>
        </ul>
    </div>
    <script src= "script.js"></script>
</body>
</html>