<?php
$No=$_GET[No];
?>
<html>
	<head>
		<link rel="stylesheet" href="tempPage.css?0">
	</head>

	<body>
		<div class="container">
			<form method="post" action="temp.php">
				<h3>게시글 비밀번호를 입력해 주세요</h3>
				비밀번호: <input type=password name="aPW"><br><br>
<?php
echo "<input type=hidden name='No' value={$No}>";
?>
				<input type=submit value="삭제하기">
			</form>
		</div>
	</body>
</html>
