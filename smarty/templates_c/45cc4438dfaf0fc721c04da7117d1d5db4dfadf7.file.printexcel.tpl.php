<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-10-14 10:32:14
         compiled from "..\app\view\admin\logsheet\printexcel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2952559d63b775b81d1-12927974%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45cc4438dfaf0fc721c04da7117d1d5db4dfadf7' => 
    array (
      0 => '..\\app\\view\\admin\\logsheet\\printexcel.tpl',
      1 => 1507956947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2952559d63b775b81d1-12927974',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59d63b77f2e305_25605475',
  'variables' => 
  array (
    'company' => 0,
    'date' => 0,
    'vehicle' => 0,
    'list' => 0,
    'v' => 0,
    'total_km' => 0,
    'extra_hr' => 0,
    'extra_min' => 0,
    'toll' => 0,
    'invoice' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d63b77f2e305_25605475')) {function content_59d63b77f2e305_25605475($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\php\\smartylibs\\Smarty\\plugins\\modifier.date_format.php';
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

            <!-- BEGIN PAYMENT TRANSACTION TABLE -->


            <div class="portlet-body">
                <div class="">
                    <table class="table table-bordered" style="font-size: 12px !important;color: black !important;">
                        <tbody>
                            <tr>
                                <td colspan="10" class="td-c" style="font-size: 20px;font-weight: bold;">SIDDHIVINAYAK TRAVELS HOUSE</td>
                            </tr>
                            <tr>
                                <td colspan="10" class="td-c" style="font-size: 15px;font-weight: bold;">
                                    <?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['company']->value['address'];?>

                                    <br>
                                    Logsheet Entry for the month of <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp1,"%b %Y");?>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="10" class="td-c" style="font-size: 15px;font-weight: bold;">
                                    Summery of Car No: <?php echo $_smarty_tpl->tpl_vars['vehicle']->value['number'];?>
 (<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['car_type'];?>
)
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
                            </tr>
                            <?php $_smarty_tpl->tpl_vars['extra_hr'] = new Smarty_variable(0, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['extra_min'] = new Smarty_variable(0, null, 0);?>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                <tr>
                                    <?php if ($_smarty_tpl->tpl_vars['v']->value['start_km']==0) {?>
                                        <td class="td-c">
                                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['date'];?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp2,"%d/%m/%Y");?>

                                        </td>
                                        <td class="td-c" colspan="5" style="font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['v']->value['remark'];?>
</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    <?php } else { ?>
                                        <td class="td-c">
                                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['date'];?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp3,"%d/%m/%Y");?>

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
<?php $_tmp4=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp4,"%I:%M %p");?>
 
                                        </td>
                                        <td class="td-c">
                                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['close_time'];?>
<?php $_tmp5=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp5,"%I:%M %p");?>
 
                                        </td>
                                        <td class="td-c">
                                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['total_time'];?>
<?php $_tmp6=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp6,"%H:%M");?>
 
                                        </td>
                                        <td class="td-c">
                                            <?php if (($_smarty_tpl->tpl_vars['v']->value['extra_time']>'00:00:00')) {?>
                                                <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['extra_time'];?>
<?php $_tmp7=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['extra_hr'] = new Smarty_variable($_smarty_tpl->tpl_vars['extra_hr']->value+smarty_modifier_date_format($_tmp7,"%H"), null, 0);?>
                                                <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['extra_time'];?>
<?php $_tmp8=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['extra_min'] = new Smarty_variable($_smarty_tpl->tpl_vars['extra_min']->value+smarty_modifier_date_format($_tmp8,"%M"), null, 0);?>
                                                <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['extra_time'];?>
<?php $_tmp9=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp9,"%H:%M");?>
 
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
                                    <?php }?>
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
                        <th class="td-c"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_hr_qty'];?>
 </th>
                        <th class="td-c"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['toll'];?>
</th>
                        <th class="td-c"></th>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="row">
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
                                <td class="td-c"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['fix_qty'];?>
</td>
                                <td class="td-c"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['fix_rate'];?>
</td>

                                <td class="td-c"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['fix_amt'];?>
</td>
                            </tr>
                            <tr>
                                <td class="td-c">Extra Day</td>
                                <td class="td-c"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_day_qty'];?>
</td>
                                <td class="td-c"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_day_rate'];?>
</td>
                                <td class="td-c"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_day_amt'];?>
</td>
                            </tr>
                            <tr>
                                <td class="td-c">Extra KM.</td>
                                <td class="td-c">
                                    <?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_km_qty'];?>

                                </td>
                                <td class="td-c"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_km_rate'];?>
</td>
                                <td class="td-c">
                                    <?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_km_amt'];?>

                                </td>
                            </tr>
                            <tr>
                                <td class="td-c">Extra hour</td>
                                <td class="td-c">
                                    <?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_hr_qty'];?>

                                </td>
                                <td class="td-c"> <?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_hr_rate'];?>
</td>
                                <td class="td-c">
                                    <?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_hr_amt'];?>

                                </td>
                            </tr>
                            <tr>
                                <td class="td-c">Breakdown charges</td>
                                <td class="td-c">
                                    <?php echo $_smarty_tpl->tpl_vars['invoice']->value['br_down_qty'];?>

                                </td>
                                <td class="td-c"> <?php echo $_smarty_tpl->tpl_vars['invoice']->value['br_down_rate'];?>
</td>
                                <td class="td-c">
                                    <?php if ($_smarty_tpl->tpl_vars['invoice']->value['br_down_amt']>0) {?> -<?php echo $_smarty_tpl->tpl_vars['invoice']->value['br_down_amt'];
}?>
                                </td>
                            </tr>

                            <tr>
                                <td class="td-c">Toll /Parking</td>
                                <td class="td-c">-</td>
                                <td class="td-c">-</td>
                                <td class="td-c">
                                    <?php echo $_smarty_tpl->tpl_vars['invoice']->value['toll'];?>

                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                        <th class="td-c"></th>
                        <th class="td-c"></th>
                        <th class="td-c">TOTAL</th>
                        <th class="td-c" id="total_amount"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_day_amt']+$_smarty_tpl->tpl_vars['invoice']->value['extra_hr_amt']+$_smarty_tpl->tpl_vars['invoice']->value['extra_km_amt']+$_smarty_tpl->tpl_vars['invoice']->value['toll']+$_smarty_tpl->tpl_vars['invoice']->value['fix_amt']-$_smarty_tpl->tpl_vars['invoice']->value['br_down_amt'];?>
<?php $_tmp10=ob_get_clean();?><?php echo sprintf("%.2f",$_tmp10);?>
</th>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- END PAYMENT TRANSACTION TABLE -->

        </div>
    </div>


    <!-- END PAGE CONTENT-->
</div>
</div>
<!-- END CONTENT -->

<?php }} ?>
