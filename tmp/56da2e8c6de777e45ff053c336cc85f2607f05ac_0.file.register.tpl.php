<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2017-10-25 01:15:17
  from "C:\xampp\htdocs\Shappy\views\register.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-27',
  'unifunc' => 'content_59efc9855713d4_04653007',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56da2e8c6de777e45ff053c336cc85f2607f05ac' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Shappy\\views\\register.tpl',
      1 => 1508886095,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59efc9855713d4_04653007 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<?php if ($_smarty_tpl->tpl_vars['error']->value != '') {?>
		<span style='color:red;'>Error: <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</span>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['message']->value != '') {?>
		<span style='color:green;'><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</span>
	<?php }?>

	<form method='post' action='register.php'>
		Username: <input type="text" name="username" id="username" /><br />
		Password: <input type="password" name="password" /><br />
		Confirm Password: <input type="password" name="confirm" /><br />
		Email: <input type="text" name="email" /><br />
		<input type="submit" name="Register" />
	</form>
	<?php echo '<script'; ?>
 type="text/javascript">
		document.getElementById('username').focus();
	<?php echo '</script'; ?>
>
</body>
</html><?php }
}
