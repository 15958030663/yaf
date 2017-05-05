<?php /* Smarty version Smarty-3.1.13, created on 2017-05-03 10:34:32
         compiled from "/Users/apple/Desktop/www/yaf/app/template/main/page/index.html" */ ?>
<?php /*%%SmartyHeaderCode:7126749045905e5480d44e7-04713822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3741202c6ae1b93bc8b40096f723318e8b34fbf' => 
    array (
      0 => '/Users/apple/Desktop/www/yaf/app/template/main/page/index.html',
      1 => 1493807666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7126749045905e5480d44e7-04713822',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5905e5480f9f56_06755058',
  'variables' => 
  array (
    'data' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5905e5480f9f56_06755058')) {function content_5905e5480f9f56_06755058($_smarty_tpl) {?><!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>面条博客</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="/../../template/main/page/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/../../template/main/page/css/nprogress.css">
<link rel="stylesheet" type="text/css" href="/../../template/main/page/css/style.css">
<link rel="stylesheet" type="text/css" href="/../../template/main/page/css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="/../../template/main/page/images/icon.png">
<link rel="shortcut icon" href="http://onzqo4moo.bkt.clouddn.com/logo.png">
<script src="/../../template/main/page/js/jquery-2.1.4.min.js"></script>
<script src="/../../template/main/page/js/nprogress.js"></script>
<script src="/../../template/main/page/js/jquery.lazyload.min.js"></script>
<!--[if gte IE 9]>
  <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="js/html5shiv.min.js" type="text/javascript"></script>
  <script src="js/respond.min.js" type="text/javascript"></script>
  <script src="js/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 9]>
  <script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
</head>
<body class="user-select">
<header class="header">
<nav class="navbar navbar-default" id="navbar">
<div class="container">
  <!-- <div class="header-topbar hidden-xs link-border">
	<ul class="site-nav topmenu">
	  <li><a href="#" >标签云</a></li>
		<li><a href="#" rel="nofollow" >读者墙</a></li>
		<li><a href="#" title="RSS订阅" >
			<i class="fa fa-rss">
			</i> RSS订阅
		</a></li>
	</ul>
			 勤记录 懂分享</div> -->
  <div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
	<h1 class="logo hvr-bounce-in"><a href="#" title="木庄网络博客"><img src="/../../template/main/page/images/noodles.jpg" alt="木庄网络博客" style="height: 60px;width: 180px;"></a></h1>
  </div>
  <div class="collapse navbar-collapse" id="header-navbar">
	<form class="navbar-form visible-xs" action="/Search" method="post">
	  <div class="input-group">
		<input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20" autocomplete="off">
		<span class="input-group-btn">
		<button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
		</span> </div>
	</form>
	<ul class="nav navbar-nav navbar-right">
	  <li><a data-cont="" title="" href="/">首页</a></li>
		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
	       <li><a data-cont="列表页" title="列表页" href="/?cate=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</a></li>
		<?php } ?>
	  <!-- <li><a data-cont="404" title="404" href="404.html">404</a></li>
	  <li><a data-cont="MZ-NetBolg主题" title="MZ-NetBolg主题" href="#" >MZ-NetBolg主题</a></li>
	  <li><a data-cont="IT技术笔记" title="IT技术笔记" href="#" >IT技术笔记</a></li>
	  <li><a data-cont="源码分享" title="源码分享" href="#" >源码分享</a></li>
	  <li><a data-cont="靠谱网赚" title="靠谱网赚" href="#" >靠谱网赚</a></li>
	  <li><a data-cont="资讯分享" title="资讯分享" href="#" >资讯分享</a></li> -->
	</ul>
  </div>
</div>
</nav>
</header>
<section class="container">
<div class="content-wrap">
<div class="content">
  <div id="focusslide" class="carousel slide" data-ride="carousel">
	<!-- <ol class="carousel-indicators">
	  <li data-target="#focusslide" data-slide-to="0" class="active"></li>
	  <li data-target="#focusslide" data-slide-to="1"></li>
	</ol> -->
	<!-- <div class="carousel-inner" role="listbox"> -->
	  <!-- <div class="item active">
	  <a href="#" target="_blank" title="木庄网络博客源码" >
	  <img src="images//201610181557196870.jpg" alt="木庄网络博客源码" class="img-responsive"></a>
	  </div> -->
	  <!-- <div class="item">
	  <a href="#" target="_blank" title="专业网站建设" >
	  <img src="images//201610241227558789.jpg" alt="专业网站建设" class="img-responsive"></a>
	  </div> -->
	<!-- </div> -->
	<!-- <a class="left carousel-control" href="#focusslide" role="button" data-slide="prev" rel="nofollow"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">上一个</span> </a> <a class="right carousel-control" href="#focusslide" role="button" data-slide="next" rel="nofollow"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">下一个</span> </a> --> </div>
  <!--<article class="excerpt-minic excerpt-minic-index">-->
		<!--<h2><span class="red">【推荐】</span><a target="_blank" href="#" title="用DTcms做一个独立博客网站（响应式模板）" >用DTcms做一个独立博客网站（响应式模板）</a>-->
		<!--</h2>-->
		<!--<p class="note">用DTcms做一个独立博客网站（响应式模板），采用DTcms V4.0正式版（MSSQL）。开发环境：SQL2008R2+VS2010。DTcms V4.0正式版功能修复和优化：1、favicon.ico图标后台上传。（解决要换图标时要连FTP或者开服务器的麻烦）</p>-->
	<!--</article>-->
  <div class="title">
	<h3>最新发布</h3>
	<div class="more">                
			<!--<a href="#" title="MZ-NetBlog主题" >MZ-NetBlog主题</a>                -->
			<!--<a href="#" title="IT技术笔记" >IT技术笔记</a>                -->
			<!--<a href="#" title="源码分享" >源码分享</a>                -->
			<!--<a href="#" title="靠谱网赚" >靠谱网赚</a>                -->
			<!--<a href="#" title="资讯分享" >资讯分享</a>                -->
		</div>
  </div>
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
  <article class="excerpt excerpt-1" style="">
  <a class="focus" href="/main/article?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" title="" target="_blank" ><img class="thumb" data-original="images/201610181739277776.jpg" src="<?php echo $_smarty_tpl->tpl_vars['value']->value['cover'];?>
" alt="用DTcms做一个独立博客网站（响应式模板）"  style="display: inline;"></a>
		<header><a class="cat" href="#" title="" ><?php echo $_smarty_tpl->tpl_vars['value']->value['cate_name'];?>
<i></i></a>
			<h2><a href="/main/article?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" title="" target="_blank" ><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</a>
			</h2>
		</header>
		<p class="meta">
			<time class="time"><i class="glyphicon glyphicon-time"></i> <?php echo $_smarty_tpl->tpl_vars['value']->value['time'];?>
</time>
			<span class="views"><i class="glyphicon glyphicon-eye-open"></i> <?php echo $_smarty_tpl->tpl_vars['value']->value['seetime'];?>
</span> <a class="comment" href="##comment" title="评论" target="_blank" ><i class="glyphicon glyphicon-comment"></i> <?php echo $_smarty_tpl->tpl_vars['value']->value['comment_num'];?>
</a>
		</p>
		<p class="note"><?php echo $_smarty_tpl->tpl_vars['value']->value['descr'];?>
</p>
  </article>
	<?php } ?>
  <nav class="pagination" style="">
	<ul>
		<?php echo $_smarty_tpl->tpl_vars['data']->value['pagebar'];?>

	  <li style="float: right;"><span>共 <?php echo $_smarty_tpl->tpl_vars['data']->value['pages'];?>
 页</span></li>
	</ul>

  </nav>
</div>
</div>
<aside class="sidebar">
<div class="fixed">
<!--   <div class="widget widget-tabs">
	<ul class="nav nav-tabs" role="tablist">
	  <li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab" >统计信息</a></li>
	  <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab" >联系站长</a></li>
	</ul>
	<div class="tab-content">
	  <div role="tabpanel" class="tab-pane contact active" id="notice">
		<h2>日志总数:
			  888篇
		  </h2>
		  <h2>网站运行:
		  <span id="sitetime">88天 </span></h2>
	  </div>
		<div role="tabpanel" class="tab-pane contact" id="contact">
		  <h2>QQ:
			  <a href="" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title=""  data-original-title="QQ:"></a>
		  </h2>
		  <h2>Email:
		  <a href="#" target="_blank" data-toggle="tooltip" rel="nofollow" data-placement="bottom" title=""  data-original-title="#"></a></h2>
	  </div>
	</div> 
  </div>-->
  <div class="widget widget_search">
	<form class="navbar-form" action="/" method="get">
	  <div class="input-group">
		<input type="text" name="word" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['word'];?>
">
		<span class="input-group-btn">
		<button class="btn btn-default btn-search" name="" type="submit">搜索</button>
		</span> </div>
	</form>
  </div>
</div>
<div class="widget widget_sentence">
	<h3>标签</h3>
	<div class="widget-sentence-content">
		<ul class="plinks ptags">                
			<li><a href="/?cate=1" title="移动统计" draggable="false">php <span class="badge"></span></a></li>
			<li><a href="/?cate=2" title="404" draggable="false">mysql <span class="badge"></span></a></li>
			<li><a href="/?cate=3" title="VS2010" draggable="false">linux <span class="badge"></span></a></li>
		</ul>
	</div>
  </div>
<div class="widget widget_hot">
	  <h3>最新评论文章</h3>
	  <ul>
		  <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['commentarticle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
		  <li><a title="<?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
" href="/main/article?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" ><span class="thumbnail">
			<img class="thumb" data-original="images/201610181739277776.jpg" src="<?php echo $_smarty_tpl->tpl_vars['value']->value['cover'];?>
" alt=""  style="display: block;">
			</span><span class="text"><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</span><span class="muted"><i class="glyphicon glyphicon-time"></i>
			<?php echo $_smarty_tpl->tpl_vars['value']->value['time'];?>

			</span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i><?php echo $_smarty_tpl->tpl_vars['value']->value['seetime'];?>
</span></a>
		  </li>
		  <?php } ?>

	  </ul>
	  
 </div>
 <!--<div class="widget widget_sentence">    -->
	<!--<a href="#" target="_blank" rel="nofollow" title="专业网站建设" >-->
	<!--<img style="width: 100%" src="images//201610241224221511.jpg" alt="专业网站建设" ></a>    -->
 <!--</div>-->
 <!--<div class="widget widget_sentence">    -->
	<!--<a href="#" target="_blank" rel="nofollow" title="MZ-NetBlog主题" >-->
	<!--<img style="width: 100%" src="images/ad.jpg" alt="MZ-NetBlog主题" ></a>    -->
 <!--</div>-->
<!--<div class="widget widget_sentence">-->
  <!--<h3>友情链接</h3>-->
  <!--<div class="widget-sentence-link">-->
	<!--<a href="#" title="网站建设" target="_blank" >网站建设</a>&nbsp;&nbsp;&nbsp;-->
  <!--</div>-->
<!--</div>-->
</aside>
</section>
<footer class="footer">
<div class="container">
	<p>design by @noodles<a target="_blank" href="http://www.miitbeian.gov.cn/">浙ICP备17014504</a> </p>
</div>
<div id="gotop"><a class="gotop"></a></div>
</footer>
<script src="/../../template/main/page/js/bootstrap.min.js"></script>
<script src="/../../template/main/page/js/jquery.ias.js"></script>
<script src="/../../template/main/page/js/scripts.js"></script>
</body>
</html>
<?php }} ?>