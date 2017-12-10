<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-10-31 22:48:16
         compiled from "..\app\view\admin\vehicle\replace.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2012159f8a9eb6f13f2-09323987%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6845bcabbf1fe88fa9ccaeee26d58c72d320ced' => 
    array (
      0 => '..\\app\\view\\admin\\vehicle\\replace.tpl',
      1 => 1509470294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2012159f8a9eb6f13f2-09323987',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59f8a9ecdf05f3_44312911',
  'variables' => 
  array (
    'success' => 0,
    'list' => 0,
    'v' => 0,
    'vehiclelist' => 0,
    'current_date' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f8a9ecdf05f3_44312911')) {function content_59f8a9ecdf05f3_44312911($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\php\\smartylibs\\Smarty\\plugins\\modifier.date_format.php';
?>
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
                        Replace Cab
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
                                        Vehicle number
                                    </th>
                                    <th class="td-c">
                                        Replace with
                                    </th>
                                    <th class="td-c">
                                        Time
                                    </th>
                                    <th class="td-c">
                                        Amount
                                    </th>
                                    <th class="td-c">
                                        Paid
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
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value['vehicle_number'];?>

                                        </td>
                                        <td class="td-c">
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value['vehicle'];?>

                                        </td>
                                        <td class="td-c">
                                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['in_time'],"%I:%M %p");?>
 To <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['out_time'],"%I:%M %p");?>

                                        </td>
                                        <td class="td-c">
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>

                                        </td>
                                        <td class="td-c">
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value['is_paid'];?>

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
        <form action="/admin/vehicle/replacesaved" method="post" id="customerForm" enctype="multipart/form-data" class="form-horizontal">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">Vehicle Number<span class="required"> *</span></label>
                    <div class="col-md-7">
                        <input type="text" required="" name="vehicle_number"  class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Owner name<span class="required"> </span></label>
                    <div class="col-md-7">
                        <input type="text" name="owner_name"  class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4">Replace with<span class="required">* </span></label>
                    <div class="col-md-7">
                        <select name="replace_vehicle_id" required class="form-control" data-placeholder="Select...">
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
                    <label class="control-label col-md-4">In time</label>
                    <div class="col-md-7">
                        <div class="input-group">
                            <input type="text"  name="in_time" value="08:00 AM" readonly class="form-control timepicker timepicker-no-seconds">
                            <span class="input-group-btn">
                                <button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Out time</label>
                    <div class="col-md-7">
                        <div class="input-group">
                            <input type="text"  name="out_time" value="08:00 PM" readonly class="form-control timepicker timepicker-no-seconds">
                            <span class="input-group-btn">
                                <button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
                            </span>
                        </div>
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
                    <label class="control-label col-md-4">Amount<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="number" pattern="[0-9]*" name="amount"   class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4">Is Paid<span class="required"> </span></label>
                    <div class="col-md-7">
                        <input type="checkbox" value="1" name="is_paid">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4">Note<span class="required"> </span></label>
                    <div class="col-md-7">
                        <input type="text" name="note"   class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="modal-footer">
                        <h4 id="status"></h4>
                        <p id="loaded_n_total"></p>
                        <button id="savebutton" type="submit"  class="btn blue">Save</button>
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
