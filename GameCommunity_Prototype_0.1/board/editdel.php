<?php
$No=$_GET[No];

$db=mysqli_connect("localhost", "s2104", "2104", "s2104_db");

$type=$_GET[type];

if($type=="del")
{
	echo "<meta http-equiv='refresh' content='0 url=tempPage.php?No={$No}'>";
}
else
{
	echo "<meta http-equiv='refresh' content='0 url=write.php?type=edit&No={$No}'>";	

}
?>
