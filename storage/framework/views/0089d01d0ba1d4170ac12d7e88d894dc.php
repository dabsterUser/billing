<?php $__env->startSection('content'); ?>
<style>
.dataTables_filter{
  display: none;
}
</style>

<div class="top-stickybar">
  <div class="container-fluid">
    <div class="row d-flex justify-content-end align-items-center">
      <div class="col-4 pl-0">
        <h1>Customers</h1>
      </div>
      <div class="col-8 text-right">
        <a href="#" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal">Add New Customer</a>
        <a href="javascript:;" id="multiDelete" class="btn btn-danger mr-2 d-none">Remove</a>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid main-container">
  <div class="main-form-container">
    <div class="search-header border-bottom py-4 px-3">
      <div class="form-group row col-sm-6 mb-0">
        <label for="" class="col-sm-2 col-form-label">Search</label>
        <div class="col-sm-10">
          <div class="controls">
            <input type="text" value="" name="" maxlength="150" class="form-control" id="searchbox" placeholder="Search Customer"
              required="" aria-required="true">
          </div>
        </div>
      </div>
    </div>
    <div class="total-widget py-4">
      <div class="row mx-0">
        <div class="col-sm-3">
          <div class="">
            <div class="">
              <h5><i class="fa fa-info-circle"></i> <span>Total Customers added</span></h5>
              <div class="total-counter"><i>Till Date</i><br><b><?php echo e($total_customer); ?> Customers</b></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="record-table custom-data-table">
      <!-- <div class="table-responsive"> -->

        <form id="customer-records" action="javascript:;" method="post">

          <?php echo csrf_field(); ?>

          <table class="table table-hover" id="customer_datatable" data-footable="" data-toggle-column="last"
            style="display: table;">

            <thead>

              <tr class="footable-header">

                <th class="chkbox footable-first-visible">

                  <input type="checkbox" class="select-all" onclick="selectall();" name="del">

                </th>

                <th><a href="#">Customer/Vendor Name</a></th>

                <th>outstanding payment</th>

                <th><a href="#">Contact Number</a></th>

                <th><a href="#">Company Type</a></th>

                <th><a href="#">State</a></th>

                <th>

                  <a href="#">Status</a>

                </th>

                <th class="footable-last-visible">

                  Action

                </th>

              </tr>

            </thead>

            <tbody>

              <?php if(count($customers) > 0): ?>

              <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <tr>

                <td class="footable-first-visible">

                  <input type="checkbox" class="single-select" name="customer_id[]" value="<?php echo e($customer->id); ?>">

                </td>

                <td><?php echo e($customer->name); ?></td>

                <td>

                  <a href="#" class="company_total"> Get Total Balance </a>

                </td>

                <td><?php echo e($customer->phone); ?></td>

                <td><?php echo e($customer->type); ?></td>

                <td><?php echo e($customer->state_name); ?></td>

                <td class="td-actions">

                  <input data-id="<?php echo e($customer->id); ?>" class="toggle-class btn btn-outline-success" type="checkbox"
                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                    data-off="InActive" <?php echo e($customer->status=='active' ? 'checked' : ''); ?>>



                  <!--a href="#" class="btn btn-outline-success"><?php echo e($customer->status); ?></a-->

                </td>

                <td class="td-actions footable-last-visible">

                  <a href="javascript:;" onclick="get_customer_by_id('<?php echo e($customer->id); ?>')" class="btn btn-outline-primary"><i
                      class="icon icon-pencil"></i>Edit</a>

                </td>

              </tr>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <?php endif; ?>

            </tbody><!-- /tbody -->

          </table>
  </form>

      <!-- </div> -->
    </div>
  </div>

</div>
<div class="modal right" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">

    <div class="modal-content">


    <form action="<?php echo e(url('/customers')); ?>" method="POST" id="add-customer-form">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Create New Customer</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary" > Save</button>
      </div>

      <div class="modal-body">
      <?php echo csrf_field(); ?>
        <div class="form-group row">
          <label for="registration_type" class="col-sm-3 col-form-label required">Type</label>
          <div class="col-sm-9">
            <div class="controls">
              <select class="form-control custom-select" id="companytype" name="type">
                <option value="customer" <?php echo e(old('type') =='customer'?'selected':''); ?>>Customer</option>
                <option value="vendor" <?php echo e(old('type') =='vendor'?'selected':''); ?>>Vendor</option>
                <option value="customer-vendor" <?php echo e(old('type') =='customer-vendor'?'selected':''); ?>>Customer/Vendor</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Name</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text"  name="name" id="name" maxlength="150" class="form-control"
                placeholder="Enter customer / vendor name" aria-required="true">
            </div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="" class="col-sm-3 col-form-label">Phone Number</label>
          <div class="col-sm-9">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">+91</div>
              </div>
              <input type="text" name="phone" id="phone" value="" class="form-control"
                placeholder="Your company phone no./Mobile no." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Address</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="address1" id="address1" placeholder="Full address"
              rows="4"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Country</label>
          <div class="col-sm-9">
            <select class="custom-select" id="country">
              <option selected="">India</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">State</label>
          <div class="col-sm-9">
            <select class="form-control custom-select <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="state_id" name="state_id" >
              <option value="">Select State</option>
              <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?> (<?php echo e($state->state_code); ?>)</option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
              <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback">
                <strong><?php echo e($message); ?></strong>
              </span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Pin code</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="pincode" name="pincode"
              placeholder="Your postal pin code" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="6">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Registration Type</label>
          <div class="col-sm-9">
            <select class=" form-group custom-select" id="type" name="registration_type">
              <option value="0">Your Company Type</option>
              <option value="1">Proprietorship</option>
              <option value="2">Partnership</option>
              <option value="3">Hindu Undivided Family</option>
              <option value="4" selected="">Private Limited Company</option>
              <option value="5">Public Limited Company</option>
              <option value="6">Society/ Club/ Trust/ AOP</option>
              <option value="7">Government Department</option>
              <option value="8">Public Sector Undertaking</option>
              <option value="9">Unlimited Company</option>
              <option value="10">Limited Liability Partnership</option>
              <option value="11">Local Authority</option>
              <option value="12">Statutory Body</option>
              <option value="13">Foreign Company</option>
              <option value="14">Foreign Limited Liability Partnership</option>
              <option value="15">Others</option>
            </select>

          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">PAN no.</label>
          <div class="col-sm-9">
            <input type="text" name="pan" id="pan_number" value="" class="form-control text-uppercase"
              placeholder="PAN number of the business or personal if propietor" maxlength="10"
              oninput="if (this.value.length >= 10) ValidatePAN()"
              >
              <span id="lblPANCard" class="text-danger" style="visibility:hidden;">Invalid PAN Number</span>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">GSTIN</label>
          <div class="col-sm-9">
            <input type="phone" class="form-control text-uppercase" id="gstin" name="gstin"
              placeholder="Enter GSTIN (If available)" maxlength="15"
              
              oninput="if (this.value.length >= 10) ValidateGST()"
              >
              <input type="hidden" name="" value="<?php echo e($state->state_code); ?>">
              <span id="lblGST" class="text-danger" style="visibility:hidden;">Invalid GST Number</span>

          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Shipping Addr.</label>
          <div class="col-sm-9">
            <div class="controls mt-2">
              <label><input type="checkbox" name="same_shipping" value="1" checked="" id="is_same_shipping"> Use Same
                Shipping Address</label>
            </div>
          </div>
        </div>
        <div class="additional-info d-none">
          <h5 class="border-top border-bottom py-3 my-3 subheading">Additional Shipping Address</h5>
          <div class="form-group">
            <label for="SHIP. Name" class="control-label">SHIP. Name</label>
            <div class="controls">
              <input type="text" value="" name="shipping_name" id="shipping_name" class="form-control"
                placeholder="Enter shipping Name">
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. Phone" class="control-label">SHIP. Phone</label>
            <div class="controls">
              <input type="text" value="" name="shipping_phone" id="ship_phone" class="form-control"
                placeholder="Enter shipping phone No." maxlength="20">
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. Address" class="control-label">SHIP. Address</label>
            <div class="controls">
              <textarea name="shipping_address" id="shipping_address" class="form-control"
                placeholder="Enter shipping address"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. State" class="control-label">SHIP. State</label>
            <div class="controls">
              <select type="list" data-value="" name="shipping_state_id" class="form-control" id="listBox2">
                <option value="">Select State</option>
                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?> (<?php echo e($state->state_code); ?>)</option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="PAN" class="control-label">SHIP PAN</label>
            <div class="controls">
              <input type="text" value="" name="shipping_pan" id="shipping_pan" class="form-control"
                placeholder="Enter shipping  PAN" maxlength="20">
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. GSTIN " class="control-label">SHIP. GSTIN</label>
            <div class="controls">
              <input type="text" value="" name="shipping_gstin" id="ship_gstno" class="form-control"
                placeholder="Enter shipping GSTIN " maxlength="20">
            </div>
          </div>
        </div>

      </div>
    </div>

    </form>

  </div>
</div>

<!-- Edit Customer Modal -->
<div class="modal right" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModal" aria-hidden="true">
  <div class="modal-dialog modal-md">

    <div class="modal-content">


    <form action="javascript:;" method="POST" id="update-customer-form">
      <?php echo csrf_field(); ?>
      <?php echo e(method_field('PATCH')); ?>

      <input type="hidden" name="customer_id" id="customer_id" >
      <input type="hidden" name="address_id" id="address_id" >
      <div class="modal-header">

        <h5 class="modal-title" id="editCustomerModallabel">Update Customer</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary"> Update</button>
      </div>

      <div class="modal-body">
      <?php echo csrf_field(); ?>
        <div class="form-group row">
          <label for="registration_type" class="col-sm-3 col-form-label required">Type</label>
          <div class="col-sm-9">
            <div class="controls">
              <select class="form-control custom-select" id="edit_companytype" name="type">
                <option value="customer" <?php echo e(old('type') =='customer'?'selected':''); ?>>Customer</option>
                <option value="vendor" <?php echo e(old('type') =='vendor'?'selected':''); ?>>Vendor</option>
                <option value="customer-vendor" <?php echo e(old('type') =='customer-vendor'?'selected':''); ?>>Customer/Vendor</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Name</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text"  name="name" id="edit_name" maxlength="150" class="form-control"
                placeholder="Enter customer / vendor name" aria-required="true">
            </div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="" class="col-sm-3 col-form-label">Phone Number</label>
          <div class="col-sm-9">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">+91</div>
              </div>
              <input type="number" name="phone" id="edit_phone" value="" class="form-control"
                placeholder="Your company phone no./Mobile no.">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Address</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="address1" id="edit_address1" placeholder="Full address"
              rows="4"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Country</label>
          <div class="col-sm-9">
            <select class="custom-select" id="edit_country">
              <option selected="">India</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">State</label>
          <div class="col-sm-9">
            <select class="form-control custom-select <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="edit_state_id" name="state_id" >
              <option value="">Select State</option>
              <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?> (<?php echo e($state->state_code); ?>)</option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
              <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback">
                <strong><?php echo e($message); ?></strong>
              </span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Pin code</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="edit_pincode" name="pincode"
              placeholder="Your postal pin code">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Registration Type</label>
          <div class="col-sm-9">
            <select class=" form-group custom-select" id="edit_registration_type" name="registration_type">
              <option value="0">Your Company Type</option>
              <option value="1">Proprietorship</option>
              <option value="2">Partnership</option>
              <option value="3">Hindu Undivided Family</option>
              <option value="4" selected="">Private Limited Company</option>
              <option value="5">Public Limited Company</option>
              <option value="6">Society/ Club/ Trust/ AOP</option>
              <option value="7">Government Department</option>
              <option value="8">Public Sector Undertaking</option>
              <option value="9">Unlimited Company</option>
              <option value="10">Limited Liability Partnership</option>
              <option value="11">Local Authority</option>
              <option value="12">Statutory Body</option>
              <option value="13">Foreign Company</option>
              <option value="14">Foreign Limited Liability Partnership</option>
              <option value="15">Others</option>
            </select>

          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">PAN no.</label>
          <div class="col-sm-9">
            <input type="text" name="pan" id="edit_pan_number" value="" class="form-control"
              placeholder="PAN number of the business or personal if propietor">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">GSTIN</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="edit_gstin" name="gstin"
              placeholder="Enter GSTIN (If available)">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Shipping Addr.</label>
          <div class="col-sm-9">
            <div class="controls mt-2">
              <label><input type="checkbox" name="same_shipping" value="1" checked="" id="edit_is_same_shipping"> Use Same
                Shipping Address</label>
            </div>
          </div>
        </div>
        <div class="edit_additional-info d-none">
          <h5 class="border-top border-bottom py-3 my-3 subheading">Additional Shipping Address</h5>
          <div class="form-group">
            <label for="SHIP. Name" class="control-label">SHIP. Name</label>
            <div class="controls">
              <input type="text" value="" name="shipping_name" id="edit_shipping_name" class="form-control"
                placeholder="Enter shipping Name">
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. Phone" class="control-label">SHIP. Phone</label>
            <div class="controls">
              <input type="text" value="" name="shipping_phone" id="edit_ship_phone" class="form-control"
                placeholder="Enter shipping phone No." maxlength="20">
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. Address" class="control-label">SHIP. Address</label>
            <div class="controls">
              <textarea name="shipping_address" id="edit_shipping_address" class="form-control"
                placeholder="Enter shipping address"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. State" class="control-label">SHIP. State</label>
            <div class="controls">
              <select type="list" data-value="" name="shipping_state_id" class="form-control" id="edit_ship_state">
                <option value="">Select State</option>
                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?> (<?php echo e($state->state_code); ?>)</option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="PAN" class="control-label">SHIP PAN</label>
            <div class="controls">
              <input type="text" value="" name="shipping_pan" id="edit_shipping_pan" class="form-control"
                placeholder="Enter shipping  PAN" maxlength="20">
            </div>
          </div>
          <div class="form-group">
            <label for="SHIP. GSTIN " class="control-label">SHIP. GSTIN</label>
            <div class="controls">
              <input type="text" value="" name="shipping_gstin" id="edit_ship_gstno" class="form-control"
                placeholder="Enter shipping GSTIN " maxlength="20">
            </div>
          </div>
        </div>

      </div>
    </div>

    </form>

  </div>
</div>
<!-- End Customer Modal -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
    <script>

  $('#is_same_shipping').on('click',function(){
      var ischecked = $('#is_same_shipping').is(':checked');
      if(ischecked == false){
          $('.additional-info').removeClass('d-none');
      }else{
          $('.additional-info').addClass('d-none');
      }
    });

    $('#edit_is_same_shipping').on('click',function(){
      var ischecked = $('#edit_is_same_shipping').is(':checked');
      if(ischecked == false){
          $('.edit_additional-info').removeClass('d-none');
      }else{
          $('.edit_additional-info ').addClass('d-none');
      }
    });

    jQuery.validator.addMethod("lettersonly", function(value, element) {
      return this.optional(element) || /^[a-z\s]+$/i.test(value);
    }, "Letters only please");

    jQuery.validator.addMethod(
      "regex",
      function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
      },
      "Please check your input."
    );

    jQuery.validator.addMethod("gstin", function(value, element) {
      var gstin = new RegExp('^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$');
      return this.optional(element) || pan.test(value) || gstin.test(value);
    }, "Invalid Gstin number");

    jQuery.validator.addMethod("custom_pan", function(value, element) {
      var pan = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
      return this.optional(element) || pan.test(value) ;
    }, "Invalid Pan number");

    jQuery.validator.addMethod("exactlength", function(value, element, param) {
    return this.optional(element) || value.length == param;
    }, $.validator.format("Please enter exactly {0} characters."));

      $('#add-customer-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
              lettersonly:true,
              maxlength:20,
              minlength:4
            },
            phone:{
              digits:true,
              exactlength:10
            },
            pincode:{
              required:true,
              digits:true,
              exactlength:6
            },
            state_id:{
              required:true
            },
            // pan:{
            //   custom_pan:true
            // }
        },
        messages: {
          name: {
              required: 'Please enter Customer/vendor',
              lettersonly:'Name should be only characters'
          },
          phone:{
            digits:'you can enter only digits'
          },
          pincode:{
            digits:'you can enter only digits'
          },
          state_id:{
            required:'Please select state'
          },
          pan:{
            pan:true
          }

        },
        highlight: function(element) {
            $(element).closest('.form-group input').addClass('has-error border-danger');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group input').removeClass('has-error border-danger');
        },
        success: function(element) {
            $(element).closest('.form-group input').removeClass('has-error border-danger');
            $(element).closest('.form-group').children('span.help-block').remove();
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest('.form-group .col-sm-9'));
        },
        submitHandler: function(form) {
           form.submit();
        }
    });


 var dataTable =  $("#customer_datatable").DataTable();

 $("#searchbox").keyup(function() {
    filterGlobal();
  });

  function filterGlobal () {
      $('#customer_datatable').DataTable().search(
          $('#searchbox').val(),
      ).draw();
  }


  function selectall(event) {

    var ischecked = $('.select-all').is(':checked');

    if (ischecked == true) {

      $('.single-select').prop('checked', 'checked');
      $('#multiDelete').removeClass('d-none');

    } else {

      $('.single-select').prop('checked', false);
      $('#multiDelete').addClass('d-none');

    }

  }





  $('.single-select').on('click', function () {

    var totalCheckboxes = $('.single-select').length;

    var numberOfChecked = $('.single-select:checked').length;

    if(numberOfChecked < totalCheckboxes) {

      $('.select-all').prop('checked', false);
    }else {
      $('.select-all').prop('checked', true);
    }

    if(numberOfChecked > 0){
      $('#multiDelete').removeClass('d-none');
    }else{
      $('#multiDelete').addClass('d-none');
    }

  });



  $('#multiDelete').on('click', function (e) {
    Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url: base_url + '/customer/multidelete',
                    method: 'POST',
                    data: $('#customer-records').serialize(),
                    success: function (data) {
                      if (data == '1') {
                        swal.fire({
                          'title': 'Cutsomer Deleted successfully',
                          'icon': 'success'
                        }).then(function () {
                          document.location.href = base_url + '/customers';
                        });
                      } else {
                        swal.fire(data);
                      }
                    }
                  });
                }
            })

  });



  //change the customer status

  $(function () {

    $('.toggle-class').change(function () {

      var status = $(this).prop('checked') == true ? 'active' : 'inactive';

      //alert(status);

      var c_id = $(this).data('id');

      // alert(user_id);

      $.ajax({

        type: "GET",

        dataType: "json",

        url: base_url + '/changecustomerStatus/' + c_id,

        data: { 'status': status, 'id': c_id },

        success: function (data) {

          //  console.log(data);
          if(data.status == 1){
            toastr.success(data.message);
          }else{
            toastr.warning(data.message);
          }

        }

      });

    })

  })

// Edit Customer data

function get_customer_by_id(customer_id){

  $.ajax({
    type: "GET",
    url: base_url+'/customerlist',
    ContentType : 'application/json',
    dataType: 'json',
    data: {id:customer_id},
    success: function(response){
      // console.log(response)
      if(response.status == 1){
        var customer_data = response.data[0];

        $('#customer_id').val(customer_data.id);
        $('#address_id').val(customer_data.address_id);
        $('#edit_companytype').val(customer_data.type);
        $('#edit_name').val(customer_data.name);
        $('#edit_phone').val(customer_data.phone);
        $('#edit_address1').val(customer_data.address1);
        $('#edit_country').val('india');
        $('#edit_state_id').val(customer_data.state_id);
        $('#edit_pincode').val(customer_data.pincode);
        $('#edit_registration_type').val(customer_data.registration_type);
        $('#edit_pan_number').val(customer_data.pan);
        $('#edit_gstin').val(customer_data.gstin);
        if(customer_data.same_shipping == 'on'){
          $('#edit_is_same_shipping').prop('checked',true);

        }else{
          $('#edit_is_same_shipping').prop('checked',false);
          $('.edit_additional-info').removeClass('d-none');
        }
        $('#edit_shipping_name').val(customer_data.shipping_name);
        $('#edit_ship_phone').val(customer_data.shipping_phone);
        $('#edit_shipping_address').val(customer_data.shipping_address);
        $('#edit_ship_state').val(customer_data.shipping_state_id);
        $('#edit_shipping_pan').val(customer_data.shipping_pan);
        $('#edit_ship_gstno').val(customer_data.shipping_gstin);
        $('#editCustomerModal').modal('show');
      }else{
        toastr.warning(data.message);
      }
    },
    error: function(data){
    },
    complete: function(data){
    }
  })
}

$('#update-customer-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
              lettersonly:true,
              maxlength:20,
              minlength:4
            },
            phone:{
              digits:true,
              exactlength:10
            },
            pincode:{
              required:true,
              digits:true,
              exactlength:6
            },
            state_id:{
              required:true
            }
        },
        messages: {
          name: {
              required: 'Please enter Customer/vendor',
              lettersonly:'Name should be only characters'
          },
          phone:{
            digits:'you can enter only digits'
          },
          pincode:{
            digits:'you can enter only digits'
          },
          state_id:{
            required:'Please select state'
          },
          pan:{
            pan:true
          }

        },
        highlight: function(element) {
            $(element).closest('.form-group input').addClass('has-error border-danger');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group input').removeClass('has-error border-danger');
        },
        success: function(element) {
            $(element).closest('.form-group input').removeClass('has-error border-danger');
            $(element).closest('.form-group').children('span.help-block').remove();
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest('.form-group .col-sm-9'));
        },
        submitHandler: function(form) {
           var customer_id = $('#customer_id').val();
          $.ajax({
            type: "POST",
            url: base_url+'/customers/'+customer_id,
            ContentType : 'application/json',
            dataType: 'json',
            data: $('#update-customer-form').serialize(),
            success: function(response){
              // console.log(response);
              if(response.status == 1){
                toastr.success(response.message);
                document.location.href = base_url + '/customers';
              }else{
                toastr.warning(response.message);
              }
            }
          });
        }
          //  form.submit();


    });
</script>

<script>
  function ValidatePAN() {

        var txtPANCard = document.getElementById("pan_number");
        var lblPANCard = document.getElementById("lblPANCard")

        // console.log(txtPANCard);
        var regex = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;
        if (regex.test(txtPANCard.value.toUpperCase())) {
            lblPANCard.style.visibility = "hidden";
            return true;
        } else {
            lblPANCard.style.visibility = "visible";
            return false;
        }
    }

// validate GSTIN


function ValidateGST(){
          var txtGST = document.getElementById("gstin");
          var lblGST = document.getElementById("lblGST")

          var stateCodes = [
            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                [ "<?php echo e($state->state_code); ?>" ],
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ];

          console.log(stateCodes[0]);

          var regex = /[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
          if (regex.test(txtGST.value.toUpperCase())) {
            lblGST.style.visibility = "hidden";
            return true;
        } else {
            lblGST.style.visibility = "visible";
            return false;
        }
}
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Work\NewBilling\resources\views/customer-vendor/index.blade.php ENDPATH**/ ?>