<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('/resources/views/admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('/resources/views/admin/style/font/css/font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Blog</h1>
		<h2>欢迎使用博客管理平台</h2>
		<div class="form">
			@if(isset($msg))
				<p style="color:red" id="wornMsg">{{$msg}}</p>
			@endif
			<form action="{{url('admin/login')}}" method="post">
				{{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="username" class="text" onfocus="hiddleMsg()"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}'">
					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2017 Powered by <a href="#" target="_blank">pjjuping@gmail.com</a></p>
		</div>
	</div>
	<script>
		function hiddleMsg() {
			document.getElementById('wornMsg').style.display='none';
		}
	</script>

</body>
</html>