<?php
session_start();  
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
}

require 'functions.php';

$menu = query("SELECT * FROM menu ");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/94777d0d19.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-danger  navbar-dark text-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SISI APP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="register.php">Register</a>
                </li>
            </ul>
            <form class="d-flex align-items-center">
                <p class="mx-3 my-1"><?php echo $_SESSION["username"]; ?></p>
                <a href="logout.php" onclick="return confirm('yakin keluar ?')" class="text-dark text-decoration-none"><button class="btn btn-light" type="submit"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></button>
            </form>
        </div>
    </div>
    </nav>
    <div class="container">
        <h1 class="text-center">Data Menu</h1>
        <div class="mx-auto">
        <a href="add_menu.php" class="btn btn-success my-2">Tambah menu</a>
        <div class="table-responsive">
            <table class="table table-striped">
            <tr class="bg-secondary">
                <th>No</th>
                <th>Name</th>
                <th>Link</th>
                <th>Icon</th>
                <th>Parent ID</th>
                <th>Create By</th>
                <th>Action</th>
            </tr>
            
            <?php $i = 1; ?>
            <?php foreach($menu as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["menu_name"]; ?></td>
                <td><?= $row["menu_link"]; ?></td>
                <td><?= $row["menu_icon"];?></td>
                <td><?= $row["parent_id"]; ?></td>
                <td><?= $row["create_by"]; ?></td>
                <td><a href="delete_menu.php?id=<?= $row["menu_id"]; ?>" onclick="return confirm('serius')"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
            </table>
        </div>
        </div> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>