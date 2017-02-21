<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新闻发布系统</title>
</head>
<body>
	<center><h2>新闻发布系统</h2></center>
	<center>
	<p><a href="{{url('/news/add')}}">发布新消息</a></p>
	<table border='1px' cellspacing='0'>
		<tr><td>序号</td><td>ID</td><td>标题</td><td>摘要</td><td>作者</td><td>发布时间</td><td>操作</td></tr>
		@foreach($newsinfo as $v=>$k)
		<tr><td>{{$v+1}}</td><td>{{$k->id}}</td><td>{{$k->title}}</td><td>{{$k->intro}}</td><td>{{$k->author}}</td><td>{{$k->addtime}}</td><td><a href="{{url('/news/edit',[$k->id])}}">&nbsp;修改&nbsp;</a>|<a href="{{url('/news/delete',[$k->id])}}">&nbsp;删除&nbsp;</a></td></tr>
		@endforeach
	</table>
	</center>
</body>
</html>