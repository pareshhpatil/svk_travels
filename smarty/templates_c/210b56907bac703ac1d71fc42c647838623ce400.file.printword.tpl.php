<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-10-14 10:31:19
         compiled from "..\app\view\admin\logsheet\printword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:940659db8bd1ec9aa2-46067155%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '210b56907bac703ac1d71fc42c647838623ce400' => 
    array (
      0 => '..\\app\\view\\admin\\logsheet\\printword.tpl',
      1 => 1507956920,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '940659db8bd1ec9aa2-46067155',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59db8bd2bf0a49_37261213',
  'variables' => 
  array (
    'date' => 0,
    'invoice' => 0,
    'company' => 0,
    'vehicle' => 0,
    'total_taxable' => 0,
    'gst' => 0,
    'total_gst' => 0,
    'grand_total' => 0,
    'wordmoney' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59db8bd2bf0a49_37261213')) {function content_59db8bd2bf0a49_37261213($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\php\\smartylibs\\Smarty\\plugins\\modifier.date_format.php';
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
                    <table class="table" style="font-size: 12px !important;color: black !important;">
                        <tbody>
                            <tr >
                                <td class="td-c" style="border-top: 0px;"><img style="max-width: 140px;" src="/assets/admin/layout/img/logo.png" alt="logo" class="logo-default"></td>
                            </tr>
                            <tr>
                                <td class="td-c" style="border-top: 0px;font-size: 30px;font-family: cambria;">SIDDHIVINAYAK TRAVELS HOUSE</td>
                            </tr>
                            <tr>
                                <td class="td-c" style="font-size: 20px;font-family: cambria;">
                                    <br>
                                    TAX INVOICE FOR THE MONTH OF <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp1,"%b - %Y");?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" >
                    <table class="table table-bordered" style="font-size: 14px; color: black !important;">
                        <tbody>
                            <tr>
                                <td  style="width: 50%;">
                                    <div class="col-md-12" >
                                        <p><b>Name:</b> SIDDHIVINAYAK TRAVELS HOUSE</p>
                                    </div>
                                    <div class="col-md-12" >
                                        <p><b>GSTIN:</b> 27BRSPP2039Q1ZU</p>
                                    </div>
                                    <div class="col-md-12" >
                                        <p><b>Pan No:</b> BRSPP2039Q</p>
                                    </div>
                                    <div class="col-md-12" >
                                        <p><b>Address:</b> Room no: 11,Dr mengade wadi, Gyan mandir road , Dadar(west) - 400 014</p>
                                    </div>
                                </td>
                                <td  style="width: 50%;">
                                    <div class="col-md-12" >
                                        <p><b>Date:</b> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['invoice']->value['date'];?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp2,"%d-%b-%Y");?>
</p>
                                    </div>
                                    <div class="col-md-12" >
                                        <p><b>Invoice No:</b> <?php echo $_smarty_tpl->tpl_vars['invoice']->value['invoice_number'];?>
</p>
                                    </div>
                                    <div class="col-md-12" >
                                        <p><b>Contact No:</b> 8879391658</p>
                                    </div>
                                    <div class="col-md-12" >
                                        <p><b>HSN/SAC Code:</b>  9966</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><div class="col-md-12" ><b>Receivers Details:</b></div></td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <div class="col-md-12" >
                                        <p><b>Company Name:</b> <?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
 </p>
                                    </div>
                                    <div class="col-md-12" >
                                        <p><b>GSTIN:</b> <?php echo $_smarty_tpl->tpl_vars['company']->value['gst_number'];?>
</p>
                                    </div>

                                    <div class="col-md-12" >
                                        <p><b>Address:</b> <?php echo $_smarty_tpl->tpl_vars['company']->value['address'];?>
</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><div class="col-md-12" ><b>Vehicle No:</b> <?php echo $_smarty_tpl->tpl_vars['vehicle']->value['number'];?>
 (<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['car_type'];?>
)</div></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table class="table table-bordered" style="font-size: 14px; color: black !important;">
                                        <tbody>
                                            <tr>
                                                <th class="td-c" >Sr.No</th>
                                                <th  class="td-c" style="min-width: 250px;">Particulars</th>
                                                <th  class="td-c" >Unit</th>
                                                <th class="td-c" >Qty.</th>
                                                <th class="td-c" >Rate</th>
                                                <th class="td-c" >Amount</th>
                                            </tr>
                                            <tr>
                                                <td class="td-c">1</td>
                                                <td class="td-c">Monthly Hire charges</td>
                                                <td class="td-c">Month</td>
                                                <td class="td-c"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['fix_qty'];?>
</td>
                                                <td><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['fix_rate'];?>
</span></td>
                                                <td><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['fix_amt'];?>
</span></td>
                                            </tr>
                                            <tr>
                                                <td class="td-c">2</td>
                                                <td class="td-c">Charges for extra days</td>
                                                <td class="td-c">Day</td>
                                                <td class="td-c"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_day_qty'];?>
</td>
                                                <td><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_day_rate'];?>
</span></td>
                                                <td><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_day_amt'];?>
</span></td>
                                            </tr>
                                            <tr>
                                                <td class="td-c">3</td>
                                                <td class="td-c">Charges for extra hour</td>
                                                <td class="td-c">Hour</td>
                                                <td class="td-c"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_hr_qty'];?>
</td>
                                                <td><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_hr_rate'];?>
</span></td>
                                                <td><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_hr_amt'];?>
</span></td>
                                            </tr>
                                            <tr>
                                                <td class="td-c">4</td>
                                                <td class="td-c">Charges for Extra Km.</td>
                                                <td class="td-c">KM</td>
                                                <td class="td-c"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_km_qty'];?>
</td>
                                                <td><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_km_rate'];?>
</span></td>
                                                <td><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['extra_km_amt'];?>
</span></td>
                                            </tr>
                                            <tr>
                                                <td class="td-c">5</td>
                                                <td class="td-c">Breakdown charges</td>
                                                <td class="td-c">Day</td>
                                                <td class="td-c"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['br_down_qty'];?>
</td>
                                                <td><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['br_down_rate'];?>
</span></td>
                                                <td><span class="pull-right"><?php if ($_smarty_tpl->tpl_vars['invoice']->value['br_down_amt']>0) {?> -<?php echo $_smarty_tpl->tpl_vars['invoice']->value['br_down_amt'];
}?></span></td>
                                            </tr>
                                            <tr>
                                                <td class="td-c">6</td>
                                                <td class="td-c">Toll/Parking</td>
                                                <td class="td-c"></td>
                                                <td class="td-c"></td>
                                                <td class="td-c"></td>
                                                <td><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['invoice']->value['toll'];?>
</span></td>
                                            </tr>
                                            <tr>

                                                <td colspan="5"><span class="pull-right"><b>Total Value /Taxable Value(Rs.)</b></span></td>
                                                <td><span class="pull-right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total_taxable']->value);?>
</b></span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" rowspan="3" style="vertical-align: middle;"><span class="pull-right"><b>Goods and Services Tax @5%</b></span></td>
                                                <td><span class="pull-right">CGST@</span></td>
                                                <td><span class="pull-right">2.50%</span></td>
                                                <td><span class="pull-right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['gst']->value);?>
</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="pull-right">SGST@</span></td>
                                                <td><span class="pull-right">2.50%</span></td>
                                                <td><span class="pull-right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['gst']->value);?>
</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="pull-right">IGST@</span></td>
                                                <td><span class="pull-right">0.00%</span></td>
                                                <td><span class="pull-right">0.00</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><span class="pull-right"><b>Total GST Value</b></span></td>
                                                <td><span class="pull-right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total_gst']->value);?>
</b></span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><span class="pull-right"><b>Grand Total (Inclusive of GST)</b></span></td>
                                                <td><span class="pull-right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['grand_total']->value);?>
</b></span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><span class="pull-right"><b>Invoice Value (In Words)&nbsp;&nbsp;</b></span></td>
                                                <td colspan="4"> &nbsp;&nbsp; <?php echo $_smarty_tpl->tpl_vars['wordmoney']->value;?>
 Only.</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8" ></div>
                <div class="col-xs-4" >
                    Name Of Signatory
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8" ></div>
                <div class="col-xs-4" >
                    <br>
                    <br>
                    <br>
                    Designation: 
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8" ></div>
                <div class="col-xs-4" >
                    Date:
                    <br>
                    <br>
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
