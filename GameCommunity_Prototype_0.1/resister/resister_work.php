<?php

$db=mysqli_connect("localhost", "s2104", "2104", "s2104_db");

$stmt=mysqli_prepare($db, "insert into final_userdb values (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssssss", $ID, $PW, $Name, $Birth, $Gender, $Email);

$ID=$_POST[ID];
$PW=md5($_POST[PW]);
$PWC=md5($_POST[PWcheck]);
$Name=$_POST[Name];
$Birth=$_POST[Birth];
$Gender=$_POST[Gender];
$Email=$_POST[Email];

$result=mysqli_query($db, "select * from final_userdb where ID='$ID'");
$row=mysqli_fetch_array($result);
if($row!=0)
{
	echo "중복된 아이디입니다.<br>";
	echo "다른 아이디를 사용해 주세요.";
	echo "<meta http-equiv='refresh' content='3 url=resister.php?Name=$Name&Birth=$Birth&Gender=$Gender&Email=$Email'>";
}
else
{
	if($_POST[PW]!=$_POST[PWcheck])
	{
		echo "비밀번호와 비밀번호 확인이 일치하지 않습니다.<br>";
		echo "다시 입력해 주세요.";
		echo "<meta http-equiv='refresh' content='3 url=resister.php?
			ID=$ID&Name=$Name&Birth=$Birth&Gender=$Gender&Email=$Email'>";
	}

//echo "{$ID}, {$PW}, {$Name}, {$Birth}, {$Gender}, {$Email}";
	else
	{
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		mysqli_close($db);

		echo "가입이 완료되었습니다.";
		
	}
}

?>
