<style>
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
            {if $success!=''}
                <div class="alert alert-block alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <p>Success! {$success}</p>
                </div>
            {/if}
            <!-- BEGIN PAYMENT TRANSACTION TABLE -->

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
                                    {$company.name} {$company.address}
                                    <br>
                                    Logsheet Entry for the month of {{$date}|date_format:"%b %Y"}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="11" class="td-c" style="font-size: 15px;font-weight: bold;">
                                    Summery of Car No: ({$vehicle.car_type}){$vehicle.number}
                                </td>
                            </tr>
                            <tr>
                                <th class="td-c">DATE</th>
                                <th class="td-c">START KM</th>
                                <th class="td-c">END KM</th>
                                <th class="td-c">TOTAL KM</th>
                                <th class="td-c">From Loc.</th>
                                <th class="td-c">To Loc.</th>
                                <th class="td-c">TOTAL TIME</th>
                                <th class="td-c">Toll/ Parking</th>
                                <th class="td-c">Remark</th>
                                <th class="td-c">Action</th>
                            </tr>
                            {$extra_hr=0}
                            {$extra_min=0}
                            {foreach from=$list item=v}
                                <tr>
                                    <td class="td-c">
                                        {{$v.date}|date_format:"%d/%m/%Y"}
                                    </td>
                                    <td class="td-c">
                                        {$v.start_km}
                                    </td>
                                    <td class="td-c">
                                        {$v.end_km}
                                    </td>
                                    <td class="td-c">
                                        {if ($v.total_km>0)}
                                            {$total_km=$total_km+$v.total_km}
                                        {/if}
                                        {$v.total_km}
                                    </td>
                                    <td class="td-c">
                                        {$v.from} 
                                    </td>
                                    <td class="td-c">
                                        {$v.to} 
                                    </td>
                                    <td class="td-c">
                                        {{$v.total_time}|date_format:"%H:%M"} 
                                    </td>
                                    
                                    <td class="td-c">
                                        {if ($v.toll>0)}
                                            {$toll=$toll+$v.toll}
                                            {$v.toll}
                                        {/if}
                                    </td>
                                    <td class="td-c">
                                        {$v.remark}
                                    </td>
                                    <td class="td-c">
                                        <a onclick="return confirm('Are you sure?');" href="/admin/logsheet/delete/{$v.logsheet_id}">Delete</a>
                                    </td>

                                </tr>

                            {/foreach}
                        </tbody>
                        <tfoot>
                        <th class="td-c"></th>
                        <th class="td-c"></th>
                        <th class="td-c">TOTAL KM</th>
                        <th class="td-c">{$total_km}</th>
                        <th class="td-c"></th>
                        <th class="td-c"></th>
                        <th class="td-c"></th>
                        <th class="td-c">{$toll}</th>
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
                                    <td class="td-c"><input type="text" class="form-control" onblur="calculatetotal(1);" id="qty1" name="fix_qty" value="{if isset($invoice.fix_qty)}{$invoice.fix_qty}{else}1{/if}"></td>
                                    <td class="td-c"><input type="text" class="form-control" onblur="calculatetotal(1);" id="rate1" name="fix_rate" value="{if isset($invoice.fix_rate)}{$invoice.fix_rate}{else}45000.00{/if}"></td>
                                    {if isset($invoice.fix_amt)}{$fix_amt=$invoice.fix_amt}{else}{$fix_amt=45000.00}{/if}
                                    <td class="td-c"><input type="text" class="form-control" id="amt1" name="fix_amt" value="{$fix_amt}"></td>
                                </tr>
                                <tr>
                                    <td class="td-c">Extra Day</td>
                                    <td class="td-c"><input type="text" class="form-control" onblur="calculatetotal(2);" id="qty2" name="extra_day_qty" value="{if isset($invoice.extra_day_qty)}{$invoice.extra_day_qty}{else}0{/if}"></td>
                                    <td class="td-c"><input type="text" class="form-control" onblur="calculatetotal(2);" id="rate2" name="extra_day_rate" value="{if isset($invoice.extra_day_rate)}{$invoice.extra_day_rate}{else}1451.00{/if}"></td>
                                    {if isset($invoice.extra_day_amt)}{$extra_day_amt=$invoice.extra_day_amt}{else}{$extra_day_amt=00.00}{/if}
                                    <td class="td-c"><input type="text" class="form-control" onblur="calculatetotal(2);" id="amt2" name="extra_day_amt" value="{$extra_day_amt}"></td>
                                </tr>
                                <tr>
                                    <td class="td-c">Extra KM.</td>
                                    <td class="td-c">
                                        {$extrakm=$total_km-3000}
                                        {if $extrakm<0}
                                            {$extrakm=''}
                                        {/if}
                                        <input type="text" class="form-control" onblur="calculatetotal(3);" id="qty3" name="extra_km_qty" value="{if isset($invoice.extra_km_qty)}{$invoice.extra_km_qty}{else}{$extrakm}{/if}">
                                    </td>
                                    <td class="td-c"><input type="text" onblur="calculatetotal(3);" id="rate3" class="form-control" name="extra_km_rate" value="{if isset($invoice.extra_km_rate)}{$invoice.extra_km_rate}{else}12{/if}"></td>
                                    <td class="td-c">
                                        {$extrakmamt=0}
                                        {if $extrakm>0}
                                            {$extrakmamt=$extrakm * 12}
                                        {/if}
                                        {if isset($invoice.extra_km_amt)}{$extra_km_amt=$invoice.extra_km_amt}{else}{$extra_km_amt=$extrakmamt}{/if}
                                        <input type="text" class="form-control" onblur="calculatetotal(3);" id="amt3" name="extra_km_amt" value="{$extra_km_amt}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-c">Extra hour</td>
                                    <td class="td-c">
                                        {$extramin={($extra_min+($extra_hr*60))/60}|string_format:"%.2f"}
                                        <input type="text" class="form-control" onblur="calculatetotal(4);" id="qty4" name="extra_hr_qty" value="{if isset($invoice.extra_hr_qty)}{$invoice.extra_hr_qty}{else}{$extramin}{/if}">
                                    </td>
                                    <td class="td-c"> <input type="text" id="rate4" onblur="calculatetotal(4);" class="form-control" name="extra_hr_rate" value="{if isset($invoice.extra_hr_rate)}{$invoice.extra_hr_rate}{else}65.00{/if}"></td>
                                    <td class="td-c">
                                        {$extrahramt={($extra_min+($extra_hr*60))/60}*65}
                                        
                                        {if isset($invoice.extra_hr_amt)}{$extra_hr_amt=$invoice.extra_hr_amt}{else}{$extra_hr_amt=$extrahramt}{/if}
                                        <input type="text" class="form-control" id="amt4" onblur="calculatetotal(4);" name="extra_hr_amt" value="{$extra_hr_amt|string_format:"%.2f"}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-c">Break down</td>
                                    <td class="td-c">
                                        <input type="text" class="form-control" onblur="calculatetotal(6);" id="qty6" name="br_down_qty" value="{if isset($invoice.br_down_qty)}{$invoice.br_down_qty}{else}{/if}">
                                    </td>
                                    <td class="td-c"> <input type="text" id="rate6" onblur="calculatetotal(6);" class="form-control" name="br_down_rate" value="{if isset($invoice.br_down_rate)}{$invoice.br_down_rate}{else}{/if}"></td>
                                    <td class="td-c">
                                        
                                        {if isset($invoice.br_down_amt)}{$br_down_amt=$invoice.br_down_amt}{else}{/if}
                                        <input type="text" class="form-control" id="amt6" onblur="calculatetotal(6);" name="br_down_amt" value="{$br_down_amt|string_format:"%.2f"}">
                                    </td>
                                </tr>

                                <tr>
                                    <td class="td-c">Toll /Parking</td>
                                    <td class="td-c">-</td>
                                    <td class="td-c">-</td>
                                    <td class="td-c">
                                        <input type="text" class="form-control" onblur="calculatetotal(0);" id="amt5" name="toll" value="{if isset($invoice.toll)}{$invoice.toll}{else}{$toll|string_format:"%.2f"}{/if}">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                            <th class="td-c"></th>
                            <th class="td-c"></th>
                            <th class="td-c">TOTAL</th>
                            <th class="td-c" id="total_amount">{{$extra_day_amt + $extra_hr_amt+$extra_km_amt+$toll+$fix_amt-$br_down_amt}|string_format:"%.0f"}.00</th>
                            </tfoot>
                        </table>
                    </div>
                    <input type="hidden" name="vehicle_id" value="{$post.vehicle_id}">
                    <input type="hidden" name="company_id" value="{$post.company_id}">
                    <input type="hidden" name="date" value="{$post.date}">
                    <input type="hidden" name="invoice_id" value="{$invoice.invoice_id}">
                    <input type="hidden" name="type" value="{$type}">
                    <div class="col-md-6">
                         Bill Date :<input type="text" name="bill_date" style="max-width: 200px;" readonly="" required="" value="{{$invoice.bill_date}|date_format:"%d-%b-%Y"}" autocomplete="off" class="form-control form-control-inline date-picker" data-date-format="d-M-yyyy" >
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

