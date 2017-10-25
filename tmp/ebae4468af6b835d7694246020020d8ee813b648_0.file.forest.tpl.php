<?php
/* Smarty version {Smarty::SMARTY_VERSION}, created on 2017-10-25 06:51:09
  from "C:\xampp\htdocs\Shappy\views\forest.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-27',
  'unifunc' => 'content_59f0183d42e9c9_55426150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ebae4468af6b835d7694246020020d8ee813b648' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Shappy\\views\\forest.tpl',
      1 => 1508907024,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f0183d42e9c9_55426150 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
	<title>The Forest</title>
</head>
<body>
	<?php if ($_smarty_tpl->tpl_vars['combat']->value == '') {?>
		<p>You've encountered a <?php echo $_smarty_tpl->tpl_vars['monster']->value;?>
!</p>
		<form action="forest.php" method="post">
			<input type="submit" name="action" value="Attack" /> or
			<input type="submit" name="action" value="Run Away" />
			<input type="hidden" name="monster" value="<?php echo $_smarty_tpl->tpl_vars['monster']->value;?>
" />
		</form>
	<?php } else { ?>
		<ul>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['combat']->value, 'i', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
				<li><strong><?php echo $_smarty_tpl->tpl_vars['i']->value['attacker'];?>
</strong> attacks <?php echo $_smarty_tpl->tpl_vars['i']->value['defender'];?>
 for <?php echo $_smarty_tpl->tpl_vars['i']->value['damage'];?>
 damage!</li>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

		</ul>

		<?php if ($_smarty_tpl->tpl_vars['won']->value == 1) {?>
			<p>You killed <strong><?php echo $_POST['monster'];?>
</strong>!</p>
			<p>You gained <strong><?php echo $_smarty_tpl->tpl_vars['gold']->value;?>
</strong> gold.</p>
			<p><a href="forest.php">Explore Again</a></p>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['lost']->value == 1) {?>
			<p>You were killed by <strong><?php echo $_POST['monster'];?>
</strong>.</p>
		<?php }?>
	<?php }?>
</body>
</html>
<?php }
}
