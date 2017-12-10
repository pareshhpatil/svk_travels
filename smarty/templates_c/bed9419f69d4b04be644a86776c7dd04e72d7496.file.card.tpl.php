<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-23 00:31:08
         compiled from "..\app\view\admin\master\card.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2498583495f4358647-83674240%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bed9419f69d4b04be644a86776c7dd04e72d7496' => 
    array (
      0 => '..\\app\\view\\admin\\master\\card.tpl',
      1 => 1479841259,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2498583495f4358647-83674240',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'success' => 0,
    'title' => 0,
    'list' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_583495f471a6f5_24060164',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583495f471a6f5_24060164')) {function content_583495f471a6f5_24060164($_smarty_tpl) {?>
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->

    <!-- END PAGE HEADER-->

    <!-- BEGIN SEARCH CONTENT-->
    <!-- BEGIN SEARCH CONTENT-->

    <!-- BEGIN PAGE CONTENT-->
    <div class="row" id="list">
        <div class="col-md-12">
            <?php if ($_smarty_tpl->tpl_vars['success']->value!='') {?>
                <div class="alert alert-block alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <p>Success! <?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</p>
                </div>
            <?php }?>
            <!-- BEGIN PAYMENT TRANSACTION TABLE -->

            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                    </div>
                    <div class="tools">

                        <a onclick="document.getElementById('insert').style.display = 'block';
                                document.getElementById('list').style.display = 'none';" style="color: #ffffff;" data-original-title="" title="">
                            New <i class="fa fa-plus"></i>
                        </a>

                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th class="td-c">
                                        Card name
                                    </th>
                                    <th class="td-c">
                                        Action?
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <tr>
                                        <td class="td-c">
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>

                                        </td>
                                        <td class="td-c">
                                            <a  onclick="getDetails('<?php echo $_smarty_tpl->tpl_vars['v']->value['encrypted_id'];?>
', 'card');" data-toggle="modal"  href="#driver"  class="btn btn-xs green"><i class="fa fa-list"></i></a>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- END PAYMENT TRANSACTION TABLE -->
        </div>
    </div>

    <div class="row" style="display: none;" id="insert">
        <form action="" method="post" id="customerForm" enctype="multipart/form-data" class="form-horizontal">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">Card name<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="text" name="name" required value="" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Bank name<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="text" name="bank"  value="" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Type<span class="required">* </span></label>
                    <div class="col-md-7">
                        <select name="type" required class="form-control" data-placeholder="Select...">
                            <option value="Credit">Credit card</option>
                            <option value="Debit">Debit card</option>
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <div class="modal-footer">
                        <h4 id="status"></h4>
                        <p id="loaded_n_total"></p>
                        <button id="savebutton" type="submit" onclick="return uploadfile('card');" class="btn blue">Save</button>
                        <a href="" class="btn default" >Close</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <!-- END PAGE CONTENT-->
</div>
</div>
<!-- END CONTENT -->

<div class="modal fade bs-modal-lg in" id="driver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn default pull-right" id="closebutton" data-dismiss="modal">Close</button>
                <h4 class="modal-title">Card details</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="row">
                                <div class="col-md-12" id="detail">

                                </div>
                            </div>
                            <!-- End profile details -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </form>		
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><?php }} ?>
