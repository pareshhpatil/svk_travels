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
                                    {$company.name} {$company.address}
                                    <br>
                                    Logsheet Entry for the month of {{$date}|date_format:"%b %Y"}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10" class="td-c" style="font-size: 15px;font-weight: bold;">
                                    Summery of Car No: {$vehicle.number} ({$vehicle.car_type})
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
                            {$extra_hr=0}
                            {$extra_min=0}
                            {foreach from=$list item=v}
                                <tr>
                                    {if $v.start_km==0}
                                        <td class="td-c">
                                            {{$v.date}|date_format:"%d/%m/%Y"}
                                        </td>
                                        <td class="td-c" colspan="5" style="font-weight: bold;">{$v.remark}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    {else}
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
                                            {{$v.start_time}|date_format:"%I:%M %p"} 
                                        </td>
                                        <td class="td-c">
                                            {{$v.close_time}|date_format:"%I:%M %p"} 
                                        </td>
                                        <td class="td-c">
                                            {{$v.total_time}|date_format:"%H:%M"} 
                                        </td>
                                        <td class="td-c">
                                            {if ($v.extra_time>'00:00:00')}
                                                {$extra_hr=$extra_hr+{$v.extra_time}|date_format:"%H"}
                                                {$extra_min=$extra_min+{$v.extra_time}|date_format:"%M"}
                                                {{$v.extra_time}|date_format:"%H:%M"} 
                                            {/if}
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
                                    {/if}
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
                        <th class="td-c">EXTRA HRS</th>
                        <th class="td-c">{$invoice.extra_hr_qty} </th>
                        <th class="td-c">{$invoice.toll}</th>
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
                                <td class="td-c">{$invoice.fix_qty}</td>
                                <td class="td-c">{$invoice.fix_rate}</td>

                                <td class="td-c">{$invoice.fix_amt}</td>
                            </tr>
                            <tr>
                                <td class="td-c">Extra Day</td>
                                <td class="td-c">{$invoice.extra_day_qty}</td>
                                <td class="td-c">{$invoice.extra_day_rate}</td>
                                <td class="td-c">{$invoice.extra_day_amt}</td>
                            </tr>
                            <tr>
                                <td class="td-c">Extra KM.</td>
                                <td class="td-c">
                                    {$invoice.extra_km_qty}
                                </td>
                                <td class="td-c">{$invoice.extra_km_rate}</td>
                                <td class="td-c">
                                    {$invoice.extra_km_amt}
                                </td>
                            </tr>
                            <tr>
                                <td class="td-c">Extra hour</td>
                                <td class="td-c">
                                    {$invoice.extra_hr_qty}
                                </td>
                                <td class="td-c"> {$invoice.extra_hr_rate}</td>
                                <td class="td-c">
                                    {$invoice.extra_hr_amt}
                                </td>
                            </tr>
                            <tr>
                                <td class="td-c">Breakdown charges</td>
                                <td class="td-c">
                                    {$invoice.br_down_qty}
                                </td>
                                <td class="td-c"> {$invoice.br_down_rate}</td>
                                <td class="td-c">
                                    {if $invoice.br_down_amt>0} -{$invoice.br_down_amt}{/if}
                                </td>
                            </tr>

                            <tr>
                                <td class="td-c">Toll /Parking</td>
                                <td class="td-c">-</td>
                                <td class="td-c">-</td>
                                <td class="td-c">
                                    {$invoice.toll}
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                        <th class="td-c"></th>
                        <th class="td-c"></th>
                        <th class="td-c">TOTAL</th>
                        <th class="td-c" id="total_amount">{{$invoice.extra_day_amt + $invoice.extra_hr_amt+$invoice.extra_km_amt+$invoice.toll+$invoice.fix_amt-$invoice.br_down_amt}|string_format:"%.2f"}</th>
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

