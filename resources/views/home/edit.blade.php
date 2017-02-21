<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新闻修改</title>
</head>
<body>
	<form action="{{url('/news/update')}}" method="post">
		标题：<input type="text" name='title' value="{{$newinfo->title}}"><br>
		摘要：<input type="text" name="intro" value="{{$newinfo->intro}}"><br>
		作者：<input type="text" name="author" value="{{$newinfo->author}}"><br>
		详情：<input type="text" name="info" value="{{$newinfo->info}}"><br>
		<input type="submit" value="提交">
		<input type="hidden" name='id' value="{{$newinfo->id}}">
		{{csrf_field()}}
	</form>
</body>
</html>