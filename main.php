<?php
// 세션 시작
session_start();

// 로그인 여부 확인
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
}

// 세션 유지 시간 설정 (초 단위)
$session_expiration = 60;

// 세션 시간 갱신
if (isset($_SESSION['username']) && (time() - $_SESSION['username'] > $session_expiration)) {
  session_unset();     // unset $_SESSION variable for the run-time 
  session_destroy();   // destroy session data in storage
  header("Location: index.php");
}
$_SESSION['username'] = time();

// 대시보드 페이지 코드


// 사용자 정보가 있으면 로그인 성공 처리
if ($result->num_rows > 0) {
  session_start();
  $_SESSION['username'] = $username;
  session_set_cookie_params(600);
  header("Location: main.html");
} else {
  echo "Invalid username or password";
}


if (!isset($_SESSION['username'])) {
  header("Location: index.html");
  exit;
}
?>

