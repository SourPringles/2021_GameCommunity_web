<html>
        <head>
                <link rel="stylesheet" href="tempPage.css?0">
        </head>

        <body>
                <div class="container">
<?php

$No=$_POST[No];
$PWI=$_POST[aPW];

$db=mysqli_connect("localhost", "s2104", "2104", "s2104_db");
$result=mysqli_query($db, "select * from final_board where No='$No'");
$row=mysqli_fetch_array($result);

if($PWI==$row[PW])
{
	echo "<h3>게시글이 삭제되었습니다.</h3>";
	unlink("upload/$row[filelink]");
	mysqli_query($db, "delete from final_board where No=$No");
	echo "<a href=../main.php target=frame onclick='window.close()'>홈으로</a>";
}
else
{
	echo "<h3>비밀번호가 틀렸습니다.</h3><br>";
	echo "<a href=tempPage.php?No={$No}>확인</a>";
}
?>
		</div>
	</body>
</html>


