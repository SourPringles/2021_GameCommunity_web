<?php

$No=$_GET[No];

$db=mysqli_connect("localhost", "s2104", "2104", "s2104_db");
$result=mysqli_query($db, "select * from final_board where No='$No'");
$row=mysqli_fetch_array($result);

//echo "$row[No], $row[Sub], $row[ID], $row[PW], $row[Title], $row[Msg], $row[cnt], $row[temp]";
if($row[Sub]=='LOL') $cSub='League Of Legend';
else if($row[Sub]=='BG') $cSub='BattleGround';
else if($row[Sub]=='OW') $cSub='OverWatch';
else if($row[Sub]=='SC') $cSub='StarCraft';
else if($row[Sub]=='Notice') $cSub='공지사항';
else if($row[Sub]=='QnA') $cSub='QnA';

$cCount=$row[cnt]+1;
?>

<html>
	<head>
		<link rel="stylesheet" href="article.css?2">
	</head>
	
	<body>
		<h2>게시글 보기</h2>
		<div class="container">
<?php

echo "<div class='information'>";
	echo "<div class='subject'>";
	echo "게시판 : $cSub";
	echo "</div>";
	echo "<div class='none1'>";
	echo "</div>";
	echo "<div class='count'>";
	echo "조회수 : $cCount";
	echo "</div>";
echo "</div>";

echo "<div class='title'>";
	echo "$row[Title]";
echo "</div>";

echo "<div class='article'>";
	echo "$row[Msg]";
echo "</div>";

echo "<div class='files'>";
if($row[filelink]==NULL) echo "첨부된 파일이 없습니다.";
else echo "첨부파일: <a href='upload/{$row[filelink]}' download>$row[filelink]</a>";

echo "</div>";

echo "<div class='editdel'>";
	echo "<div class='delete'>";
	echo "<a href=# onclick=window.open('editdel.php?type=del&No={$row[No]}','게시글삭제','width=330,height=180,scrollbars=no')>게시글 삭제</a>";
	echo "</div>";
	echo "<div class='none2'>";
	echo "<a href=board.php?sub={$row[Sub]} target=frame>목록보기</a>";
	echo "</div>";
	echo "<div class='edit'>";
	echo "<a href=editdel.php?type=edit&No={$row[No]} target=frame>게시글 수정</a>";
	echo "</div>";
echo "</div>";

?>
		</div>
	</body>
</html>




<?php
$count=$row[cnt];
$count++;
mysqli_query($db, "update final_board set cnt='$count' where No='$No'");
?>
