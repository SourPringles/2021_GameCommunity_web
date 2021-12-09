<?php
session_start();
$is_edit=$_POST[is_edit];

$db=mysqli_connect("localhost", "s2104", "2104", "s2104_db");

if($is_edit=="edit")
{
	$No=$_POST[No];
	$result=mysqli_query($db, "select * from final_board where No='$No'");
	$row=mysqli_fetch_array($result);
	$PW=$row[PW];
	$FN=$row[filelink];

	if($_POST[pw]==$PW)
	{
		$Sub=$_POST[boardsub];
		$Title=$_POST[title];
		$Msg=$_POST[msg];

		echo "$Sub, $Title, $Msg, $No";

		mysqli_query($db, "update final_board set Sub='$Sub' where No=$No");
		mysqli_query($db, "update final_board set Title='$Title' where No=$No");
		mysqli_query($db, "update final_board set Msg='$Msg' where No=$No");
			
		$tempfile=$_FILES['userfile']['tmp_name'];
		$realfile=$_FILES['userfile']['name'];
		
		if(isset($_POST[changefile]))
		{
			unlink("upload/$row[filelink]");
			$fileDir="upload/".$realfile;
			move_uploaded_file($tempfile, $fileDir);
			mysqli_query($db, "update final_board set filelink='$realfile' where No=$No");
		}
		echo "수정 완료";
	}
	else echo "비밀번호가 다릅니다";
}
else
{
	$result=mysqli_query($db, "select * from final_board");
	$stmt=mysqli_prepare($db, "insert into final_board values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
	mysqli_stmt_bind_param($stmt, "sssssssss", $No, $sub, $ID, $articlePW, $title, $Msg, $cnt, $temp, $realfile);
	
	$sub=$_POST[boardsub];
	$ID=$_SESSION[id];
	$articlePW=$_POST[pw];
	$title=$_POST[title];
	$Msg=$_POST[msg];
	$cnt="0";
	$temp='NONE';//미완성

	$tempfile=$_FILES['userfile']['tmp_name'];
	$realfile=$_FILES['userfile']['name'];

	$fileDir="upload/".$realfile;
	move_uploaded_file($tempfile, $fileDir);

	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	
	$result=mysqli_query($db, "select * from final_board where ID='$ID'&&Title='$title'&&Msg='$Msg'");
	$row=mysqli_fetch_array($result);
	$boardNo=$row[No];
	mysqli_close($db);

	echo "<meta http-equiv='refresh' content='0 url=article.php?No={$boardNo}'>";
}
?>
