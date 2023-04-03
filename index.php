<?php
// MySQL 서버 연결 정보
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// MySQL 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 오류 처리
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// POST로 받은 로그인 정보 가져오기
$username = $_POST['username'];
$password = $_POST['password'];

// 사용자 정보 확인 쿼리
$sql = "SELECT username, password FROM admin WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

// 사용자 정보가 있으면 로그인 성공 처리
if ($result->num_rows > 0) {
    session_start();
    $_SESSION['username'] = $username;
    session_set_cookie_params(60);
    header("Location: main.html");
} else {
    echo "Invalid username or password";
}

// MySQL 연결 종료
$conn->close();
?>
