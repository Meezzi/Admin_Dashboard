<?php
// db 연결 정보 설정
require_once('db_connect.php');


// 매개변수에서 데이터셋 정보 추출
$value = $_GET["value"];
//$value = '0';

// db에서 해당 데이터셋 정보 검색
$sql = "SELECT * FROM mytable WHERE Check_Status='$value'";
$result = $conn->query($sql);

// 검색 결과를 표로 출력
echo "<table>";
echo "<tr><th>UID</th><th>Time Stamp</th><th>Check Status</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td>" . $row["UID"] . "</td><td>" . $row["Time_Stamp"] . "</td><td>" . $row["Check_Status"] . "</td></tr>";
}
echo "</table>";
?>
