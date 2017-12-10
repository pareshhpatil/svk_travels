<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-16 13:14:42
         compiled from "..\app\view\admin\logsheet\excel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2507459d3abda8eebc2-75029058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3538c6b0dd5646e7cdf71d98a8e2bec8ec1e0c1' => 
    array (
      0 => '..\\app\\view\\admin\\logsheet\\excel.tpl',
      1 => 1509691436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2507459d3abda8eebc2-75029058',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59d3abdb160197_16218739',
  'variables' => 
  array (
    'success' => 0,
    'vehiclelist' => 0,
    'v' => 0,
    'companylist' => 0,
    'company' => 0,
    'date' => 0,
    'vehicle' => 0,
    'list' => 0,
    'total_km' => 0,
    'extra_hr' => 0,
    'extra_min' => 0,
    'toll' => 0,
    'invoice' => 0,
    'fix_amt' => 0,
    'extra_day_amt' => 0,
    'extrakm' => 0,
    'extrakmamt' => 0,
    'extra_km_amt' => 0,
    'extramin' => 0,
    'extrahramt' => 0,
    'extra_hr_amt' => 0,
    'br_down_amt' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d3abdb160197_16218739')) {function content_59d3abdb160197_16218739($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\php\\smartylibs\\Smarty\\plugins\\modifier.date_format.php';
?><style>
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        padding: 2px;
    }
</style>
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->

    <!-- END PAGE HEADER-->

    <!-- BEGIN SEARCH CONTENT-->
    <!-- BEGIN SEARCH CONTENT-->

    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <?php if ($_smarty_tpl->tpl_vars['success']->value!='') {?>
                <div class="alert alert-block alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <p>Success! <?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</p>
                </div>
            <?php }?>
            <!-- BEGIN PAYMENT TRANSACTION TABLE -->

            <div class="portlet-body">
                <div class="row" >
                    <form action="/admin/logsheet/getexcel" method="post" class="form-horizontal">
                        <div class="col-md-12">

                            <div class="col-md-3">
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


                            <div class="col-md-3">
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
                            <div class="col-md-3">
                                <input type="text" name="date" readonly="" required="" value="" autocomplete="off" class="form-control form-control-inline date-picker" data-date-format="M yyyy" >
                            </div>
                            <div class="col-md-3">
                                 <button  type="submit" class="btn blue">Search </button>
                                 <a  href="/admin/logsheet/bill" class="btn default">Back </a>
                            </div>
                                <br>
                                <br>
                        </div>

                    </form>
                </div>
            </div>
            <div class="portlet-body">
                <div class="">
                    <table class="table table-bordered" style="font-size: 12px !important;color: black !important;">
                        <tbody>
                            <tr>
                                <td colspan="11" class="td-c" style="font-size: 20px;font-weight: bold;">SIDDHIVINAYAK TRAVELS HOUSE</td>
                            </tr>
                            <tr>
                                <td colspan="11" class="td-c" style="font-size: 15px;font-weight: bold;">
                                    <?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['company']->value['address'];?>

                                    <br>
                                    Logsheet Entry for the month of <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp1,"%b %Y");?>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="11" class="td-c" style="font-size: 15px;font-weight: bold;">
                                    Summery of Car No: (<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['car_type'];?>
)<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['number'];?>

                                </td>
                            </tr>
                            <tr>
                                <th class="td-c">DATE</th>
                                <th class="td-c">START KM</th>
                                <th class="td-c">END KM</th>
                                <th class="td-c">TOTAL KM</th>
                                <th class="td-c">START TIME</th>
                                <th class="td-c">CLOSE TIME</th>
                                <th class="td-c">TOTAL TIME</th>
                                <th class="td-c">EXTRA HRS</th>
                                <th class="td-c">Toll/ Parking</th>
                                <th class="td-c">Remark</th>
                                <th class="td-c">Action</th>
                            </tr>
                            <?php $_smarty_tpl->tpl_vars['extra_hr'] = new Smarty_variable(0, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['extra_min'] = new Smarty_variable(0, null, 0);?>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                <tr>
                                    <td class="td-c">
                                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['date'];?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp2,"%d/%m/%Y");?>

                                    </td>
                                    <td class="td-c">
                                        <?php echo $_smarty_tpl->tpl_vars['v']->value['start_km'];?>

                                    </td>
                                    <td class="td-c">
                                        <?php echo $_smarty_tpl->tpl_vars['v']->value['end_km'];?>

                                    </td>
                                    <td class="td-c">
                                        <?php if (($_smarty_tpl->tpl_vars['v']->value['total_km']>0)) {?>
                                            <?php $_smarty_tpl->tpl_vars['total_km'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_km']->value+$_smarty_tpl->tpl_vars['v']->value['total_km'], null, 0);?>
                                        <?php }?>
                                        <?php echo $_smarty_tpl->tpl_vars['v']->value['total_km'];?>

                                    </td>
                                    <td class="td-c">
                                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['start_time'];?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp3,"%I:%M %p");?>
 
                                    </td>
                                    <td class="td-c">
                                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['close_time'];?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp4,"%I:%M %p");?>
 
                                    </td>
                                    <td class="td-c">
                                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['total_time'];?>
<?php $_tmp5=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp5,"%H:%M");?>
 
                                    </td>
                                    <td class="td-c">
                                        <?php if (($_smarty_tpl->tpl_vars['v']->value['extra_time']>'00:00:00')) {?>
                                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['extra_time'];?>
<?php $_tmp6=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['extra_hr'] = new Smarty_variable($_smarty_tpl->tpl_vars['extra_hr']->value+smarty_modifier_date_format($_tmp6,"%H"), null, 0);?>
                                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['extra_time'];?>
<?php $_tmp7=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['extra_min'] = new Smarty_variable($_smarty_tpl->tpl_vars['extra_min']->value+smarty_modifier_date_format($_tmp7,"%M"), null, 0);?>
                                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['extra_time'];?>
<?php $_tmp8=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp8,"%H:%M");?>
 
                                        <?php }?>
                                    </td>
                                    <td class="td-c">
                                        <?php if (($_smarty_tpl->tpl_vars['v']->value['toll']>0)) {?>
                                            <?php $_smarty_tpl->tpl_vars['toll'] = new Smarty_variable($_smarty_tpl->tpl_vars['toll']->value+$_smarty_tpl->tpl_vars['v']->value['toll'], null, 0);?>
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value['toll'];?>

                                        <?php }?>
                                    </td>
                                    <td class="td-c">
                                        <?php echo $_smarty_tpl->tpl_vars['v']->value['remark'];?>

                                    </td>
                                    <td class="td-c">
                                        <a onclick="return confirm('Are you sure?');" href="/admin/logsheet/delete/<?php echo $_smarty_tpl->tpl_vars['v']->value['logsheet_id'];?>
">Delete</a>
                                    </td>

                                </tr>

                            <?php } ?>
                        </tbody>
                        <tfoot>
                        <th class="td-c"></th>
                        <th class="td-c"></th>
                        <th class="td-c">TOTAL KM</th>
                        <th class="td-c"><?php echo $_smarty_tpl->tpl_vars['total_km']->value;?>
</th>
                        <th class="td-c"></th>
                        <th class="td-c"></th>
                        <th class="td-c">EXTRA HRS</th>
                        <th class="td-c"><?php ob_start();?><?php echo ($_smarty_tpl->tpl_vars['extra_min']->value+($_smarty_tpl->tpl_vars['extra_hr']->value*60))/60;?>
<?php $_tmp9=ob_get_clean();?><?php echo sprintf("%.2f",$_tmp9);?>
 </th>
                        <th class="td-c"><?php echo $_smarty_tpl->tpl_vars['toll']->value;?>
</th>
                        <th class="td-c"></th>
                        <th class="td-c"></th>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="row">
                <form action="/admin/logsheet/savelogsheet" method="post" >
                    <div class="col-md-6" style="max-width: 50%;">
                       
                        <table class="table table-bordered" style="font-size: 12px !important;color: black !important;">
                            <tbody>

                                <tr>
                                    <th class="td-c">Particulars</th>
                                    <th class="td-c">Qty</th>
                                    <th class="td-c">Rate(R.s)</th>
                                    <th class="td-c">Amount</th>
                                </tr>

                                <tr>
                                    <td class="td-c">Fixed monthly charges</td>
                                    <td class="td-c"><input type="text" class="form-control" onblur="calculatetotal(1);" id="qty1" name="fix_qty" value="<?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['fix_qty'])) {
echo $_smarty_tpl->tpl_vars['invoice']->value['fix_qty'];
} else { ?>1<?php }?>"></td>
                                    <td class="td-c"><input type="text" class="form-control" onblur="calculatetotal(1);" id="rate1" name="fix_rate" value="<?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['fix_rate'])) {
echo $_smarty_tpl->tpl_vars['invoice']->value['fix_rate'];
} else { ?>45000.00<?php }?>"></td>
                                    <?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['fix_amt'])) {
$_smarty_tpl->tpl_vars['fix_amt'] = new Smarty_variable($_smarty_tpl->tpl_vars['invoice']->value['fix_amt'], null, 0);
} else {
$_smarty_tpl->tpl_vars['fix_amt'] = new Smarty_variable(45000.00, null, 0);
}?>
                                    <td class="td-c"><input type="text" class="form-control" id="amt1" name="fix_amt" value="<?php echo $_smarty_tpl->tpl_vars['fix_amt']->value;?>
"></td>
                                </tr>
                                <tr>
                                    <td class="td-c">Extra Day</td>
                                    <td class="td-c"><input type="text" class="form-control" onblur="calculatetotal(2);" id="qty2" name="extra_day_qty" value="<?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['extra_day_qty'])) {
echo $_smarty_tpl->tpl_vars['invoice']->value['extra_day_qty'];
} else { ?>0<?php }?>"></td>
                                    <td class="td-c"><input type="text" class="form-control" onblur="calculatetotal(2);" id="rate2" name="extra_day_rate" value="<?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['extra_day_rate'])) {
echo $_smarty_tpl->tpl_vars['invoice']->value['extra_day_rate'];
} else { ?>1451.00<?php }?>"></td>
                                    <?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['extra_day_amt'])) {
$_smarty_tpl->tpl_vars['extra_day_amt'] = new Smarty_variable($_smarty_tpl->tpl_vars['invoice']->value['extra_day_amt'], null, 0);
} else {
$_smarty_tpl->tpl_vars['extra_day_amt'] = new Smarty_variable(00.00, null, 0);
}?>
                                    <td class="td-c"><input type="text" class="form-control" onblur="calculatetotal(2);" id="amt2" name="extra_day_amt" value="<?php echo $_smarty_tpl->tpl_vars['extra_day_amt']->value;?>
"></td>
                                </tr>
                                <tr>
                                    <td class="td-c">Extra KM.</td>
                                    <td class="td-c">
                                        <?php $_smarty_tpl->tpl_vars['extrakm'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_km']->value-3000, null, 0);?>
                                        <?php if ($_smarty_tpl->tpl_vars['extrakm']->value<0) {?>
                                            <?php $_smarty_tpl->tpl_vars['extrakm'] = new Smarty_variable('', null, 0);?>
                                        <?php }?>
                                        <input type="text" class="form-control" onblur="calculatetotal(3);" id="qty3" name="extra_km_qty" value="<?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['extra_km_qty'])) {
echo $_smarty_tpl->tpl_vars['invoice']->value['extra_km_qty'];
} else {
echo $_smarty_tpl->tpl_vars['extrakm']->value;
}?>">
                                    </td>
                                    <td class="td-c"><input type="text" onblur="calculatetotal(3);" id="rate3" class="form-control" name="extra_km_rate" value="<?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['extra_km_rate'])) {
echo $_smarty_tpl->tpl_vars['invoice']->value['extra_km_rate'];
} else { ?>12<?php }?>"></td>
                                    <td class="td-c">
                                        <?php $_smarty_tpl->tpl_vars['extrakmamt'] = new Smarty_variable(0, null, 0);?>
                                        <?php if ($_smarty_tpl->tpl_vars['extrakm']->value>0) {?>
                                            <?php $_smarty_tpl->tpl_vars['extrakmamt'] = new Smarty_variable($_smarty_tpl->tpl_vars['extrakm']->value*12, null, 0);?>
                                        <?php }?>
                                        <?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['extra_km_amt'])) {
$_smarty_tpl->tpl_vars['extra_km_amt'] = new Smarty_variable($_smarty_tpl->tpl_vars['invoice']->value['extra_km_amt'], null, 0);
} else {
$_smarty_tpl->tpl_vars['extra_km_amt'] = new Smarty_variable($_smarty_tpl->tpl_vars['extrakmamt']->value, null, 0);
}?>
                                        <input type="text" class="form-control" onblur="calculatetotal(3);" id="amt3" name="extra_km_amt" value="<?php echo $_smarty_tpl->tpl_vars['extra_km_amt']->value;?>
">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-c">Extra hour</td>
                                    <td class="td-c">
                                        <?php ob_start();?><?php echo ($_smarty_tpl->tpl_vars['extra_min']->value+($_smarty_tpl->tpl_vars['extra_hr']->value*60))/60;?>
<?php $_tmp10=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['extramin'] = new Smarty_variable(sprintf("%.2f",$_tmp10), null, 0);?>
                                        <input type="text" class="form-control" onblur="calculatetotal(4);" id="qty4" name="extra_hr_qty" value="<?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['extra_hr_qty'])) {
echo $_smarty_tpl->tpl_vars['invoice']->value['extra_hr_qty'];
} else {
echo $_smarty_tpl->tpl_vars['extramin']->value;
}?>">
                                    </td>
                                    <td class="td-c"> <input type="text" id="rate4" onblur="calculatetotal(4);" class="form-control" name="extra_hr_rate" value="<?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['extra_hr_rate'])) {
echo $_smarty_tpl->tpl_vars['invoice']->value['extra_hr_rate'];
} else { ?>65.00<?php }?>"></td>
                                    <td class="td-c">
                                        <?php ob_start();?><?php echo ($_smarty_tpl->tpl_vars['extra_min']->value+($_smarty_tpl->tpl_vars['extra_hr']->value*60))/60;?>
<?php $_tmp11=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['extrahramt'] = new Smarty_variable($_tmp11*65, null, 0);?>
                                        
                                        <?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['extra_hr_amt'])) {
$_smarty_tpl->tpl_vars['extra_hr_amt'] = new Smarty_variable($_smarty_tpl->tpl_vars['invoice']->value['extra_hr_amt'], null, 0);
} else {
$_smarty_tpl->tpl_vars['extra_hr_amt'] = new Smarty_variable($_smarty_tpl->tpl_vars['extrahramt']->value, null, 0);
}?>
                                        <input type="text" class="form-control" id="amt4" onblur="calculatetotal(4);" name="extra_hr_amt" value="<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['extra_hr_amt']->value);?>
">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-c">Break down</td>
                                    <td class="td-c">
                                        <input type="text" class="form-control" onblur="calculatetotal(6);" id="qty6" name="br_down_qty" value="<?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['br_down_qty'])) {
echo $_smarty_tpl->tpl_vars['invoice']->value['br_down_qty'];
} else {
}?>">
                                    </td>
                                    <td class="td-c"> <input type="text" id="rate6" onblur="calculatetotal(6);" class="form-control" name="br_down_rate" value="<?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['br_down_rate'])) {
echo $_smarty_tpl->tpl_vars['invoice']->value['br_down_rate'];
} else {
}?>"></td>
                                    <td class="td-c">
                                        
                                        <?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['br_down_amt'])) {
$_smarty_tpl->tpl_vars['br_down_amt'] = new Smarty_variable($_smarty_tpl->tpl_vars['invoice']->value['br_down_amt'], null, 0);
} else {
}?>
                                        <input type="text" class="form-control" id="amt6" onblur="calculatetotal(6);" name="br_down_amt" value="<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['br_down_amt']->value);?>
">
                                    </td>
                                </tr>

                                <tr>
                                    <td class="td-c">Toll /Parking</td>
                                    <td class="td-c">-</td>
                                    <td class="td-c">-</td>
                                    <td class="td-c">
                                        <input type="text" class="form-control" onblur="calculatetotal(0);" id="amt5" name="toll" value="<?php if (isset($_smarty_tpl->tpl_vars['invoice']->value['toll'])) {
echo $_smarty_tpl->tpl_vars['invoice']->value['toll'];
} else {
echo sprintf("%.2f",$_smarty_tpl->tpl_vars['toll']->value);
}?>">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                            <th class="td-c"></th>
                            <th class="td-c"></th>
                            <th class="td-c">TOTAL</th>
                            <th class="td-c" id="total_amount"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['extra_day_amt']->value+$_smarty_tpl->tpl_vars['extra_hr_amt']->value+$_smarty_tpl->tpl_vars['extra_km_amt']->value+$_smarty_tpl->tpl_vars['toll']->value+$_smarty_tpl->tpl_vars['fix_amt']->value-$_smarty_tpl->tpl_vars['br_down_amt']->value;?>
<?php $_tmp12=ob_get_clean();?><?php echo sprintf("%.0f",$_tmp12);?>
.00</th>
                            </tfoot>
                        </table>
                    </div>
                    <input type="hidden" name="vehicle_id" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['vehicle_id'];?>
">
                    <input type="hidden" name="company_id" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['company_id'];?>
">
                    <input type="hidden" name="date" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['date'];?>
">
                    <input type="hidden" name="invoice_id" value="<?php echo $_smarty_tpl->tpl_vars['invoice']->value['invoice_id'];?>
">
                    <div class="col-md-6">
                         Bill Date :<input type="text" name="bill_date" style="max-width: 200px;" readonly="" required="" value="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['invoice']->value['bill_date'];?>
<?php $_tmp13=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp13,"%d-%b-%Y");?>
" autocomplete="off" class="form-control form-control-inline date-picker" data-date-format="M yyyy" >
                        <br>
                    <button type="submit" class="btn blue">Save Logsheet</button>
                    </div>
                </form>
            </div>
            <!-- END PAYMENT TRANSACTION TABLE -->

        </div>
    </div>


    <!-- END PAGE CONTENT-->
</div>
</div>
<!-- END CONTENT -->

<?php }} ?>
