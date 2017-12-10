<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-19 15:04:57
         compiled from "..\app\view\error\message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:762658301cc1469c01-12614996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a8437cb72d71c85ce5475fbc1193e296a9e2a90' => 
    array (
      0 => '..\\app\\view\\error\\message.tpl',
      1 => 1441175599,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '762658301cc1469c01-12614996',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58301cc2251220_35206530',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58301cc2251220_35206530')) {function content_58301cc2251220_35206530($_smarty_tpl) {?>
    <!-- BEGIN CONTENT -->
    <div class="page-content">
        <br>
        <!-- BEGIN PAGE HEADER-->
        <!-- <h3 class="page-title">&nbsp</h3>-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row no-margin">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="alert alert-danger alert-dismissable">
                    <strong><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
!</strong>
                    <div class="media">
                        <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

                    </div>

                </div>
            </div>

        </div>	
        <!-- END PAGE CONTENT-->
    </div>
</div><?php }} ?>
