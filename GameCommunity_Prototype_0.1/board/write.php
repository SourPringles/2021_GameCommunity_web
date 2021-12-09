<html>
	<head>
		<link rel="stylesheet" href="write.css?9">	
		<meta charset = 'utf-8'>
	</head>

	<body>
<?php
$type=$_GET[type];
$No=$_GET[No];

$db=mysqli_connect("localhost", "s2104", "2104", "s2104_db");
$result=mysqli_query($db, "select * from final_board where No='$No'");
$row=mysqli_fetch_array($result);

$temp=$_GET[sub];

if($type=="edit") 
{
	echo "<h2>게시글 수정하기</h2>
		<form enctype='multipart/form-data' method=post action=write_work.php>
			<input type=hidden name='is_edit' value='edit'>
			<input type=hidden name='No' value='$No'>
			<table>
				<tr height=50px>
					<th colspan=2><select name='boardsub' class='boardsub' value='$row[Sub]'>
";
if($row[Sub]=='LOL') echo "<option value='LOL' selected>League Of Legend 게시판</option>";
else echo "<option value='LOL'>League Of Legend 게시판</option>";
if($row[Sub]=='BG') echo "<option value='BG' selected>BattleGround 게시판</option>";
else echo "<option value='BG'>BattleGround 게시판</option>";
if($row[Sub]=='OW') echo "<option value='OW' selected>OverWatch 게시판</option>";
else echo "<option value='OW'>OverWatch 게시판</option>";
if($row[Sub]=='SC') echo "<option value='SC' selected>StarCraft 게시판</option>";
else echo "<option value='SC'>StarCraft 게시판</option>";
echo "							</select></th>
				</tr>
				<tr height=50px>
					<th colspan=2>
						<input type='text' name='title' class='title' value='$row[Title]' size=20 placeholder='제목을 입력해 주세요'>
						<input type='password' name='pw' class='pw' value='$row[PW]' size=5 placeholder='비밀번호'>
					</th>
				</tr>
				<tr height=600px>
					<th colspan=2><textarea name='msg' class='msg'>$row[Msg]</textarea></th>
				</tr>
				<tr>
					<th colspan=2 height=50px>
						업로드된 파일:";
	if($row==NULL) echo "없음";
	else echo "<a href=upload/$row[filelink] download>$row[filelink]</a>";
	echo "					</th>
				</re>
				<tr>
					<th colspan=2 height=50px>
						<input type='file' name='userfile' class='file'>

						<input type='hidden' name='MAX_FILE_SIZE' value='1000000'>
					</th>
				</tr>
				<tr>
					<th colspan=2 height=50px>
						<input type='submit' class='submit' value='수정하기'>
						<input type='button' class='submit' value='취소하기' onclick=location.href='article.php?No={$No}'>
					</th>
				</tr>
			</table>
		</form>
";
}
else echo "<h2>게시판 글쓰기</h2>
		<form enctype='multipart/form-data' method=post action=write_work.php>
			<table>
				<tr height=50px>
					<th colspan=2><select name='boardsub' class='boardsub'>";
if($temp=='LOL') echo "<option value='LOL' selected>League Of Legend 게시판</option>";
else echo "<option value='LOL'>League Of Legend 게시판</option>";
if($temp=='BG') echo "<option value='BG' selected>BattleGround 게시판</option>";
else echo "<option value='BG'>BattleGround 게시판</option>";
if($temp=='OW') echo "<option value='OW' selected>OverWatch 게시판</option>";
else echo "<option value='OW'>OverWatch 게시판</option>";
if($temp=='SC') echo "<option value='SC' selected>StarCraft 게시판</option>";
else echo "<option value='SC'>StarCraft 게시판</option>";
echo "					</select></th>
				</tr>
				<tr height=50px>
					<th colspan=2>
						<input type='text' name='title' class='title' size=20 placeholder='제목을 입력해 주세요'>
						<input type='password' name='pw' class='pw' size=5 placeholder='비밀번호'>
					</th>
				</tr>
				<tr height=600px>
					<th colspan=2><textarea name='msg' class='msg'></textarea></th>
				</tr>
				<tr>
					<th colspan=2 height=50px>
						<input type='file' name='userfile' class='file'>
						<input type='hidden' name='MAX_FILE_SIZE' value='1000000'>
					</th>
				</tr>
				<tr>
					<th colspan=2 height=50px>
						<input type='submit' class='submit' value='작성하기'>
						<input type='button' class='submit' value='취소하기' onclick=location.href='board.php?sub={$temp}'>
					</th>
				</tr>
			</table>
		</form>
";
?>
	</body>
</html>
