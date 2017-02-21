<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新闻发布</title>
</head>
<body>
	<h4>新消息发布</h4>
	<form action="{{url('/news/insert')}}" method="post">
		标题：<input type="text" name='title' ><br>
		摘要：<input type="text" name="intro"><br>
		作者：<input type="text" name="author"><br>
		详情：<input type="text" name="info"><br>
		<input type="submit" value="发布">
		{{csrf_field()}}
	</form>
</body>
</html>