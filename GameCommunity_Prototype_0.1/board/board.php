<link rel="stylesheet" href="board.css?3">
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

if(isset($_GET[page]))
	$page=$_GET[page];
else
	$page=1;

$Page=$page-1;

$prev=$page-1;
if($prev==0) $prev=1;
$next=$page+1;
if($next==6) $next=5;

$alpha=16*($page-1);

$beta=16;
$PageNum=17;

$result=mysqli_query($db, "select * from final_board where Sub='$sub' order by No desc limit $alpha,$beta");
$num=1;

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
				<th colspan=2><b>제목</b></th>
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
			<td colspan=2><a href=article.php?No={$row[No]}>";

if($row[filelink]!=NULL) echo "$row[Title] (((FILE)))";
else echo "$row[Title]";

		echo "	</a></td>
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
			<td colspan=2><a href=article.php?No={$row[No]}>";
if($row[filelink]!=NULL) echo "$row[Title] (((FILE)))";
else echo "$row[Title]";
		echo "	</a></td>
			<td>$row[ID]</td>
			<td>$row[cnt]</td>
		</tr>";
		$num++;
	}
}

echo "
<tr height=50px>
	<td width=60px;> </td>
	<td width=80px><a href=board.php?page=$prev&sub={$sub}>이전</a></td>
	<td>";
if($page==1)
{
	echo "<a href=board.php?page=1&sub={$sub}> <b style='color:black;'>1</b> </a>";
	echo "<a href=board.php?page=2&sub={$sub}> 2 </a>";
	echo "<a href=board.php?page=3&sub={$sub}> 3 </a>";
	echo "<a href=board.php?page=4&sub={$sub}> 4 </a>";
	echo "<a href=board.php?page=5&sub={$sub}> 5 </a></td>";
}
else if($page==2)
{
	echo "<a href=board.php?page=1&sub={$sub}> 1 </a>";
	echo "<a href=board.php?page=2&sub={$sub}> <b>2</b> </a>";
	echo "<a href=board.php?page=3&sub={$sub}> 3 </a>";
	echo "<a href=board.php?page=4&sub={$sub}> 4 </a>";
	echo "<a href=board.php?page=5&sub={$sub}> 5 </a></td>";
}
else if($page==3)
{
	echo "<a href=board.php?page=1&sub={$sub}> 1 </a>";
	echo "<a href=board.php?page=2&sub={$sub}> 2 </a>";
	echo "<a href=board.php?page=3&sub={$sub}> <b>3</b> </a>";
	echo "<a href=board.php?page=4&sub={$sub}> 4 </a>";
	echo "<a href=board.php?page=5&sub={$sub}> 5 </a></td>";
}
else if($page==4)
{
	echo "<a href=board.php?page=1&sub={$sub}> 1 </a>";
	echo "<a href=board.php?page=2&sub={$sub}> 2 </a>";
	echo "<a href=board.php?page=3&sub={$sub}> 3 </a>";
	echo "<a href=board.php?page=4&sub={$sub}> <b>4</b> </a>";
	echo "<a href=board.php?page=5&sub={$sub}> 5 </a></td>";
}
else if($page==5)
{
	echo "<a href=board.php?page=1&sub={$sub}> 1 </a>";
	echo "<a href=board.php?page=2&sub={$sub}> 2 </a>";
	echo "<a href=board.php?page=3&sub={$sub}> 3 </a>";
	echo "<a href=board.php?page=4&sub={$sub}> 4 </a>";
	echo "<a href=board.php?page=5&sub={$sub}> <b>5</b> </a></td>";
}


echo "	</td>
	<td width=80px><a href=board.php?page=$next&sub={$sub}>다음</a></td>
	<td width=60px><a href=write.php?sub={$sub} target=frame>글쓰기</a></td>
</tr>";
echo "<tr height=8px></tr>";
echo "</table>";


mysqli_close($db);

?>
