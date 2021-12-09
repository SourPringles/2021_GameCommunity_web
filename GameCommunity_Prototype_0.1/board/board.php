<link rel="stylesheet" href="board.css?2">
<meta charset = 'utf-8'>

<?php

$db=mysqli_connect("localhost", "s2104", "2104", "s2104_db");

$sub=$_GET[sub];
if($sub=='Notice') $boardname='공지사항';
else if($sub=='LOL') $boardname='League Of Legends 게시판';
else if($sub=='BG') $boardname='BattleGround 게시판';
else if($sub=='OW') $boardname='OverWatch 게시판';
else if($sub=='SC') $boardname='StarCraft 게시판';
else if($sub=='QnA') $boardname='QnA';
else $boardname='error';

$result=mysqli_query($db, "select * from final_board where Sub='$sub'");
$num=1;
$PageNum=17;

if($sub=='Notice'||$sub=='QnA')
{
	echo "
		<h2>{$boardname}</h2>
		<table>
			<tr align=center>
				<th height=30px><b>NO.</b></th>
				<th colspan=2><b>제목</b></th>
				<th><b>작성자</b></th>
				<th><b>조회수</b></th>
			</tr>";
}
else
{

	echo "
		<h2>{$boardname}</h2>
		<table>
			<tr align=center>
				<th width=60px height=30px><b>NO.</b></th>
				<th width=80px><b>티어</b></th>
				<th><b>제목</b></th>
				<th width=80px><b>작성자</b></th>
				<th width=60px><b>조회수</b></th>
			</tr>";
}

if($sub=='Notice'||$sub=='QnA')
{
	while($num!=$PageNum)
	{
		$row=mysqli_fetch_array($result);
		echo "
		<tr height=50px>
			<td>$num</td>
			<td colspan=2><a href=article.php?No={$row[No]}>$row[Title]</a></td>
			<td>$row[ID]</td>
			<td>$row[cnt]</td>
		</tr>";
		$num++;
	}
}
else
{
	while($num!=$PageNum)
	{
		$row=mysqli_fetch_array($result);
		echo "
		<tr height=50px>
			<td>$num</td>
			<td>$row[temp]</td>
			<td><a href=article.php?No={$row[No]}>$row[Title]</a></td>
			<td>$row[ID]</td>
			<td>$row[cnt]</td>
		</tr>";
		$num++;
	}
}

echo "
<tr height=50px>
	<td width=60px;> </td>
	<td width=80px><a href=#>이전</a></td>
	<td>
		<a href=#>1</a>
		<a href=#>2</a>
		<a href=#>3</a>
		<a href=#>4</a>
		<a href=#>5</a>
	</td>
	<td width=80px><a href=#>다음</a></td>
	<td width=60px><a href=write.php?sub={$sub} target=frame>글쓰기</a></td>
</tr>";
echo "<tr height=8px></tr>";
echo "</table>";


mysqli_close($db);

?>
