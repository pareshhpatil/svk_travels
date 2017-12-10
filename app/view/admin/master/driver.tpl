
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->

    <!-- END PAGE HEADER-->

    <!-- BEGIN SEARCH CONTENT-->
    <!-- BEGIN SEARCH CONTENT-->

    <!-- BEGIN PAGE CONTENT-->
    <div class="row" id="list">
        <div class="col-md-12">
            {if $success!=''}
                <div class="alert alert-block alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <p>Success! {$success}</p>
                </div>
            {/if}
            <!-- BEGIN PAYMENT TRANSACTION TABLE -->

            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        {$title}
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
                                        Driver name
                                    </th>
                                    <th class="td-c">
                                        Action?
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$list item=v}
                                    <tr>
                                        <td class="td-c">
                                            {$v.name}
                                        </td>
                                        <td class="td-c">
                                            <a  onclick="getDetails('{$v.encrypted_id}','driver','master');" data-toggle="modal"  href="#driver"  class="btn btn-xs green"><i class="fa fa-list"></i></a>
                                        </td>
                                    </tr>

                                {/foreach}
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
                    <label class="control-label col-md-4">Salary<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="number" pattern="[0-9]*" name="payment"   class="form-control" >
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
                        <button id="savebutton" type="submit" onclick="return uploadfile('driver');" class="btn blue">Save</button>
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
            
        </div>
        </form>		
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>