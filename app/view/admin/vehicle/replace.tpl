
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
                                {foreach from=$list item=v}
                                    <tr>
                                        <td class="td-c">
                                            {$v.date}
                                        </td>
                                        <td class="td-c">
                                            {$v.vehicle_number}
                                        </td>
                                        <td class="td-c">
                                            {$v.vehicle}
                                        </td>
                                        <td class="td-c">
                                            {$v.in_time|date_format:"%I:%M %p"} To {$v.out_time|date_format:"%I:%M %p"}
                                        </td>
                                        <td class="td-c">
                                            {$v.amount}
                                        </td>
                                        <td class="td-c">
                                            {$v.is_paid}
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
                            {foreach from=$vehiclelist item=v}
                                <option value="{$v.vehicle_id}">{$v.name}</option>
                            {/foreach}
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
                        <input type="text" name="date" readonly="" value="{$current_date}" autocomplete="off" class="form-control form-control-inline date-picker" data-date-format="dd M yyyy" >
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
</div>