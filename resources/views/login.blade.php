<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
</head>
<body>
	<form action="{{url('/dologin')}}" method="post">
		用户名：<input type="text" name='username' ><br>
		密　码：<input type="password" name="pass"><br>
		<input type="submit" value="登录">
		{{csrf_field()}}
	</form>
</body>
</html>