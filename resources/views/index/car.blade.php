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
      <script src="/http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="/http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>

       <td width="75%"><span class="hui">购物车共有：<strong class="orange">{{$count}}</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(/images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr>
     </table>
     
     <div class="dingdanlist">
      <table>
       <tr>
        <td width="100%" colspan="4"><input type="checkbox" class="all" name="1" /> 全选</td>
       </tr>
       
      </table>
     </div><!--dingdanlist/-->
     
     <div class="dingdanlist">
      <table>
        @foreach($res as $k=>$v)
       <tr>
        <td width="4%"><input type="checkbox" name="1" class="one" /></td>
        <td class="dingimg" width="15%"><img src="{{env('INC')}}{{$v->goods_img}}" /></td>
        
        <td width="50%">
         <h3>{{$v->goods_name}}</h3>
         <time>下单时间：{{date('Y-m-d H:i:m',$v->add_time)}}</time>
        </td>

        <td align="right"><span>-1&nbsp&nbsp</span><strong class="orange">{{$v->buy_number}}</strong><span class="jia">&nbsp&nbsp+1</span>
        <th colspan="4"><strong class="orange">¥{{$v->goods_price}}</strong></th>
        <td width="100%" colspan="4"><a href="javascript:;">删除</a></td>
        </td>
       </tr>

       @endforeach
       <tr>
         
       </tr>
      </table>
     </div><!--dingdanlist/-->
     <div class="height1"></div>
     <div class="gwcpiao">
     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange">¥69.88</strong></td>
       <td width="40%"><a href="{{url('index/pay')}}" class="jiesuan">去结算</a></td>
      </tr>
     </table>
    </div><!--gwcpiao/-->
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/shop/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/shop/bootstrap.min.js"></script>
    <script src="/js/shop/style.js"></script>
    <!--jq加减-->
    <script src="/js/shop/jquery.spinner.js"></script>
   <script>
	$('.spinnerExample').spinner({});
	</script>
  </body>
</html>
<script type="text/javascript">
  $('.all').click(function(){
    // alert(23456);
    $('.one').prop('checked',$('.all').prop('checked'));
  })


  $('.jia').click(function(){
    // alert(345);
    
  })
</script>