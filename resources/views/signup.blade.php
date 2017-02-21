<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
</head>
<body>
	<form action="{{url('/signup')}}" method="post">
		用户名：<input type="text" name='username' class="name" readmin="请输入用户名"><span></span><br>
		密　码：<input type="password" name="pass" class="password" readmin="请输入密码"><span></span><br>
		确认密码：<input type="password" name="repass" class="repassword" readmin="确认密码"><span></span><br>
		<input type="submit" value="提交">
		{{csrf_field()}}
	</form>

	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript">
		//声明全局变量 检测input 是否输入正确
		var USER = false;
		var PASS = false;
		var REPASS = false;

		//绑定表单提交事件
		$('form').submit(function(){
			//触发所有的丧失焦点事件
			$('input').trigger('blur');
			if(USER && PASS && REPASS){
				return true;
			}

			//阻止默认行为
			return false;
		})

		//绑定获取焦点事件 显示提示信息
		$('input').focus(function(){
			//获取属性
			var text = $(this).attr('readmin');
			//设置文本
			$(this).next().html(text).css('color','green');
		})


		//用户名丧失焦点事件
		$('input[name=username]').blur(function(){
			//检测用户名是否正确
			var reg = /^\w{6,18}$/;
			//获取用户名
			var username = $(this).val();
			//检测
			var res = reg.test(username);
			if(!res){
				$(this).next().html('用户名不符合条件,6-18位的字母数字下划线').css('color','red');
				return false;
			}else{
				$(this).next().html('√').css('color','green');
				USER = true;
			}
		})

		//密码
		$('input[name=pass]').blur(function(){
			//获取密码的值
			var pass = $(this).val();
			//正则
			var reg = /^\w{6,18}$/;
			if(reg.test(pass)){
				//正确
				$(this).next().html('√').css('color','green');
				$(this).removeAttr('class');
				PASS = true;
			}else{
				//错误
				$(this).next().html('密码格式错误,6-18位数字字母下划线').css('color','red');
			}
		})

		//确认密码
		$('input[name=repass]').blur(function(){
			//获取确认密码的值
			var repass = $(this).val();
			//获取密码的值
			var pass = $('input[name=pass]').val();
			if(repass == ''){
				//错误
				$(this).next().html('请先输入密码').css('color','red');
				return false;
			}
			//判断
			if(repass == pass){
				//正确
				$(this).next().html('√').css('color','green');
				$(this).removeAttr('class');
				REPASS = true;
			}else{
				//错误
				$(this).next().html('两次输入的密码不一样').css('color','red');
			}
		})
	</script>
</body>
</html>