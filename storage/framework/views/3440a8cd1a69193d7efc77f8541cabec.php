<?php $__env->startSection('content'); ?>
  <style>
    *{
        box-sizing: border-box;
    }
    .company-info{
        display: inline-block;       
    }
    .right-side{
       width: 80%;
      text-align: right;
    }
    .name-holder{
        font-size: 20px;
        margin-bottom: 10px;
    }
    p{
        margin:0;
        font-size: 15px;
        line-height: 22px;
    }
    .report-header {
     margin-bottom: 40px;
    }
    .report-header h2 {
      font-size: 20px;
      margin-bottom: 0px;
    }
    .text-center{
        text-align: center;
    }
   
    .table th{
        font-size: 14px;
    }
    .table td{
        font-size: 14px;
    }
  </style>
</head>
<body>

  <div class="wrap">
    <!-- Company Information -->
    <div class="d-flex">
        <div class="company-info left-side">
        <h2 class="name-holder" >Raman Ent.</h2>
        <p class="gst" >03KHYEH0785A1Z5</p>
        <p class="address">Test Track<br> TDI<br> Mohali</p>
        </div>
        <div class="company-info right-side">
        <h2 class="name-holder" >Raman Ent.</h2>
        <p class="gst" >03KHYEH0785A1Z5</p>
        <p class="address" >Test Track<br> TDI<br> Mohali</p>
        </div>
    </div>
    <!-- Report Header -->
    <div class="report-header text-center">
        <h2>Sales Outstanding Report</h2>
        <p>25-Sep-2024 to 26-Sep-2024</p>
    </div>

    <!-- Table -->
    <table class="table" style="border: 0px solid #000000; border-top:0px;width:100%;">
      <thead style="padding: 0;border-bottom:1px solid #000;width:100%;">
          <th style="padding:5px;">Invoice Date</th>
          <th style="padding:5px;">Company Name</th>
          <th style="padding:5px;">Invoice No</th>
          <th style="padding:5px;">Total Amount</th>
          <th style="padding:5px;">Remaining Payment</th>
          <th style="padding:5px;">Due From Days</th>
      </thead>
      <tbody style="border-bottom:1px solid #000;text-align:center;width:100%;">
        <tr>
          <td style="padding:5px;">26-Sep-2024</td>
          <td style="padding:5px;"><b>Raman Enterprises</b></td>
          <td style="padding:5px;">2</td>
          <td style="padding:5px;">2,655.00</td>
          <td style="padding:5px;">2,655.00</td>
          <td style="padding:5px;">After 15 Days</td>
        </tr>
      </tbody>
      <tfoot style="border-bottom:1px solid #000;text-align:center; ">
        <td style="padding:5px"></td>
        <td style="padding:5px"></td>
        <td style="padding:5px"></td>
        <td style="padding:5px">2,655.00</td>
        <td style="padding:5px">2,655.00</td>
        <td style="padding:5px"></td>

      </tfoot>
    </table>

  </div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u284794662/domains/dabstersofttech.com/public_html/billing/resources/views/reports/print/sales-outstandings.blade.php ENDPATH**/ ?>