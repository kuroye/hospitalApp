<?php
require_once 'ti.php'
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="static/index.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/05c5b30105.js" crossorigin="anonymous"></script>


    <title>
        <?php startblock('title')?>
        <?php endblock()?>
    </title>

</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#" id="logo">Zhan_daua <i class="fas fa-hand-holding-medical"></i></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">首页<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registration/registration_list.php">挂号列表</a>
            </li>
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="ReservedList/ReservedList_CN/reservedList.php">预约列表</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="Time/timeTable.php">时间表</a>-->
<!--            </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="Inventory/inventory.php">药库</a>-->
<!--                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="RegisteredList/RegisteredList_CN/registerHistory.php">挂号记录</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AdminPage/dailyBill.php">每日结算</a>
                </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    CN
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">KZ</a>
                    <a class="dropdown-item" href="#">EN</a>
                </div>
            </li>


        </ul>

    </div>
</nav>

<!-- body block-->
<div>
    <?php startblock('body')?>
    <?php endblock()?>
</div>





<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>
