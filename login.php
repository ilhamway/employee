<?php

session_start();
require 'functions.php';
//cek cookie

if(isset($_SESSION["login"])){
	header("Location:index.php");
	exit;
}



if (isset($_POST["login"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

	if ( mysqli_num_rows($result) === 1 ) {

		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {

			$_SESSION["login"]=true;
            $_SESSION["username"]=$row["username"];
            $_SESSION["id_user"]=$row["id_user"];
            $_SESSION["id_jenis_user"]=$row["id_jenis_user"];

			header("Location: index.php");
			exit;
		}
	}
	$error = true;
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
    <div class="container">
        <h1 class="text-center">Login SISI</h1>
        <div class="mx-auto">
        <form action="" method="post">
            <div class="row justify-content-center mt-5">
                <div class="col-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                    </div> 
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit" name="login">Login</button>
                    </div>
                </div>
            </div>
        </form>
        </div> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>