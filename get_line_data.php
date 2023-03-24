<?php
// DB 연결 설정
require_once('db_connect.php');

$value = $_POST["time_val"];
//$value = '2023-03-24 14:13:00';
// 데이터 가져오기
$sql = "SELECT COUNT(*) FROM mytable WHERE Time_Stamp BETWEEN DATE_SUB('$value', INTERVAL 1 MINUTE) AND '$value' AND Check_Status='1'";
//$sql = "SELECT COUNT(*) FROM mytable WHERE Time_Stamp BETWEEN DATE_ADD('2023-03-24 09:10:00', INTERVAL -1 MINUTE) AND '2023-03-24 09:10:00' and Check_Status='1'";
$result = $conn->query($sql);

// 데이터를 echart.js 데이터 형식에 맞게 변환
$data = mysqli_fetch_assoc($result);

// JSON 형식으로 출력
header('Content-Type: application/json');
echo json_encode($data);

?>
