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

// POST로 받은 회원가입 정보 가져오기
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// 회원가입 정보 검증
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}

// 이메일 중복 검사
$sql = "SELECT COUNT(*) as count FROM admin WHERE email = '$email'";
$result = $conn->query($sql);
$count = $result->fetch_assoc()['count'];

if ($count > 0) {
    die("Email already exists");
}

// 비밀번호 암호화
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 회원가입 정보 저장
$sql = "INSERT INTO admin (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
$result = $conn->query($sql);

// 회원가입 완료 페이지 출력
echo "회원가입이 완료되었습니다.";

// MySQL 연결 종료
$conn->close();
?>


