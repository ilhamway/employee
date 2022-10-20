<?php
    session_start();  
    if(!isset($_SESSION["login"])){
        header("Location:login.php");
        exit;
    }

	require 'functions.php';

	if ( isset($_POST["register"])) {

		if ( registrasi($_POST) > 0) {
		echo " <script>
				alert('User baru berhasil ditambahkan!');
				document.location.href = 'login.php'
				</script> ";
	} else {
		echo mysqli_error($conn);
	}
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
                <a class="nav-link" href="#">Menu</a>
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
        <h1 class="text-center">Register SISI</h1>
        <div class="mx-auto">
            <form action="" method="post">
            <div class="row justify-content-center mt-5">
                <div class="col-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama User</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama user">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No. HP</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No HP">
                    </div> 
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No. WA</label>
                        <input type="number" class="form-control" id="no_wa" name="no_wa" placeholder="No WA">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">PIN</label>
                        <input type="number" class="form-control" id="pin" name="pin" placeholder="PIN">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ID Jenis User</label>
                        <input type="number" class="form-control" id="jenis_user" name="jenis_user" placeholder="ID Jenis User">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Status User</label>
                        <input type="text" class="form-control" id="status" name="status" placeholder="Status">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Dibuat Oleh</label>
                        <input type="text" class="form-control" id="create_by" name="create_by" placeholder="Status">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary mt-4" type="submit" name="register">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>