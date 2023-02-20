<meta charset="utf-8" />
<?php	
	include "./memberdb.php";
	
	if($_POST["username"] == "" || $_POST["password"] == ""){
		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
	}else{

	$password = $_POST['password'];
	$sql = mq1("select * from member where id='".$_POST['username']."'");
    /* 쿼리문 변경해야 함 */
	$member = $sql->fetch_array();
	$hash_pw = $member['pw'];

	if(password_verify($password, $hash_pw))
	{
		$_SESSION['username'] = $member["id"];
		$_SESSION['password'] = $member["pw"];

		echo "<script>alert('로그인되었습니다.'); location.href='../page/main.html';</script>";
	}else{
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
	}
	
}
?>