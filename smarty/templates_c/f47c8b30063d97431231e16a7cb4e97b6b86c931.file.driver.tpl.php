<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-19 21:56:21
         compiled from "..\app\view\admin\master\driver.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26722583047e0dbcab1-98885632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f47c8b30063d97431231e16a7cb4e97b6b86c931' => 
    array (
      0 => '..\\app\\view\\admin\\master\\driver.tpl',
      1 => 1479572708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26722583047e0dbcab1-98885632',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_583047e225fbd8_49097979',
  'variables' => 
  array (
    'success' => 0,
    'title' => 0,
    'list' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583047e225fbd8_49097979')) {function content_583047e225fbd8_49097979($_smarty_tpl) {?>
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
                                        Customer name
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
');" data-toggle="modal"  href="#driver"  class="btn btn-xs green"><i class="fa fa-list"></i></a>
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
                    <label class="control-label col-md-4">Driver name<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="text" name="name" required value="" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Mobile<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="number" pattern="[0-9]*" name="mobile"   class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Email<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="email" name="email"  value="" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Pan<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="text"  name="pan"  value="" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Upload photo<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="file"  id="fileupload" accept="image/*"  name="uploaded_file[]">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">Address<span class="required"> </span></label>
                    <div class="col-md-7">
                        <textarea  value="" name="address" class="form-control" ></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Adharcard<span class="required"> </span></label>
                    <div class="col-md-7">
                        <input type="text" name="adharcard"  value="" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">License<span class="required"> </span></label>
                    <div class="col-md-7">
                        <input type="text" name="license"  value="" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Join date<span class="required"> </span></label>
                    <div class="col-md-7">
                        <input type="text" name="joindate" readonly="" autocomplete="off" class="form-control form-control-inline date-picker" data-date-format="yyyy-mm-dd" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Payment date<span class="required"> </span></label>
                    <div class="col-md-7">
                        <input type="text" name="payment_date"  readonly="" autocomplete="off" class="form-control form-control-inline date-picker" data-date-format="yyyy-mm-dd" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="modal-footer">
                        <h4 id="status"></h4>
                        <p id="loaded_n_total"></p>
                        <button id="savebutton" type="submit" onclick="return uploadfile();" class="btn blue">Save</button>
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
                <button type="button" class="close" id="closebutton1" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Driver details</h4>
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
            <div class="modal-footer">
                <button type="button" class="btn default" id="closebutton" data-dismiss="modal">Close</button>
            </div>
        </div>
        </form>		
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><?php }} ?>
