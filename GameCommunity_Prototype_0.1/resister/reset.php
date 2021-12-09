<?php

$db=mysqli_connect("localhost", "s2104", 2104, "s2104_db");
mysqli_query($db, "drop table final_userdb");
mysqli_query($db, "create table final_userdb(ID text, PW text, Name varchar(20), Birth date, Gender char(1), EMail text)");
$stmt=mysqli_prepare($db, "insert into final_userdb values (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssssss", $ID, $PW, $Name, $Birth, $Gender, $Email);

$ID="root";
$PWraw="0000";
$PW=md5($PWraw);
$Name="root";
$Birth="0000-00-00";
$Gender="N";
$Email="root@root.root";

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($db);

?>
