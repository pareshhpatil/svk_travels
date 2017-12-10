<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-10-22 01:29:39
         compiled from "..\app\view\admin\transaction\fuel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1446958373cba94d192-95155414%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc048f22dd89a598d21fc376ecabd07b50a277ce' => 
    array (
      0 => '..\\app\\view\\admin\\transaction\\fuel.tpl',
      1 => 1482944572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1446958373cba94d192-95155414',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58373cbabbaa49_72718128',
  'variables' => 
  array (
    'success' => 0,
    'title' => 0,
    'list' => 0,
    'v' => 0,
    'vehiclelist' => 0,
    'driverlist' => 0,
    'current_date' => 0,
    'cardlist' => 0,
    'vendorlist' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58373cbabbaa49_72718128')) {function content_58373cbabbaa49_72718128($_smarty_tpl) {?>
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
                                        Date
                                    </th>
                                    <th class="td-c">
                                        Vehicle
                                    </th>
                                    <th class="td-c">
                                        Litre
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
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value['date'];?>

                                        </td>
                                        <td class="td-c">
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value['vehicle'];?>

                                        </td>
                                        <td class="td-c">
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value['litre'];?>

                                        </td>
                                        <td class="td-c">
                                            <a  onclick="getDetails('<?php echo $_smarty_tpl->tpl_vars['v']->value['encrypted_id'];?>
', 'fuel','master');" data-toggle="modal"  href="#driver"  class="btn btn-xs green"><i class="fa fa-list"></i></a>
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
                    <label class="control-label col-md-4">Vehicle<span class="required">* </span></label>
                    <div class="col-md-7">
                        <select name="vehicle_id" required class="form-control" data-placeholder="Select...">
                            <option value="0">Select vehicle</option>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vehiclelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['vehicle_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Driver<span class="required">* </span></label>
                    <div class="col-md-7">
                        <select name="driver_id" required class="form-control" data-placeholder="Select...">
                            <option value="0">Select driver</option>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['driverlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['driver_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Amount<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="number" pattern="[0-9]*" name="amount"   class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Litre<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="number" pattern="[0-9]*" name="litre"   class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Date<span class="required"> </span></label>
                    <div class="col-md-7">
                        <input type="text" name="date" readonly="" value="<?php echo $_smarty_tpl->tpl_vars['current_date']->value;?>
" autocomplete="off" class="form-control form-control-inline date-picker" data-date-format="dd M yyyy" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Mode<span class="required">* </span></label>
                    <div class="col-md-7">
                        <select name="mode" required class="form-control" onchange="modechange(this.value);" data-placeholder="Select...">
                            <option value="Credit card">Credit card</option>
                            <option value="Vendor">Vendor</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="card">
                    <label class="control-label col-md-4">Credit card<span class="required">* </span></label>
                    <div class="col-md-7">
                        <select name="card_id" required class="form-control" data-placeholder="Select...">
                            <option value="0">Select creditcard</option>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cardlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['card_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="vendor" style="display: none;">
                    <label class="control-label col-md-4">Vendor<span class="required">* </span></label>
                    <div class="col-md-7">
                        <select name="vendor_id" required class="form-control" data-placeholder="Select...">
                            <option value="0">Select vendor</option>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vendorlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['vendor_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Note<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="text" name="note"   class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Upload photo<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="file"  id="fileupload" accept="image/*"  name="uploaded_file[]">
                    </div>
                </div>
                <div class="form-group">
                    <div class="modal-footer">
                        <h4 id="status"></h4>
                        <p id="loaded_n_total"></p>
                        <button id="savebutton" type="submit" onclick="return uploadfile('fuel');" class="btn blue">Save</button>
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
                <h4 class="modal-title">Fuel details</h4>
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
