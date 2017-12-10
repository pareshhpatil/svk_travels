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
                    <table class="table" style="font-size: 12px !important;color: black !important;">
                        <tbody>
                            <tr >
                                <td class="td-c" style="border-top: 0px;"><img style="max-width: 140px;" src="/assets/admin/layout/img/logo.png" alt="logo" class="logo-default"></td>
                            </tr>
                            <tr>
                                <td class="td-c" style="border-top: 0px;font-size: 30px;font-family: cambria;color: #ff0000;">SIDDHIVINAYAK TRAVELS HOUSE</td>
                            </tr>
                            <tr>
                                <td class="td-c" style="font-size: 20px;font-family: cambria;">
                                    <br>
                                    TAX INVOICE FOR THE MONTH OF {{$date}|date_format:"%b - %Y"}
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
                                        <p><b>Date:</b> {{$invoice.bill_date}|date_format:"%d-%b-%Y"}</p>
                                    </div>
                                    <div class="col-md-12" >
                                        <p><b>Invoice No:</b> {$invoice.invoice_number}</p>
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
                                        <p><b>Company Name:</b> {$company.name} </p>
                                    </div>
                                    <div class="col-md-12" >
                                        <p><b>GSTIN:</b> {$company.gst_number}</p>
                                    </div>

                                    <div class="col-md-12" >
                                        <p><b>Address:</b> {$company.address}</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><div class="col-md-12" ><b>Vehicle No:</b> {$vehicle.number} ({$vehicle.car_type})</div></td>
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
                                                <td class="td-c">{$invoice.fix_qty}</td>
                                                <td><span class="pull-right">{$invoice.fix_rate}</span></td>
                                                <td><span class="pull-right">{$invoice.fix_amt}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="td-c">2</td>
                                                <td class="td-c">Charges for extra days</td>
                                                <td class="td-c">Day</td>
                                                <td class="td-c">{$invoice.extra_day_qty}</td>
                                                <td><span class="pull-right">{$invoice.extra_day_rate}</span></td>
                                                <td><span class="pull-right">{$invoice.extra_day_amt}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="td-c">3</td>
                                                <td class="td-c">Charges for extra hour</td>
                                                <td class="td-c">Hour</td>
                                                <td class="td-c">{$invoice.extra_hr_qty}</td>
                                                <td><span class="pull-right">{$invoice.extra_hr_rate}</span></td>
                                                <td><span class="pull-right">{$invoice.extra_hr_amt}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="td-c">4</td>
                                                <td class="td-c">Charges for Extra Km.</td>
                                                <td class="td-c">KM</td>
                                                <td class="td-c">{$invoice.extra_km_qty}</td>
                                                <td><span class="pull-right">{$invoice.extra_km_rate}</span></td>
                                                <td><span class="pull-right">{$invoice.extra_km_amt}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="td-c">5</td>
                                                <td class="td-c">Breakdown charges</td>
                                                <td class="td-c">Day</td>
                                                <td class="td-c">{$invoice.br_down_qty}</td>
                                                <td><span class="pull-right">{$invoice.br_down_rate}</span></td>
                                                <td><span class="pull-right">{if $invoice.br_down_amt>0} -{$invoice.br_down_amt}{/if}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="td-c">6</td>
                                                <td class="td-c">Toll/Parking</td>
                                                <td class="td-c"></td>
                                                <td class="td-c"></td>
                                                <td class="td-c"></td>
                                                <td><span class="pull-right">{$invoice.toll}</span></td>
                                            </tr>
                                            <tr>

                                                <td colspan="5"><span class="pull-right"><b>Total Value /Taxable Value(Rs.)</b></span></td>
                                                <td><span class="pull-right"><b>{$total_taxable|string_format:"%.2f"}</b></span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" rowspan="3" style="vertical-align: middle;"><span class="pull-right"><b>Goods and Services Tax @5%</b></span></td>
                                                <td><span class="pull-right">CGST@</span></td>
                                                <td><span class="pull-right">2.50%</span></td>
                                                <td><span class="pull-right">{$gst|string_format:"%.2f"}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="pull-right">SGST@</span></td>
                                                <td><span class="pull-right">2.50%</span></td>
                                                <td><span class="pull-right">{$gst|string_format:"%.2f"}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="pull-right">IGST@</span></td>
                                                <td><span class="pull-right">0.00%</span></td>
                                                <td><span class="pull-right">0.00</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><span class="pull-right"><b>Total GST Value</b></span></td>
                                                <td><span class="pull-right"><b>{$total_gst|string_format:"%.2f"}</b></span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><span class="pull-right"><b>Grand Total (Inclusive of GST)</b></span></td>
                                                <td><span class="pull-right"><b>{$grand_total|string_format:"%.2f"}</b></span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><span class="pull-right"><b>Invoice Value (In Words)&nbsp;&nbsp;</b></span></td>
                                                <td colspan="4"> &nbsp;&nbsp; {$wordmoney} Only.</td>
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

