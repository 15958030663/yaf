<?php /* Smarty version Smarty-3.1.13, created on 2017-04-30 16:00:55
         compiled from "/Users/apple/Desktop/www/yaf/app/template/mis/page/index.html" */ ?>
<?php /*%%SmartyHeaderCode:73358258559060a3787d190-07828548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e55b278876401deb2bc20c3b196a5d1b396f04f9' => 
    array (
      0 => '/Users/apple/Desktop/www/yaf/app/template/mis/page/index.html',
      1 => 1489301074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73358258559060a3787d190-07828548',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_59060a37896bb1_82250524',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59060a37896bb1_82250524')) {function content_59060a37896bb1_82250524($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="/template/mis/page/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="template/mis/page/Js/index.js"></script>
<link rel="stylesheet" href="template/mis/page/Css/public.css" />
<link rel="stylesheet" href="template/mis/page/Css/index.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<base target="iframe"/>
</head>
<body>
	<div id="top">
		<div class="menu">
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
		</div>
		<div class="exit">
			<a href="/mis/login/signout" target="_self">退出</a>
			<a href="http://bbs.houdunwang.com" target="_blank">获得帮助</a>
		</div>
	</div>
	<div id="left">
		<dl>
			<dt>博文管理</dt>
			<dd><a href="/mis/login/bloglist">博文列表</a></dd>
			<dd><a href="/mis/login/addblog">添加博文</a></dd>
		</dl>
		<dl>
			<dt>属性管理</dt>
			<dd><a href="#">属性列表</a></dd>
			<dd><a href="#">添加属性</a></dd>
		</dl>
		<dl>
			<dt>分类管理</dt>
			<dd><a href="/mis/login/listcate">分类列表</a></dd>
			<dd><a href="/mis/login/addcate">添加分类</a></dd>
		</dl>
		<dl>
			<dt>系统设置</dt>
			<dd><a href="#">验证码设置</a></dd>
		</dl>
	</div>
	<div id="right">
		<iframe name="iframe" src=""></iframe>
	</div>
</body>
</html><?php }} ?>