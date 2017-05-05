<?php /* Smarty version Smarty-3.1.13, created on 2017-05-02 13:45:34
         compiled from "/Users/apple/Desktop/www/yaf/app/template/main/page/show.html" */ ?>
<?php /*%%SmartyHeaderCode:10376241835905ef209fcc46-81882273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abca1204f9cd339a6712a1456258868b4eb6edcb' => 
    array (
      0 => '/Users/apple/Desktop/www/yaf/app/template/main/page/show.html',
      1 => 1493732731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10376241835905ef209fcc46-81882273',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5905ef20a193a8_77075791',
  'variables' => 
  array (
    'data' => 0,
    'value' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5905ef20a193a8_77075791')) {function content_5905ef20a193a8_77075791($_smarty_tpl) {?><!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
-noodles</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="/../../template/main/page/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/../../template/main/page/css/nprogress.css">
<link rel="stylesheet" type="text/css" href="/../../template/main/page/css/style.css">
<link rel="stylesheet" type="text/css" href="/../../template/main/page/css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="images/icon.png">
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
<body class="user-select single">
<header class="header">
<nav class="navbar navbar-default" id="navbar">
<div class="container">
  <!--<div class="header-topbar hidden-xs link-border">-->
	<!--<ul class="site-nav topmenu">-->
	  <!--<li><a href="#" >标签云</a></li>-->
		<!--<li><a href="#" rel="nofollow" >读者墙</a></li>-->
		<!--<li><a href="#" title="RSS订阅" >-->
			<!--<i class="fa fa-rss">-->
			<!--</i> RSS订阅-->
		<!--</a></li>-->
	<!--</ul>-->
	<!--勤记录 懂分享</div>-->
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
	  <li><a data-cont="木庄网络博客" title="首页" href="/">首页</a></li>
		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['catelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
		<li><a data-cont="列表页" title="列表页" href="/?cate=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</a></li>
		<?php } ?>
	  <!--<li><a data-cont="MZ-NetBolg主题" title="MZ-NetBolg主题" href="#" >MZ-NetBolg主题</a></li>-->
	  <!--<li><a data-cont="IT技术笔记" title="IT技术笔记" href="#" >IT技术笔记</a></li>-->
	  <!--<li><a data-cont="源码分享" title="源码分享" href="#" >源码分享</a></li>-->
	  <!--<li><a data-cont="靠谱网赚" title="靠谱网赚" href="#" >靠谱网赚</a></li>-->
	  <!--<li><a data-cont="资讯分享" title="资讯分享" href="#" >资讯分享</a></li>-->
	</ul>
  </div>
</div>
</nav>
</header>
<section class="container">
<div class="content-wrap">
<div class="content">
  <header class="article-header">
	<h1 class="article-title"><a href="#" title="<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
" ><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</a></h1>
	<div class="article-meta"> <span class="item article-meta-time">
	  <time class="time" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="发表时间：2016-10-14"><i class="glyphicon glyphicon-time"></i> <?php echo $_smarty_tpl->tpl_vars['data']->value['time'];?>
</time>
	  </span> <span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="来源：木庄网络博客"><i class="glyphicon glyphicon-globe"></i> noodles博客</span> <span class="item article-meta-category" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="MZ-NetBlog主题"><i class="glyphicon glyphicon-list"></i> <a href="#" title="MZ-NetBlog主题" ><?php echo $_smarty_tpl->tpl_vars['data']->value['cate']['name'];?>
</a></span> <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="浏览量：219"><i class="glyphicon glyphicon-eye-open"></i> <?php echo $_smarty_tpl->tpl_vars['data']->value['seetime'];?>
</span> <span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="评论量"><i class="glyphicon glyphicon-comment"></i> 0</span> </div>
  </header>
  <article class="article-content">
	<?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>

	<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a></div>

		  <script>                  window._bd_share_config = { "common": { "bdSnsKey": {}, "bdText": "", "bdMini": "2", "bdMiniList": false, "bdPic": "", "bdStyle": "1", "bdSize": "32" }, "share": {} }; with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=0.js?cdnversion=' + ~(-new Date() / 36e5)];</script>
  </article>
  <div class="article-tags">标签：<a href="#list/2/" rel="tag" ><?php echo $_smarty_tpl->tpl_vars['data']->value['cate']['name'];?>
</a>
	</div>
  <div class="relates">
	<div class="title">
	  <h3>相关推荐</h3>
	</div>
	<ul>
	  <!--<li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>-->
	  <!--<li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>-->
	  <!--<li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>-->
	  <!--<li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>-->
	  <!--<li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>-->
	  <!--<li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>-->
	  <!--<li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>-->
	  <!--<li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>-->
	</ul>
  </div>
  <div class="title" id="comment">
	<h3>评论</h3>
  </div>
  <div id="respond">
		<form id="comment-form" name="comment-form" action="/comment" method="POST">
			<div class="comment">
				<input name="nickname"  class="form-control" size="22" placeholder="您的昵称（必填）" maxlength="15" autocomplete="off" tabindex="1" type="text">
				<input name="email"  class="form-control" size="22" placeholder="您的网址或邮箱（非必填）" maxlength="58" autocomplete="off" tabindex="2" type="text">
				<input name="articleid" placeholder="文章id" maxlength="15" autocomplete="off" tabindex="1" type="text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" style="display: none;">
				<div class="comment-box">
					<textarea placeholder="您的评论或留言（必填）" name="content" id="comment-textarea" cols="100%" rows="3" tabindex="3"></textarea>
					<div class="comment-ctrl">
						<div class="comment-prompt" style="display: none;"> <i class="fa fa-spin fa-circle-o-notch"></i> <span class="comment-prompt-text">评论正在提交中...请稍后</span> </div>
						<div class="comment-success" style="display: none;"> <i class="fa fa-check"></i> <span class="comment-prompt-text">评论提交成功...</span> </div>
						<button type="submit" name="comment-submit" id="comment-submit" tabindex="4">评论</button>
					</div>
				</div>
			</div>
		</form>
		
	</div>
  <div id="postcomments">
	<ol id="comment_list" class="commentlist">
		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['commentlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
	<li class="comment-content"><span class="comment-f">#<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span><div class="comment-main"><p><a class="address" href="#" rel="nofollow" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value['nickname'];?>
</a><span class="time">(<?php echo $_smarty_tpl->tpl_vars['value']->value['time'];?>
)</span><br><?php echo $_smarty_tpl->tpl_vars['value']->value['content'];?>
</p></div></li>
  		<?php } ?>
  </div>
</div>
</div>
<aside class="sidebar">
<div class="fixed">
  <div class="widget widget-tabs">
	<ul class="nav nav-tabs" role="tablist">
	  <li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab" draggable="false">统计信息</a></li>
	</ul>
	<div class="tab-content">
	  <div role="tabpanel" class="tab-pane contact active" id="notice">
		<h2>文章总数:
			  <?php echo $_smarty_tpl->tpl_vars['data']->value['num'];?>
篇
		  </h2>
		  <!--<h2>网站运行:-->
		  <!--<span id="sitetime">88天 </span></h2>-->
	  </div>
		<div role="tabpanel" class="tab-pane contact" id="contact">
		  <h2>QQ:
			  <a href="" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title="" draggable="false" data-original-title="QQ:577211782">577211782</a>
		  </h2>
		  <h2>Email:
		  <a href="mailto:577211782@qq.com" target="_blank" data-toggle="tooltip" rel="nofollow" data-placement="bottom" title="" draggable="false" data-original-title="Email:577211782@qq.com">577211782@qq.com</a></h2>
	  </div>
	</div>
  </div>
  <div class="widget widget_search">
	<!-- <form class="navbar-form" action="/Search" method="post">
	  <div class="input-group">
		<input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
		<span class="input-group-btn">
		<button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
		</span> </div>
	</form> -->
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
" href="/article?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" ><span class="thumbnail">
<img class="thumb" data-original="images/201610181739277776.jpg" src="<?php echo $_smarty_tpl->tpl_vars['value']->value['cover'];?>
" alt=""  style="display: block;">
</span><span class="text"><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</span><span class="muted"><i class="glyphicon glyphicon-time"></i>
<?php echo $_smarty_tpl->tpl_vars['value']->value['time'];?>

</span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i><?php echo $_smarty_tpl->tpl_vars['value']->value['seetime'];?>
</span></a></li>
		  <?php } ?>

	  </ul>
  </div>
  <div class="widget widget_sentence">

<!--<a href="#" target="_blank" rel="nofollow" title="MZ-NetBlog主题" >-->
	<!--<img style="width: 100%" src="images/ad.jpg" alt="MZ-NetBlog主题" ></a>-->

<!--</div>-->
  <!--<div class="widget widget_sentence">-->

<!--<a href="#" target="_blank" rel="nofollow" title="专业网站建设" >-->
	<!--<img style="width: 100%" src="images/201610241224221511.jpg" alt="专业网站建设" ></a>-->

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