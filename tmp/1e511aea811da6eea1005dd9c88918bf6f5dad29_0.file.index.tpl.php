<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2017-10-25 05:56:14
  from "C:\xampp\htdocs\Shappy\views\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-27',
  'unifunc' => 'content_59f00b5e0d0d63_51091079',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e511aea811da6eea1005dd9c88918bf6f5dad29' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Shappy\\views\\index.tpl',
      1 => 1508903440,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f00b5e0d0d63_51091079 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
	<title>Index Page</title>
</head>
<body>
	<p>Hello, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
!</p>
	<p><a href="logout.php">Logout</a></p>

	<ul>
		<li>Attack: <strong><?php echo $_smarty_tpl->tpl_vars['attack']->value;?>
</strong></li>
		<li>Defence: <strong><?php echo $_smarty_tpl->tpl_vars['defence']->value;?>
</strong></li>
		<li>Magic: <strong><?php echo $_smarty_tpl->tpl_vars['magic']->value;?>
</strong></li>
		<li>Gold: <strong><?php echo $_smarty_tpl->tpl_vars['gold']->value;?>
</strong></li>
	</ul>
</body>
</html>
<?php }
}
