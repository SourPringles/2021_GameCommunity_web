<html>
	<head>
		<title>2089019 Final</title>
		<link rel="stylesheet" href="index.css?11">
	</head>

	<body>
		<div class="container">
			<div class="header">
				<form method=post action=search.php target=frame autocomplete=off>
					<table border=0px>
						<tr>
							<td><select name=type class="searchtype">
							<option value="author">작성자</option>
							<option value="title" selected>제목</option>
							</select></td>
			
							<td><select name=type class="gametype">
							<option value="LOL">LOL</option>
							<option value="BattleGround">BattleGround</option>
							<option value="OverWatch">OverWatch</option>
							<option value="StarCraft">StarCraft</option>
							</select></td>

							<td><input type=search name=searchbar size=20 class="searchbar"></td>
							<td><input type=submit value=검색 class="searchbutton"></td>
						</tr>
					</table>
				</form>	
			</div>
			<div class="titlebar">
				<a href=index.php><b>PaiChai.GG</b></a> 
			</div>
			<div class="main">
				<div class="article">
					<iframe src="main.php" id="frame" name="frame" width="100%" height="100%" scrolling="no">IFRAME</iframe>
				</div>
				<div class="side">
					<div class="loginfield">
<?php
session_start();
/*TEST*//*$_SESSION['is_login']=TRUE;*/
if(!isset($_SESSION['is_login']))
{
	echo "<h3>로그인</h3>";
	echo "<form method=post action=login.php autocomplete=off>";
	echo "<table border=0x>";
	echo 	"<tr>
		<th width=70px>아이디</th>
		<th width=120px><input type=text name=id size=10 required></th>
		<th rowspan=2><input type=submit value=로그인 class='loginbutton'></th>
		</tr>";
	echo "<tr><th>비밀번호</th><th><input type=password name=pw size=10 required></th></tr>";
	echo "<tr>
		<th><a href=# class='resister' onclick=window.open('resister/resister.php','test','width=500,height=400')>회원가입</a></th>
		<th colspan=2><a href=# class='resister' onclick=window.open('findidpw/findidpw.html','test','width=575,height=275')>아이디/비밀번호 찾기</a></th>
		</tr>";
	echo "</table>";
}
else
{
	echo "<table class=logininform>";
	echo "<tr>
		<th>$_SESSION[id]님 환영합니다</th>
		<th><a href='logout.php'>로그아웃</a></th>
		</tr>";
	echo "<tr>
		<th><a href='#'>정보수정</a></th>
		<th><a href='#'>...</a></th>
		</tr>";
	echo "<tr>
		<th><a href='#'>내글 보기</a></th>
		<th><a href='#'>회원 탈퇴</a></th>
		</tr>";
	echo "</table>";
}


?>
					</div>
					<div class="menu">
<?php
session_start();
if(!isset($_SESSION['is_login']))
{
	echo "<div class='menulist'>";
	echo "<a href=# onclick=window.open('notsignedin.html','test','width=400,height=300')>";
	echo "<b>공지사항</b>";
	echo "</a>";
	echo "</div>";

	echo "<div class='menulist'>";
	echo "<a href=# onclick=window.open('notsignedin.html','test','width=400,height=300')>";
	echo "<b>League Of Legend</b>";
	echo "</a>";
	echo "</div>";

	echo "<div class='menulist'>";
	echo "<a href=# onclick=window.open('notsignedin.html','test','width=400,height=300')>";
	echo "<b>BattleGround</b>";
	echo "</a>";
	echo "</div>";

	echo "<div class='menulist'>";
	echo "<a href=# onclick=window.open('notsignedin.html','test','width=400,height=300')>";
	echo "<b>OverWatch</b>";
	echo "</a>";
	echo "</div>";

	echo "<div class='menulist'>";
	echo "<a href=# onclick=window.open('notsignedin.html','test','width=400,height=300')>";
	echo "<b>StarCraft</b>";
	echo "</a>";
	echo "</div>";

	echo "<div class='menulist'>";
	echo "<a href=# onclick=window.open('notsignedin.html','test','width=400,height=300')>";
	echo "<b>QnA</b>";
	echo "</a>";
	echo "</div>";

	echo "<div class='nondiv'>";
	echo "</div>";

	echo "<div class='menulist' onclick=window.open('https://op.gg/')>";
	echo "<b>OP.GG</b>";
	echo "</div>";

	echo "<div class='menulist' onclick=window.open('https://fow.kr/')>";
	echo "<b>FOW.kr</b>";
	echo "</div>";

	echo "<div class='menulist' onclick=window.open('https://lol.ps/')>";
	echo "<b>LOL.ps</b>";
	echo "</div>";

	echo "<div class='menulist' onclick=window.open('https://lolchess.gg/')>";
	echo "<b>롤체지지</b>";
	echo "</div>";
}
else
{
	echo "<div class='menulist' onclick=frame.location.href='board/board.php?sub=Notice'>";
	echo "<b>공지사항</b>";
	echo "</div>";

	echo "<div class='menulist' onclick=frame.location.href='board/board.php?sub=LOL'>";
	echo "<b>League Of Legend</b>";
	echo "</div>";
	
	echo "<div class='menulist' onclick=frame.location.href='board/board.php?sub=BG'>";
	echo "<b>BattleGround</b>";
	echo "</div>";
	
	echo "<div class='menulist' onclick=frame.location.href='board/board.php?sub=OW'>";
	echo "<b>OverWatch</b>";
	echo "</div>";
	
	echo "<div class='menulist' onclick=frame.location.href='board/board.php?sub=SC'>";
	echo "<b>StarCraft</b>";
	echo "</div>";
	
	echo "<div class='menulist' onclick=frame.location.href='board/board.php?sub=QnA'>";
	echo "<b>QnA</b>";
	echo "</div>";
	
	echo "<div class='nondiv'>";
	echo "</div>";
	
	echo "<div class='menulist' onclick=window.open('https://op.gg/')>";
	echo "<b>OP.GG</b>";
	echo "</div>";
	
	echo "<div class='menulist' onclick=window.open('https://fow.kr/')>";
	echo "<b>FOW.kr</b>";
	echo "</div>";
	
	echo "<div class='menulist' onclick=window.open('https://lol.ps/')>";
	echo "<b>LOL.ps</b>";
	echo "</div>";
	
	echo "<div class='menulist' onclick=window.open('https://lolchess.gg/')>";
	echo "<b>LoLCHESS.GG</b>";
	echo "</div>";
}
?>
					</div>
				</div>
			</div>
			<div class="footer">
			</div>
		</div>
	</body>
</html>
