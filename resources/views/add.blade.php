

<form action="{{route('do')}}" method="post" enctype="multipart/form-data">
	@csrf
	<p>姓名：<input type="text" name="name"></p>
	<p>年龄：<input type="number" name="age"></p>
	<p>性别：<input type="radio" name="sex" value="0">男 <input type="radio" name="sex" value="1">女</p>
	<p>头像上传：
	<input type="file" name="headimg"></p>
	<p><button>添加</button></p>
</form>

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif