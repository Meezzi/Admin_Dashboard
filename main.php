<?php
// 세션 시작
session_start();

// 로그인 여부 확인
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
}

// 세션 유지 시간 설정 (초 단위)
$session_expiration = 600;

// 세션 시간 갱신
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_expiration)) {
  session_unset();     // unset $_SESSION variable for the run-time 
  session_destroy();   // destroy session data in storage
  header("Location: index.php");
}
$_SESSION['last_activity'] = time();

// 대시보드 페이지 코드
?>

