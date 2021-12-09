<html>
	<head>
		<link rel="stylesheet" href="resister.css?4">
	</head>

<?php
$ID=$_GET[ID];
$Name=$_GET[Name];
$Birth=$_GET[Birth];
$Email=$_GET[Email];

echo "
	<body>
		<div class=container>
			<h2>회원가입</h2>
			<form method=post action='resister_work.php'>
				<table>
					<tr>
						<th>ID</th>
						<td><input type='text' name='ID' value='$ID' required autocomplete='no'></td>
					</tr>
					<tr>
						<th>비밀번호</th>
						<td><input type='password' name='PW' required autocomplete='no'></td>
						<th>비밀번호 확인</th>
						<td><input type='password' name='PWcheck' required autocomplete='no'></td>
					</tr>
					<tr>
						<th>이름</th>
						<td><input type='text' name='Name' value='$Name' required autocomplete='no'></td>
					</tr>
					<tr>
						<th>생년월일</th>
						<td><input type='date' name='Birth' value='$Birth' autocomplete='no'></td>
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
						<td colspan=2>* 이메일 미입력 시 계정 찾기가 불가능합니다.</td>
					</tr>
					<tr>	
						<td colspan=2></td>
						<td><input type='submit' class=bb value='회원가입'></td>
						<td><input type='reset' class=bb value='초기화'></td>
					</tr>
				</table>
			</form>
		</div>		
	</body>
";
?>
</html>
