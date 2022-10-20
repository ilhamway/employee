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

?>
