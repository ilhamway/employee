<?php

$conn = mysqli_connect("localhost","root","","sisi");
	
function query($query){
	
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
		
	return $rows;
}

function registrasi($data) {
	global $conn;

	date_default_timezone_set("Asia/Bangkok");
	$id = uniqid();
    $nama = htmlspecialchars($data["nama"]);
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $no_wa = htmlspecialchars($data["no_wa"]);
    $pin = htmlspecialchars($data["pin"]);
    $jenis_user = htmlspecialchars($data["jenis_user"]);
    $status = htmlspecialchars($data["status"]);
	$create_by = htmlspecialchars($data["create_by"]);
	$create_date = date('Y-m-d H:i:s');
	$update_date = date('Y-m-d H:i:s');

	$result = mysqli_query($conn, "SELECT email, id_user FROM user WHERE email = '$email' OR id_user = '$id'");

	if ( mysqli_fetch_assoc($result)) {
		echo "
			<script>
				alert('Username sudah terdaftar!')
			</script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO user VALUES ('$id', '$nama', '$username', '$password', '$email', 
    '$no_hp', '$no_wa', '$pin', '$jenis_user', '$status', 'N', '$create_by', '$create_date', '$create_by', '$update_date' )");

	return mysqli_affected_rows($conn);
}


function menu($data) {
	global $conn;

	function getId($n) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
	
		for ($i = 0; $i < $n; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$randomString .= $characters[$index];
		}
	
		return $randomString;
	}
 

	date_default_timezone_set("Asia/Bangkok");
	$id = getId(3);
    $name = htmlspecialchars($data["name"]);
	$level = htmlspecialchars($data["menu_level"]);
    $link = htmlspecialchars($data["link"]);
    $icon = htmlspecialchars($data["icon"]);
    $parent_id = htmlspecialchars($data["parent_id"]);
    $create_by = $_SESSION["username"];
	$create_date = date('Y-m-d H:i:s');
	$update_date = date('Y-m-d H:i:s');

	$result = mysqli_query($conn, "SELECT menu_name FROM menu WHERE menu_name = '$name'");

	if ( mysqli_fetch_assoc($result)) {
		echo "
			<script>
				alert('Nama menu sudah ada!')
			</script>";
		return false;
	}


	mysqli_query($conn, "INSERT INTO menu VALUES ('$id', '$level', '$name', '$link', '$icon', 
    '$parent_id', '$create_by', '$create_date', 'N', '$create_by', '$update_date' )");

	return mysqli_affected_rows($conn);
}

function level($data) {
	global $conn;

    $level = htmlspecialchars($data["level"]);
	$id = "lv".$level;

	$result = mysqli_query($conn, "SELECT level FROM menu_level WHERE level = '$level'");

	if ( mysqli_fetch_assoc($result)) {
		echo "
			<script>
				alert('Level sudah ada!')
			</script>";
		return false;
	}

	mysqli_query($conn, "INSERT INTO menu_level VALUES ('$id', '$level')");

	return mysqli_affected_rows($conn);
}

function delete($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM menu WHERE menu_id = '$id'");
	return mysqli_affected_rows($conn);
}

?>