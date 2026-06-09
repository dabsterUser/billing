

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
        <h1>Transport</h1>
      </div>
      <div class="col-8 text-right">
        <a href="javascript:;" class="btn btn-primary mr-2" data-toggle="modal" data-target="#addTransportModal">Add New Transport</a>
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
            <input type="text" id="searchbox"  maxlength="150" class="form-control" placeholder="Search Transport"
             aria-required="true">
          </div>
        </div>
      </div>
    </div>
    <div class="total-widget py-4">
      <div class="row mx-0">
        <div class="col-sm-3">
          <div class="">
            <div class="">
              <h5><i class="fa fa-info-circle"></i> <span>Total Transport added</span></h5>
              <div class="total-counter"><i>Till Date</i><br><b><?php echo e($total_tranport); ?> Tranports</b></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Listing product -->
    <div class="record-table custom-data-table">
      <!-- <div class="table-responsive"> -->
      <form method="post" id="transport-records">
            <?php echo csrf_field(); ?>
                <table class="table table-hover" id="transport-datatable" data-footable="" data-toggle-column="last" style="display: table;">
                <thead>
                    <tr class="footable-header">
                    <th class="chkbox footable-first-visible">
                        <input type="checkbox" class="select-all" onclick="selectall(this);" name="del" >
                    </th>
                    <th><a href="#">TRANSPORT NAME</a></th>
                    <th><a href="#">TRANSPORT ID</a></th>
                    <th><a href="#">VEHICLE NO</a></th>
                    <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(count($transports) > 0): ?>
                        <?php $__currentLoopData = $transports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td class="footable-first-visible"><input type="checkbox" name="transport_id[]" class="single-select" value="<?php echo e($transport->id); ?>"></td>
                    <td><?php echo e($transport->name); ?></td>
                    <td><?php echo e($transport->transport_id); ?></td>
                    <td><?php echo e($transport->vehicle_no); ?></td>
                    <td class="td-actions footable-last-visible">
                        <a href="javascript:;" class="btn btn-outline-primary" onclick="get_transport_by_id('<?php echo e($transport->id); ?>')"><i class="icon icon-pencil"></i>Edit</a>
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
<!-- Transport Create Modal  -->
<div class="modal right" id="addTransportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
  
    <div class="modal-content">
    
     
    <form action="<?php echo e(url('/transports')); ?>" method="POST" id="add-transport-form">
      <div class="modal-header">
      
        <h5 class="modal-title" id="addTranportLabel">Create New Transport</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary"> Save</button>
      </div>

      <div class="modal-body">
      <?php echo csrf_field(); ?>
        
        <div class="form-group row mb-3">
          <label for="" class="col-sm-3 col-form-label required">Transport Name </label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" placeholder="Enter Transport Name"  class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="" class="col-sm-3 col-form-label ">Transport ID</label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" class="form-control" aria-describedby="" placeholder="Enter Transport ID" name="transport_id" value="<?php echo e(old('transport_id')); ?>">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label ">Vehicle No</label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" class="form-control <?php $__errorArgs = ['vehicle_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Vehicle No" name="vehicle_no" value="<?php echo e(old('vehicle_no')); ?>">
                <?php $__errorArgs = ['vehicle_no'];
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
        </div>
        
    
      </div>
    </div>
    
    </form>
    
  </div>
</div>
<!-- End Transport Create Modal  -->

<!-- Transport update Modal  -->
<div class="modal right" id="editTransportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
  
    <div class="modal-content">
    
     
    <form action="javascript:;" method="POST" id="edit-transport-form">
    <?php echo csrf_field(); ?>
    <?php echo e(method_field('PATCH')); ?>

      <div class="modal-header">
      
        <h5 class="modal-title" id="editTranportLabel">update Transport</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary"> Update</button>
      </div>

      <div class="modal-body">
        <input type="hidden" name="id" class="id">
        <div class="form-group row mb-3">
          <label for="" class="col-sm-3 col-form-label required">Transport Name </label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" placeholder="Enter Transport Name"  class="form-control name <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="" class="col-sm-3 col-form-label ">Transport ID</label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" class="form-control transport_id"  aria-describedby=""
                        placeholder="Enter Transport ID" name="transport_id" value="<?php echo e(old('transport_id')); ?>">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label ">Vehicle No</label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" class="form-control vehicle_no <?php $__errorArgs = ['vehicle_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Vehicle No" name="vehicle_no" value="<?php echo e(old('vehicle_no')); ?>">
                <?php $__errorArgs = ['vehicle_no'];
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
        </div>
        
    
      </div>
    </div>
    
    </form>
    
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<!-- End Transport Update Modal  -->
<script>

    var product_datatable = $('#transport-datatable').DataTable();
    var editSelector = '#edit-transport-form';
    var addSelector = '#add-transport-form';

    $("#searchbox").keyup(function() {
        filterGlobal();
    }); 

    jQuery.validator.addMethod(
      "regex",
      function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
      },
      "Please check your input."
    );
    jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "Letters only please"); 

    function filterGlobal () {
        product_datatable.search(
            $('#searchbox').val(),
        ).draw();
    }

    function selectall(event){
        var ischecked = $('.select-all').is(':checked'); 
        if(ischecked == true){
            $('.single-select').prop('checked', 'checked');
            $('#multiDelete').removeClass('d-none');
        }else{
            $('.single-select').prop('checked', false);
            $('#multiDelete').addClass('d-none');
        }
    }

    $('.single-select').on('click',function(){
        var totalCheckboxes = $('.single-select').length;
        var numberOfChecked = $('.single-select:checked').length;
        if(numberOfChecked < totalCheckboxes){
            $('.select-all').prop('checked',false);
        }else{
            $('.select-all').prop('checked',true);
        }
        if(numberOfChecked > 0){
          $('#multiDelete').removeClass('d-none');
        }else{
          $('#multiDelete').addClass('d-none');
        }
    });

    // $('#multiDelete').on('click', function(e){
    //     $.ajax({
    //         url:base_url+'/transport/multidelete',
    //         method:'POST',
    //         data:$('#transport-records').serialize(),
    //         success:function(data){
    //             if (data == '1') {
    //                 swal.fire({
    //                     'title': 'Transport Deleted successfully',
    //                     'icon': 'success'
    //                 }).then(function() {
    //                     document.location.href = base_url+'/transports';
    //                 });
    //             } else {
    //                 swal.fire(data);
    //             }
    //         }
    //     });
    // });

    $('#multiDelete').on('click', function(e){
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
                        url:base_url+'/transport/multidelete',
                        method:'POST',
                        data:$('#transport-records').serialize(),
                        success:function(data){
                            if (data == '1') {
                                swal.fire({
                                    'title': 'Transport Deleted successfully',
                                    'icon': 'success'
                                }).then(function() {
                                    document.location.href = base_url+'/transports';
                                });
                            } else {
                                swal.fire(data);
                            }
                        }
                    });
                }
            })
         
        });


    function get_transport_by_id(transport_id){

        $.ajax({  
            type: "GET",  
            url: base_url+'/transportlist',  
            ContentType : 'application/json',
            dataType: 'json',
            data: {id:transport_id},
            success: function(response){
                
                if(response.status == 1){
                    var transport_data = response.data[0];
                    $(editSelector + ' .name').val(transport_data.name);
                    $(editSelector + ' .id').val(transport_data.id);
                    $(editSelector + ' .transport_id').val(transport_data.transport_id);
                    $(editSelector + ' .vehicle_no').val(transport_data.vehicle_no);
                    $('#editTransportModal').modal('show');

                    // console.log(response.data)
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

    $(editSelector).validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
              lettersonly:true,
            }
        },
        messages: {
          name: {
              required: 'Please enter Transport Name',
              lettersonly:'Name should be only characters'
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
           var transport_id = $(editSelector+' .id').val(); 
          $.ajax({  
            type: "POST",  
            url: base_url+'/transports/'+transport_id,  
            ContentType : 'application/json',
            dataType: 'json',
            data: $(editSelector).serialize(),
            success: function(response){
              if(response.status == 1){
                $('#editTransportModal').modal('hide');
                toastr.success(response.message);
                document.location.href = base_url + '/transports';
              }else{
                toastr.warning(response.message);
              }
            }
          });
        }
          //  form.submit();
         
        
    });


    $(addSelector).validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
              lettersonly:true,
            },
            vehicle_no:{
              regex:'^[A-Za-z\s]{2}[0-9\s]{1,2}[A-Za-z\s]{1,2}[0-9\s]{1,4}$'
            },
        },
        messages: {
          name: {
              required: 'Please enter Transport Name',
              lettersonly:'Name should be only characters'
          },
            vehicle_no:{
                regex:'Invalid Vehicle no'
            },

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
        //    var transport_id = $(editSelector+' .id').val(); 
            $(form)[0].submit();
        }
    });

    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Work\NewBilling\resources\views/transport/index.blade.php ENDPATH**/ ?>