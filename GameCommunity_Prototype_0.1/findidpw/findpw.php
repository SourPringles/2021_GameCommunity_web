<?php
$db=mysqli_connect("localhost", "s2104", "2104", "s2104_db");

$Name=$_POST[Name];
$ID=$_POST[ID];
$EMail=$_POST[Email];

$result=mysqli_query($db, "select * from final_userdb where ID='$ID' && Name='$Name' && EMail='$EMail'");
$row=mysqli_fetch_array($result);

if(isset($row[ID]))
{
	echo "<h3>변경할 비밀번호를 입력해 주세요.</h3>";
	echo "
<form method=post action=PWChange.php>
	<table border=0>
		<tr>
			<td>새 비밀번호</td>
			<td><input type=password name=PW required size=10></td>
		</tr>
		<tr>
			<td>다시 입력</td>
			<td><input type=password name=PWC required size=10></td>
		</tr>
		<tr>
			<td rowspan=2><input type=submit value=변경하기></td>
		</tr>
	</table>
</form>";
}

?>
