
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
                                        Date
                                    </th>
                                    <th class="td-c">
                                        Log no
                                    </th>
                                    <th class="td-c">
                                        Vehicle
                                    </th>
                                    <th class="td-c">
                                        Driver
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
                                            {$v.date}
                                        </td>
                                        <td class="td-c">
                                            {$v.log_no}
                                        </td>
                                        <td class="td-c">
                                            {$v.vehicle}
                                        </td>
                                        <td class="td-c">
                                            {$v.driver}
                                        </td>
                                        <td class="td-c">
                                            <a  onclick="getDetails('{$v.encrypted_id}', 'logsheet','master');" data-toggle="modal"  href="#driver"  class="btn btn-xs green"><i class="fa fa-list"></i></a>
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
                    <label class="control-label col-md-4">Vehicle<span class="required">* </span></label>
                    <div class="col-md-7">
                        <select name="vehicle_id" required class="form-control" data-placeholder="Select...">
                            <option value="0">Select vehicle</option>
                            {foreach from=$vehiclelist item=v}
                                <option value="{$v.vehicle_id}">{$v.name}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Driver<span class="required">* </span></label>
                    <div class="col-md-7">
                        <select name="driver_id" required class="form-control" data-placeholder="Select...">
                            <option value="0">Select driver</option>
                            {foreach from=$driverlist item=v}
                                <option value="{$v.driver_id}">{$v.name}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Vendor<span class="required">* </span></label>
                    <div class="col-md-7">
                        <select name="vendor_id" required class="form-control" data-placeholder="Select...">
                            <option value="0">Select vendor</option>
                            {foreach from=$vendorlist item=v}
                                <option value="{$v.vendor_id}">{$v.name}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Log number<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="number" pattern="[0-9]*" name="log_no"   class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Pickup/Drop<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="checkbox"  name="is_pickup"  value="1" class="make-switch" data-on-text="&nbsp;Pickup&nbsp;&nbsp;" data-off-text="&nbsp;Drop&nbsp;">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">From<span class="required">* </span></label>
                    <div class="col-md-7">
                        <select name="from" required class="form-control" data-placeholder="Select...">
                            <option value="0">Select location</option>
                            {foreach from=$location item=v}
                                <option value="{$v.location_id}">{$v.name}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">To<span class="required">* </span></label>
                    <div class="col-md-7">
                        <select name="to" required class="form-control" data-placeholder="Select...">
                            <option value="0">Select location</option>
                            {foreach from=$location item=v}
                                <option value="{$v.location_id}">{$v.name}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Date<span class="required"> </span></label>
                    <div class="col-md-7">
                        <input type="text" name="date" readonly="" value="{$current_date}" autocomplete="off" class="form-control form-control-inline date-picker" data-date-format="dd M yyyy" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Time</label>
                    <div class="col-md-7">
                        <div class="input-group">
                            <input type="text"  name="time" readonly class="form-control timepicker timepicker-no-seconds">
                            <span class="input-group-btn">
                                <button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4">KM<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="km" pattern="[0-9]*" name="km"   class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Toll amount<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="number" pattern="[0-9]*" name="toll_amount"   class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                    <div class="modal-footer">
                        <h4 id="status"></h4>
                        <p id="loaded_n_total"></p>
                        <button id="savebutton" type="submit" onclick="return uploadfile('logsheet');" class="btn blue">Save</button>
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
                <h4 class="modal-title">Logsheet details</h4>
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