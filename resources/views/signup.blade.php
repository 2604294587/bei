<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
</head>
<body>
	<form action="{{url('/signup')}}" method="post">
		用户名：<input type="text" name='username' class="name"><br>
		密　码：<input type="password" name="pass"><br>
		确认密码：<input type="password" name="repass"><br>
		<input type="submit" value="提交">
		{{csrf_field()}}
	</form>
</body>
</html>