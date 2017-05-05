<?php /* Smarty version Smarty-3.1.13, created on 2017-04-30 16:00:55
         compiled from "/Users/apple/Desktop/www/yaf/app/template/mis/page/login.html" */ ?>
<?php /*%%SmartyHeaderCode:194244073759060a378c8a34-19673630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ceb1dfaf59249a5ac9e2074807a5f2c03b573e41' => 
    array (
      0 => '/Users/apple/Desktop/www/yaf/app/template/mis/page/login.html',
      1 => 1491442701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194244073759060a378c8a34-19673630',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_59060a378e7545_34250680',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59060a378e7545_34250680')) {function content_59060a378e7545_34250680($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>

		<link rel="stylesheet" href="../../template/mis/page/Css/login.css" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<script type="text/javascript" src="../../template/mis/page/Js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="../../template/mis/page/Js/login.js"></script>
		<link rel="stylesheet" href="../../template/mis/page/Css/public.css" />
	</head>
	<body>

		<div id="top">

		</div>
		<div class="login">	
			<form action="/mis/login/signin" method="post" id="login">
			<div class="title">
				登录后台
			</div>
			<input type="hidden" name="_csrf" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['csrf_token'];?>
"/>
			<table border="1" width="100%">
				<tr>
					<th>管理员帐号:</th>
					<td>
						<input type="username" name="username" class="len250"/>
					</td>
				</tr>
				<tr>
					<th>密码:</th>
					<td>
						<input type="password" class="len250" name="password"/>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding-left:160px;"> <input type="submit" class="submit" value="登录"/></td>
				</tr>
			</table>
		</form>
	</div>
	</body>
</html><?php }} ?>