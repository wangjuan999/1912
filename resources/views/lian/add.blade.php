<form method="post" action="{{url('lian/add_do')}}">
	@csrf
	<p>学生姓名：
		<input type="text" name="name">
	</p>
	<p>学生年龄：
		<select name="age">
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
		</select>
	</p>
	<p>
		家庭住址：
		<select name="sheng">
			<option value="北京市">北京市</option>
			<option value="河南省">河南省</option>
		</select>
		<select name="shi">
			<option value="沙河镇">沙河镇</option>
			<option value="新乡市">新乡市</option>
		</select>
		<select name="qu">
			<option value="房山区">房山区</option>
			<option value="新乡县">新乡县</option>
		</select>
	</p>
	<p>
		<input type="submit" value="添加">
	</p>
</form>