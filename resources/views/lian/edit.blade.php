<form method="post" action="{{url('lian/update/'.$res->id)}}">
	@csrf
	<p>学生姓名：
		<input type="text" name="name" value="{{$res->name}}">
	</p>
	<p>学生年龄：
		<select name="age">
			<option value="18" @if($res->age==18) selected @endif>18</option>
			<option value="19" @if($res->age==19) selected @endif>19</option>
			<option value="20" @if($res->age==20) selected @endif>20</option>
			<option value="21" @if($res->age==21) selected @endif>21</option>
			<option value="22" @if($res->age==22) selected @endif>22</option>
			<option value="23" @if($res->age==23) selected @endif>23</option>
			<option value="24" @if($res->age==24) selected @endif>24</option>
			<option value="25" @if($res->age==25) selected @endif>25</option>
			<option value="26" @if($res->age==26) selected @endif>26</option>
			<option value="27" @if($res->age==27) selected @endif>27</option>
			<option value="28" @if($res->age==28) selected @endif>28</option>
		</select>
	</p>
	<p>
		家庭住址：
		<select name="sheng">
			<option value="北京市" @if($res->sheng=="北京市") selected @endif>北京市</option>
			<option value="河南省" @if($res->sheng=="河南省") selected @endif>河南省</option>
		</select>
		<select name="shi">
			<option value="沙河镇" @if($res->shi=="沙河镇") selected @endif>沙河镇</option>
			<option value="新乡市" @if($res->shi=="新乡市") selected @endif>新乡市</option>
		</select>
		<select name="qu">
			<option value="房山区" @if($res->qu=="房山区") selected @endif>房山区</option>
			<option value="新乡县" @if($res->qu=="新乡县") selected @endif>新乡县</option>
		</select>
	</p>
	<p>
		<input type="submit" value="修改">
	</p>
</form>	