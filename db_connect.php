<?php
// DB 연결 설정
$servername = "localhost";
$username = "root";
$password = "toor";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 오류 처리
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
else{
	echo "success";
}
*/
?>
