<?php
  include 'inc_head.php';
?>

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

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 사용자 정보 확인 쿼리
$sql = "SELECT username, password FROM admin WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if (password_verify($password, $hashed_password)) {
        $_SESSION['username'] = $_POST['username'];

        if($ss_login) {
            header("Location: main.php");
        } else {
            header("Location: index.html");
        }
    } else {
        $message = "비밀번호가 잘못되었습니다.";
        echo "<script>alert('$hashed_password');history.go(-1);</script>";
    }
} else {
    $message = "존재하지 않는 사용자입니다.";
    echo "<script>alert('$message');history.go(-1);</script>";
}
