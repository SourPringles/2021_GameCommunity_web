<?php
$db=mysqli_connect("localhost", "s2104", "2104", "s2104_db");

$Name=$_POST[Name];
$EMail=$_POST[Email];

$result=mysqli_query($db, "select * from final_userdb where Name='$Name' && EMail='$EMail'");
$row=mysqli_fetch_array($result);

if(isset($row[ID]))
{
	echo "아이디는 $row[ID] 입니다.";
}

?>
