<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2017-10-25 06:10:19
  from "C:\xampp\htdocs\Shappy\views\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-27',
  'unifunc' => 'content_59f00eab9cf045_97860621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e511aea811da6eea1005dd9c88918bf6f5dad29' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Shappy\\views\\index.tpl',
      1 => 1508904561,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f00eab9cf045_97860621 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
	<title>Index Page</title>
</head>
<body>
	<p>Hello, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
!</p>

	<ul>
		<li>Attack: <strong><?php echo $_smarty_tpl->tpl_vars['attack']->value;?>
</strong></li>
		<li>Defence: <strong><?php echo $_smarty_tpl->tpl_vars['defence']->value;?>
</strong></li>
		<li>Magic: <strong><?php echo $_smarty_tpl->tpl_vars['magic']->value;?>
</strong></li>
		<li>Gold in Hand: <strong><?php echo $_smarty_tpl->tpl_vars['gold']->value;?>
</strong></li>
		<li>Current HP: <strong><?php echo $_smarty_tpl->tpl_vars['currentHP']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['maximumHP']->value;?>
</strong></li>
	</ul>

	<p><a href="logout.php">Logout</a></p>
	<p><a href="forest.php">The Forest</a></p>
</body>
</html>
<?php }
}
