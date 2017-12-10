<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-08 22:58:19
         compiled from "..\app\view\admin\logsheet\outstation_bill.tpl" */ ?>
<?php /*%%SmartyHeaderCode:273905a0331c28807a5-80449296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c9945270929a0a72317a62a95bf86aa4630e6c9' => 
    array (
      0 => '..\\app\\view\\admin\\logsheet\\outstation_bill.tpl',
      1 => 1510162095,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '273905a0331c28807a5-80449296',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a0331c4193496_76911074',
  'variables' => 
  array (
    'success' => 0,
    'title' => 0,
    'invoicelist' => 0,
    'v' => 0,
    'vehiclelist' => 0,
    'companylist' => 0,
    'current_date' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0331c4193496_76911074')) {function content_5a0331c4193496_76911074($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\php\\smartylibs\\Smarty\\plugins\\modifier.date_format.php';
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

                    <div class="">
                        <table class="table  table-striped table-bordered table-hover" id="sample_4">
                            <thead>
                                <tr>
                                    <th class="td-c">
                                        Invoice Number
                                    </th>
                                    <th class="td-c">
                                        Vehicle
                                    </th>
                                    <th class="td-c">
                                        Company
                                    </th>
                                    <th class="td-c">
                                        Date
                                    </th>

                                    <th class="td-c">
                                        Action?
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['invoicelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <tr>
                                        <td class="td-c">
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value['invoice_number'];?>

                                        </td>
                                        <td class="td-c">
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value['vehicle'];?>

                                        </td>
                                        <td class="td-c">
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value['company'];?>

                                        </td>
                                        <td class="td-c">
                                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['date'],"%b %Y");?>

                                        </td>
                                        <td class="td-c">

                                            <a   href="/admin/logsheet/printoutstation/<?php echo $_smarty_tpl->tpl_vars['v']->value['invoice_id'];?>
" target="_BLANK"  class="btn btn-xs blue"><i class="fa fa-file-word-o"></i></a>
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
        <form action="/admin/logsheet/outstationsaved" method="post" class="form-horizontal">
            <div class="col-md-12">
                <div class="col-md-6">

                    <div class="form-group">
                        <label class="control-label col-md-4">Vehicle<span class="required">* </span></label>
                        <div class="col-md-7">
                            <select name="vehicle_id" required class="form-control" data-placeholder="Select...">
                                <option value="">Select vehicle</option>
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
                        <label class="control-label col-md-4">Company<span class="required">* </span></label>
                        <div class="col-md-7">
                            <select name="company_id" required class="form-control" data-placeholder="Select...">
                                <option value="">Select comapny</option>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['companylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['company_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Date<span class="required"> </span></label>
                        <div class="col-md-7">
                            <input type="text" name="month" readonly="" value="<?php echo $_smarty_tpl->tpl_vars['current_date']->value;?>
" autocomplete="off" class="form-control form-control-inline date-picker" data-date-format="dd M yyyy" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Bill date<span class="required"> </span></label>
                        <div class="col-md-7">
                            <input type="text" name="bill_date" readonly="" value="<?php echo $_smarty_tpl->tpl_vars['current_date']->value;?>
" autocomplete="off" class="form-control form-control-inline date-picker" data-date-format="dd M yyyy" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Toll amount<span class="required">* </span></label>
                        <div class="col-md-7">
                            <input type="number" id="toll" pattern="[0-9]*" name="toll_amount"   class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is GST?<span class="required">* </span></label>
                        <div class="col-md-7">
                            <input type="checkbox" checked name="is_gst"  value="1" class="make-switch" data-on-text="&nbsp;Yes&nbsp;&nbsp;" data-off-text="&nbsp;No&nbsp;">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12" style="overflow: auto;">
                        <div class="tools">
                            <a  onclick="AddParticular();"  style="height: 25px;" class="btn btn-sm blue-madison pull-right"> <i class="fa fa-plus"> </i> Add new row </a>
                        </div>
                        <table class="table  table-striped table-bordered table-hover" style="font-size: 12px !important;color: black !important;">
                            <tbody id="new_particular">

                                <tr>
                                    <th class="td-c">Particulars</th>
                                    <th class="td-c">Date</th>
                                    <th class="td-c">Qty</th>
                                    <th class="td-c">Rate</th>
                                    <th class="td-c">Amount</th>
                                    <th class="td-c">Delete</th>
                                </tr>
                                <tr>
                                    <td class="td-c"><input style="min-width: 150px;" required="" type="text" name="particular[]" class="form-control"></td>
                                    <td class="td-c"><input style="min-width: 150px;" required="" type="text" name="date[]" class="form-control"></td>
                                    <td class="td-c"><input style="min-width: 100px;" required="" type="text" name="qty[]" class="form-control"></td>
                                    <td class="td-c"><input style="min-width: 100px;" required="" type="text" name="rate[]" class="form-control"></td>
                                    <td class="td-c"><input style="min-width: 100px;" required="" type="text" name="amount[]" class="form-control"></td>
                                    <td>
                                        <a href="javascript:;" onclick="$(this).closest('tr').remove();" class="btn btn-sm red"> <i class="fa fa-times"> </i> Delete </a>
                                    </td>
                                </tr>


                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <div class="modal-footer">
                        <div class="alert alert-success" id="suss" style="display: none;">
                            <button type="button" class="close" onclick="document.getElementById('suss').style.display = 'none';"></button>
                            <strong id="status">Success!</strong>  
                        </div> 
                        <p id="loaded_n_total"></p>
                        <button id="savebutton" type="submit" class="btn blue">Save</button>
                        <a id="conf" data-toggle="modal"  href="#driver"></a>
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
                <h4 class="modal-title">Confirm details</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="row">
                                <div class="col-md-12" id="detail">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">    
                                    <br>
                                    <button type="button" style="margin-left: 10px;" class="btn default pull-right" id="closebutton" data-dismiss="modal">Close</button>
                                    <button id="savebutton" type="submit" onclick="return uploadfile('logsheetbill');" class="btn blue pull-right">Confirm</button>
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
