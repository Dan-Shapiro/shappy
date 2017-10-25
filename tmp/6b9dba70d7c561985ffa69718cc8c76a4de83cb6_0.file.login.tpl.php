<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2017-10-25 03:17:29
  from "C:\xampp\htdocs\Shappy\views\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-27',
  'unifunc' => 'content_59efe629c47ae4_28711902',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b9dba70d7c561985ffa69718cc8c76a4de83cb6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Shappy\\views\\login.tpl',
      1 => 1508894049,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59efe629c47ae4_28711902 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<?php if ($_smarty_tpl->tpl_vars['error']->value != '') {?>
		<span style='color:red'>Error: <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</span>
	<?php }?>

	<form action='login.php' method='post'>
	Username: <input type="text" name="username" id="username" /><br />
	Password: <input type="password" name="password" /><br />
	<input type="submit" name="Login" />
	</form>

	<?php echo '<script'; ?>
 type='text/javascript'>
		document.getElementById('username').focus();
	<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
