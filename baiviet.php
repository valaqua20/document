<?php 
    require("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .img {
            positon: relative;
        }
        .text-img {
            positon: absolute;
            font-style: italic;
            font-family: 'Indie Flower', cursive;
            position: absolute;
            top: 30%;
            left: 10%;
            font-size: 90px;
            color: white;
        }
        .footerofusefullinks {
            margin-bottom: 0;
            color: #b9b9b9;
        }
        p {
            text-align: justify;
        }
        h1,h2,h3,h4,h5,h6 {
            text-align: justify;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row align-items-center flex-column">
            <?php
                $sql_select = "select * from tbl_baiviet";
                $ketqua = mysqli_query($conn,$sql_select);
                if(mysqli_num_rows($ketqua)>0){
                    while($row = mysqli_fetch_assoc($ketqua)){
                        if(isset($_GET["task"]) && $_GET["task"] == "post"){
                            if($_GET["id"] ==  $row["ma_baiviet"]){
                                echo '
                                <h1>'.$row['ten_baiviet'].'</h1>
                                <div class = "col-8">'.$row['noidung'].'</div>';
                            }
                        }
                    }
                }
                ?>
               
            </div>
            <div class = "d-flex justify-content-center" style = "margin-bottom: 10px">
            <i style = "cursor: pointer;margin-top: 10px" onclick = "window.open('index.php','_self')" class="fas fa-chevron-circle-left fa-3x"></i>
            </div>
        
    </div>
</body>
</html>