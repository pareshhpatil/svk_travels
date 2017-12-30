
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
                        Create Logsheet
                    </div>
                    <div class="tools">

                        <a onclick="document.getElementById('insert').style.display = 'block';
                                document.getElementById('list').style.display = 'none';" style="color: #ffffff;" data-original-title="" title="">
                            New <i class="fa fa-plus"></i>
                        </a>

                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row" >
                        <form action="/admin/logsheet/getexcel" method="post" class="form-horizontal">
                            <div class="col-md-12">

                                <div class="col-md-3">
                                    <select name="vehicle_id" required class="form-control" data-placeholder="Select...">
                                        <option value="">Select vehicle</option>
                                        {foreach from=$vehiclelist item=v}
                                            <option value="{$v.vehicle_id}">{$v.name}</option>
                                        {/foreach}
                                    </select>
                                </div>


                                <div class="col-md-3">
                                    <select name="company_id" required class="form-control" data-placeholder="Select...">
                                        <option value="">Select comapny</option>
                                        {foreach from=$companylist item=v}
                                            <option value="{$v.company_id}">{$v.name}</option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="date" readonly="" required="" value="" autocomplete="off" class="form-control form-control-inline date-picker" data-date-format="M yyyy" >
                                </div>
                                <div class="col-md-3">
                                    <button  type="submit" class="btn blue">Search </button>
                                </div>
                                <br>
                                <br>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        {$title}
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
                                {foreach from=$invoicelist item=v}
                                    <tr>
                                        <td class="td-c">
                                            {$v.invoice_number}
                                        </td>
                                        <td class="td-c">
                                            {$v.vehicle}
                                        </td>
                                        <td class="td-c">
                                            {$v.company}
                                        </td>
                                        <td class="td-c">
                                            {$v.date|date_format:"%b %Y"}
                                        </td>
                                        <td class="td-c">
                                            <a   href="/admin/logsheet/printexcel/{$v.invoice_id}" target="_BLANK" class="btn btn-xs green"><i class="fa fa-file-excel-o"></i></a>
                                            <a   href="/admin/logsheet/printword/{$v.invoice_id}" target="_BLANK"  class="btn btn-xs blue"><i class="fa fa-file-word-o"></i></a>
                                            <a   href="/admin/logsheet/getexcel/{$v.invoice_id}"  class="btn btn-xs yellow"><i class="fa fa-edit"></i></a>
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
        <form action="" method="post" id="customerForm" onsubmit="return confirmlogsheet();" enctype="multipart/form-data" class="form-horizontal">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">Type<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="checkbox" onchange="typechange(this.checked);"  name="type"  value="1" class="make-switch" data-on-text="&nbsp;Location&nbsp;&nbsp;" data-off-text="&nbsp;Normal&nbsp;">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Vehicle<span class="required">* </span></label>
                    <div class="col-md-7">
                        <select name="vehicle_id" required class="form-control" data-placeholder="Select...">
                            <option value="">Select vehicle</option>
                            {foreach from=$vehiclelist item=v}
                                <option value="{$v.vehicle_id}">{$v.name}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4">Company<span class="required">* </span></label>
                    <div class="col-md-7">
                        <select name="company_id" required class="form-control" data-placeholder="Select...">
                            <option value="">Select comapny</option>
                            {foreach from=$companylist item=v}
                                <option value="{$v.company_id}">{$v.name}</option>
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
                    <label class="control-label col-md-4">Start KM<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="number" id="startkm" required="" pattern="[0-9]*" name="start_km"   class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">End KM<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="number" id="endkm" required="" pattern="[0-9]*" name="end_km"   class="form-control" >
                    </div>
                </div>
                <div id="normal">
                    <div class="form-group">
                        <label class="control-label col-md-4">Day/Night<span class="required">* </span></label>
                        <div class="col-md-7">
                            <input type="checkbox"  name="is_night"  value="1" class="make-switch" data-on-text="&nbsp;Night&nbsp;&nbsp;" data-off-text="&nbsp;Day&nbsp;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Start Time</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <input type="text"  name="start_time" value="08:00 AM" readonly class="form-control timepicker timepicker-no-seconds">
                                <span class="input-group-btn">
                                    <button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Close Time</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <input type="text"  name="close_time" value="08:00 PM" readonly class="form-control timepicker timepicker-no-seconds">
                                <span class="input-group-btn">
                                    <button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                    <div id="location" style="display: none;">
                    <div class="form-group">
                        <label class="control-label col-md-4">Pickup/Drop<span class="required">* </span></label>
                        <div class="col-md-7">
                            <input type="checkbox" onchange="pickupdrop(this.checked);" name="pickup" checked=""  value="1" class="make-switch" data-on-text="&nbsp;Pickup&nbsp;&nbsp;" data-off-text="&nbsp;Drop&nbsp;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">From </label>
                        <div class="col-md-7">
                            <input type="text"  name="from" id="from_loc" value=""  class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">To</label>
                        <div class="col-md-7">
                            <input type="text"  name="to" id="to_loc" value="Company"  class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Toll amount<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="number" id="toll" pattern="[0-9]*" name="toll_amount"   class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Remark<span class="required">* </span></label>
                    <div class="col-md-7">
                        <input type="text" id="remark" name="remark"   class="form-control" >
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
</div>

<script>
                            function  typechange(val)
  {
          if (val == true)
          {
                      document.getElementById('location').style.display = 'block';
                      document.getElementById('normal').style.display = 'none';
                  } else
              {

                          document.getElementById('location').style.display = 'none';
                          document.getElementById('normal').style.display = 'block';
                      }
                  }
                  
                  function  pickupdrop(val)
  {
          if (val == false)
          {
                      document.getElementById('from_loc').value='company';
                      document.getElementById('to_loc').value='';
                  } else
              {

                          document.getElementById('to_loc').value='company';
                      document.getElementById('from_loc').value='';
                      }
                  }
</script>