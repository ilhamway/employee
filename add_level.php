<?php
    session_start();  
    if(!isset($_SESSION["login"])){
        header("Location:login.php");
        exit;
    }

	require 'functions.php';

	if ( isset($_POST["add_level"])) {

		if (level($_POST) > 0) {
		echo " <script>
				alert('Level baru berhasil ditambahkan!');
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
                        <label for="exampleFormControlInput1" class="form-label">Level</label>
                        <input type="number" class="form-control" id="level" name="level" placeholder="level">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary mt-4" type="submit" name="add_level">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>