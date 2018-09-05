
<!doctype html>
<html>
<head>
<meta charset="gbk">
<title>iYM的个人博客</title>
<meta name="keywords" content="个人博客,杨青个人博客,个人博客模板,杨青" />
<meta name="description" content="杨青个人博客，是一个站在web前端设计之路的女程序员个人网站，提供个人博客模板免费资源下载的个人原创网站。" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/home/css/base.css" rel="stylesheet">
<link href="/home/css/index.css" rel="stylesheet">
<link href="/home/css/info.css" rel="stylesheet">
<link href="/home/css/m.css" rel="stylesheet">
<script src="/home/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/home/js/comm.js"></script>
<!--[if lt IE 9]>
<script src="/home/js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<header class="header-navigation" id="header">
  <nav><div class="logo"><a href="/">iYM个人博客</a></div>
    <h2 id="mnavh"><span class="navicon"></span></h2>
    <ul id="starlist">
      <li style="cursor:pointer"><a href="/">网站首页</a></li>
      <li style="cursor:pointer"><a href="/home/me">关于我</a></li>
      <li style="cursor:pointer"><a href="/home/article_list" >文章列表</a></li>
      <li id='ym' style="cursor:pointer">YM专区</li>
      
    </ul>
</nav>
</header>
<article>
  <aside class="l_box">
      
      @yield('me')

      
      @yield('search')
      @yield('fenlei')
      
      @yield('link')
      <div class="guanzhu">
        <h2>关注我 么么哒</h2>
        <ul>
          <img src="/home/images/wx.jpg">
        </ul>
      </div>
  </aside>
  
    @yield('content')
  
</article>
<footer>
  <p>Design by <a href="http://www.yangqq.com" target="_blank">iYM个人博客</a> <a href="/">贵ICP备11002373号-1</a></p>
</footer>
<a href="#" class="cd-top">Top</a>
<script>
  $(function(){
    $('#ym').click(function(){
      alert('jiayou ');
    });
    
  });
</script>
</body>
</html>
