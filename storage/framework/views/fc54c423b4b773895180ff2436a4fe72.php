    <style>
    table{
        border-collapse: collapse !important;
        border: none !important;
        
    }
    table td{
        border: none !important;
    }
   
</style>
<script src="https://cdn.jsdelivr.net/npm/@linways/table-to-excel@1.0.4/dist/tableToExcel.min.js"></script>
<div class="table-responsive">
    
    <table class="table" width="100%" id="table_1" style="border: none">
        <!-- Header -->
        
        <tr  style="border:none;">
            <td colspan="6" style="font-size:30px;text-transform:capitalize;border:none;">My Company Name</td>
            <td style="border:none;"></td>
            <td  style="border:none;"></td>
            <td  style="border:none;"></td>
            <td colspan="3"  style="font-size:30px;text-transform:capitalize;border:none">Statement</td>
        </tr>
        <tr  style="border:none;">
            <td colspan="13" style="font-size:16px;text-transform:capitalize;border:none">My Company Solgn</td>
        </tr>
    </table>
    <table class="table" style="width: 100%;margin-top:20px;">
        <tr>
            <td></td>
            <td colspan="3" rowspan="3" class="table" style="1px solid #000;vertical-align: middle;text-align:center;">
                insert your logo
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="3">
                <table>
                    <tr>
                        <td  colspan="2">
                            Date :
                        </td>
                        <td colspan="3" style="border: 1px solid #000; padding:5px;">
                            December 5,2023
                        </td>
                    </tr>
                     <tr>
                        <td colspan="2">Statement #</td>
                        <td colspan="3" style="border:1px solid #000;padding:5px;text-align:left;">100</td>
                    </tr>
                    <tr>
                        <td colspan="2">Customer ID :</td>
                        <td colspan="3" style="border:1px solid #000;padding:5px;">ABC12345</td>
                    </tr>
                    <tr>
                        <td colspan="2">Page</td>
                        <td colspan="3" >1 of 1</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <table class="table" style="width:100%">
        <tr>
            <td colspan="5" style="background-color: #000080;color:#fff !important;">Bill To:</td>
            <td></td>
            <td></td>
            <td colspan="5" style="background-color: #000080;color:#fff !important;">Account Summary:</td>

        </tr>
            
    </table>
    <table class="table" style="width:100%">
       <tr >
        <td colspan="5">
            <table width="100%">
                <tr>
                    <td colspan="2">
                        <b>Name :</b>
                    </td>
    
                    <td colspan="3">
                        ABC
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <b>Company Name :</b>
                    </td>
                    <td colspan="3">
                        defgh
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <b>Street Address :</b>
                    </td>
                    <td colspan="3">
                        123 house
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <b>City, ST Zip Code :</b>
                    </td>
                    <td colspan="3">
                        Patiala, 147111
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <b>Phone :</b>
                    </td>
                    <td colspan="3" style="text-align: left">
                    1234567890
                    </td>
                </tr>
            </table>
        </td>
        <td></td>
        <td></td>
        <td colspan="5">
            <table width="100%">
                <tr>
                    <td colspan="2">
                        Previous Balance
                        
                    </td>
                    <td></td>
                    <td >
                        $ 3,000.00
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Credits                        
                    </td>
                    <td></td>
                    <td>
                        $ 1,250.00
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        New Charges
                        
                    </td>
                    <td></td>
                    <td style="text-align: right;">
                        $ 537.50
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <b>Total Balance Due</b>                        
                    </td>
                    <td></td>
                    <td >
                        $ 2,287.50
                    </td>
                </tr>
                <tr>

                    <td colspan="2">
                        Payment Due Date
                        
                    </td>
                    <td></td>
                    <td >
                        26-Aug-2009
                            
                    </td>
                   
                </tr>
            </table>
        </td>
       </tr>
    </table>
    <table id="Record" class="table" style="margin-top: 20px;">
        <thead >
          <tr >
            <th colspan="2" style="background-color: #000080; color:#fff;"><b>Invoice Date</b></th>
            <th colspan="2" style="background-color: #000080; color:#fff;"><b>Company Name</b></th>
            <th colspan="2" style="background-color: #000080; color:#fff;"><b>Vch Type</b></th>
            <th colspan="2" style="background-color: #000080; color:#fff;"><b>Invoice #</b></th>
            <th colspan="2" style="background-color: #000080; color:#fff;"><b>Taxable Value Total</b></th>
            <th colspan="2" style="background-color: #000080; color:#fff;"><b>Line Total</b></th>
          </tr>
        </thead>
        <tbody>
            <?php
                $totalTaxablePrice = 0;
                $grandTotal = 0;
            ?>
            <?php $__currentLoopData = $saleReportsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="2"><?php echo e($data->bill_date); ?></td>
                    <td colspan="2"><?php echo e("Company Name"); ?></td>
                    <td colspan="2"><?php echo e($data->type); ?></td>
                    <td colspan="2"><?php echo e($data->invoice_number); ?></td>
                    <td colspan="2"><?php echo e($data->total_taxable); ?></td>
                    <td colspan="2"><?php echo e($data->item_total); ?></td>
                </tr>
                <?php
                    $totalTaxablePrice += $data->total_taxable;
                    $grandTotal += $data->item_total;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                

        </tbody>
      </table>
</div>
<?php /**PATH /home/u284794662/domains/dabstersofttech.com/public_html/billing/resources/views/reports/Excel/sales-reports.blade.php ENDPATH**/ ?>