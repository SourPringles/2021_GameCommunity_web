<html>
	<head>
		<link rel="stylesheet" href="resister.css?1">
	</head>

<?php
$ID=$_GET[ID];
$Name=$_GET[Name];
$Birth=$_GET[Birth];
$Email=$_GET[Email];

echo "
	<body>
		<h2>회원가입</h2>
		<div class=container>
			<form method=post action='resister_work.php'>
					<table>
						<tr>
							<th>ID</th>
							<td><input type='text' name='ID' value='$ID' required></td>
						</tr>
						<tr>
							<th>비밀번호</th>
							<td><input type='password' name='PW' required></td>
							<th>비밀번호 확인</th>
							<td><input type=:password' name='PWcheck' required></td>
						</tr>
						<tr>
							<th>이름</th>
							<td><input type='text' name='Name' value='$Name' required></td>
						</tr>
						<tr>
							<th>생년월일</th>
							<td><input type='date' name='Birth' value='$Birth'></td>
						</tr>
						<tr>
							<th>성별</th>
							<td>
								<label><input type='radio' name='Gender' value='M'>남자</label>
								<label><input type='radio' name='Gender' value='F'>여자</label>
							</td>
						</tr>
						<tr>
							<th>E-Mail</th>
							<td><input type='email' name='Email' placeholder='정확한 메일주소 입력' value='$Email'></td>
						</tr>
					</table>
					<input type='submit' value='회원가입'>
					<input type='reset' value='초기화'>
			</form>
		</div>		
	</body>
";
?>
</html>
