<?php $__env->startSection('content'); ?>

<div class="top-stickybar">
  <div class="container-fluid">
    <div class="row d-flex justify-content-end align-items-center">
      <div class="col-4 pl-0">
        <h1>Purchase Invoice List</h1>
      </div>
      <div class="col-8 text-right">
        <a href="" class="btn btn-primary mr-2 d-none">Add</a>
        <div class="d-none" id="multiDelete">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid main-container">
  <div class="main-form-container">
    <div class="row align-items-center justify-content-between px-5">
        <div class="search-header border-bottom py-4 px-3 col-6">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Search</label>
                <div class="col-sm-10">
                <div class="controls">
                    <input type="text" id="searchbox" maxlength="150" class="form-control" placeholder="Search Product"
                    aria-required="true">
                </div>
                </div>
            </div>
        </div>
        <div class="control ">
            <a href="" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">Add</a>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Amount Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="<?php echo e(url ('expenses/store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
            <div class="form-row">
                <div class="form-group">
                    <label for="inputEmail4">Date</label>
                    <input type="date" name="expense_date" class="form-control" id="date">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Expense Tittle</label>
                <input type="text" name="expense_title" class="form-control" id="tittle" placeholder="expense tittle">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Additional Note</label>
                <input type="text" name="expense_note" class="form-control" id="note" placeholder="Note">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Amount</label>
                <input type="text" name="expense_amount" class="form-control" id="note" placeholder="amount">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
     </div>
  </div>
</div>
    <div class="record-table custom-data-table">
        <table class="table table-border table-hover" data-footable="" id="purchase-invoice-datatable"
          data-toggle-column="last" style="display: table;">

          <thead>

            <tr class="footable-header">

              <th></th>

              <th>#</th>

              <th><a href="javascript:;">Date</a></th>

              <th><a href="javascript:;">Expense</a></th>

              <th><a href="javascript:;">Additional Note</a></th>

              <th><a href="javascript:;">Total Ammount</a></th>

              <th><a href="javascript:;">Actions</a></th>


            </tr>

          </thead>

          <tbody>

            <?php
                $i = 1
            ?>
            <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr class="table-bill-detail-rows">
                <td></td>
                <td><?php echo e($i); ?></td>
                <td><?php echo e($expense->date); ?></td>
                <td><?php echo e($expense->title); ?></td>
                <td><?php echo e($expense->additional_note); ?></td>
                <td><?php echo e($expense->amount); ?></td>
                <td>
                  <a href="" class="btn " data-toggle="modal" data-target="#editExpense<?php echo e($expense->id); ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                </td>

              </tr>
              <?php
                  $i++
              ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </tbody><!-- /tbody -->
          <tfoot>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total Ammount</td>
            <td>
              <?php $__currentLoopData = $totalExpense; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php echo e($total->total_amount); ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>

          </tfoot><!-- /tfoot -->

        </table>

    </div>
  </div>
</div>

<?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="editExpense<?php echo e($expense->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Expenses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="<?php echo e(url ('expenses/update',$expense->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
            <div class="form-row">
                <div class="form-group">
                    <label for="inputEmail4">Date</label>
                    <input type="date" name="expense_date" class="form-control" id="date" value="<?php echo e($expense->date); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Expense Tittle</label>
                <input type="text" name="expense_title" class="form-control" id="tittle" placeholder="expense tittle" value="<?php echo e($expense->title); ?>">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Additional Note</label>
                <input type="text" name="expense_note" class="form-control" id="note" placeholder="Note" value="<?php echo e($expense->additional_note); ?>">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Amount</label>
                <input type="text" name="expense_amount" class="form-control" id="note" placeholder="amount" value="<?php echo e($expense->amount); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
     </div>
  </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Work\NewBilling\resources\views/expenses/index.blade.php ENDPATH**/ ?>