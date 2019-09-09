<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <title>三级分销</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
    
    <!-- Bootstrap -->
    <link href="/css/shop/bootstrap.min.css" rel="stylesheet">
    <link href="/css/shop/style.css" rel="stylesheet">
    <link href="/css/shop/response.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     <div id="sliderA" class="slider">
      @foreach($goodsdatas as $k=>$v)
      <img src="{{env('INC')}}{{$v->goods_img}}"></a>
      
     </div><!--sliderA/-->
     <table class="jia-len">
      <tr>
       <th><strong class="orange">￥{{$v->goods_price}}</strong></th>
       <td>
        @endforeach
        <input type="text" class="spinnerExample" />
       </td>
      </tr>
      <tr>
        @foreach($goodsdatas as $k=>$v)
       <td>
        <strong>{{$v->goods_name}}</strong>
        <p class="hui">{{$v->goods_detal}}</p>
       </td>
       <td align="right">
        <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
       </td>
      </tr>
      @endforeach
     </table>
    
     <div class="zhaieq" >
      <a href="javascript:;"  class="zhaiCur">商品简介</a>
    
      <div class="clearfix"></div>
     </div><!--zhaieq/-->
     <div class="proinfoList">
      @foreach($goodsdatas as $k=>$v)
      <!-- <img src="{{env('INC')}}{{$v->goods_img}}" width="300" height="400" /> -->
      
        <td>
          {{$v->goods_detal}}
        </td>
      
      
     
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息....
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息......
     </div><!--proinfoList/-->
     <table class="jrgwc">
      <tr>
       <th>
        <a href="index.html"><span class="glyphicon glyphicon-home"></span></a>
       </th>

       <td><a href="{{url('index/detail_do/'.$v->goods_id)}}">加入购物车</a></td>
      </tr>
     </table>
      @endforeach
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/shop/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/shop/bootstrap.min.js"></script>
    <script src="/js/shop/style.js"></script>
    <!--焦点轮换-->
    <script src="/js/shop/jquery.excoloSlider.js"></script>
    <script src="/js/jq.js"></script>
    <script>
		$(function () {
		 $("#sliderA").excoloSlider();
		});
	</script>
     <!--jq加减-->
    <script src="/js/shop/jquery.spinner.js"></script>
   <script>
	$('.spinnerExample').spinner({});
	</script>
  </body>
</html>


<!-- <script type="text/javascript">
  $('.incar').click(function(){
    // alert(34567);
    event.preventDefault();
  })
</script> -->