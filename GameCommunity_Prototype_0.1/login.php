<?php
$db=mysqli_connect("localhost", "s2104", "2104", "s2104_db");

$id=$_POST[id];
$pw=md5($_POST[pw]);

$result=mysqli_query($db, "select * from final_userdb where ID='$id' && PW='$pw'");
$row=mysqli_fetch_array($result);

if(isset($row[ID]))
{
	session_start();
	$_SESSION['is_login']=TRUE;
	$_SESSION['id']=$row[ID];
	mysqli_close($db);
	header('Location:./index.php');
}
else
{
	mysqli_close($db);
	header('Location:./index.php');
}

?>


