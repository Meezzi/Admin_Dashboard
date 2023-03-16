<?php
// DB 연결 설정
require_once('db_connect.php');

// 데이터 가져오기
$sql = "SELECT * FROM mytable";
$result = $conn->query($sql);

// 데이터를 Chart.js 데이터 형식에 맞게 변환
$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = array(
        'UID' => $row['UID'], // UNIX 타임스탬프를 밀리초 단위로 변환
        'Cheack_Status' => $row['Check_Status']
    );
}

// JSON 형식으로 반환
header('Content-Type: application/json');
echo json_encode($data);

?>
