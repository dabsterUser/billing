@extends('layouts.customer')

@section('content')
<style>
.dataTables_filter{
  display: none;
}
</style>


<div class="page-content">

<div class="top-stickybar">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Transport</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">/Transports</a></li>
                      {{-- <li class="breadcrumb-item active">Invoice</li> --}}
                      <a href="javascript:;" id="multiDelete" class="btn btn-danger mr-2 d-none">Remove</a>                    
                  </ol>
              </div>
          </div>
      </div>
    </div>

    <div class="row pb-4 gy-3">
      <div class="col-sm-4">
          {{-- <a href="#" class="btn btn-primary addMembers-modal" data-toggle="modal" data-target="#exampleModal"><i class="las la-plus me-1"></i> Add Customer</a> --}}
          <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#AddTransportoffcanvas" role="button" aria-controls="AddTransportoffcanvas"><i class="las la-plus me-1"></i>Add Transport</a>      
      </div>
      

      <div class="col-sm-auto ms-auto">
         <div class="d-flex gap-3">
          <div class="search-box">
            <input type="text" value="" name="" maxlength="150" class="form-control" id="searchbox" placeholder="Search for products..."
            required="" aria-required="true">
              {{-- <input type="text" class="form-control" placeholder="Search for name or designation..."> --}}
              <i class="las la-search search-icon"></i>
          </div>
          <div class="">
              <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-soft-info btn-icon fs-14"><i class="las la-ellipsis-v fs-18"></i></button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                  <li><a class="dropdown-item" href="#">Print</a></li>
                  <li><a class="dropdown-item" href="#">Export to Excel</a></li>
              </ul>
          </div>
         </div>
      </div>
  </div>
  </div>
</div>
<div class="container-fluid main-container">
  <div class="main-form-container">
    <!-- Listing product -->
    <div class="record-table custom-data-table mt-3 mb-3 bg-white py-3 px-3">
      <!-- <div class="table-responsive"> -->
      <form method="post" id="transport-records">
            @csrf
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
                @if(count($transports) > 0)
                        @foreach($transports as $key => $transport)
                    <tr>
                    <td class="footable-first-visible"><input type="checkbox" name="transport_id[]" class="single-select" value="{{$transport->id}}"></td>
                    <td>{{$transport->name}}</td>
                    <td>{{$transport->transport_id}}</td>
                    <td>{{$transport->vehicle_no}}</td>
                    <td class="td-actions footable-last-visible">
                      <a href="#UpdateTransportoffcanvas" onclick="get_transport_by_id('{{$transport->id}}')" class="btn btn-outline-primary" data-bs-toggle="offcanvas" role="button" aria-controls="UpdateTransportoffcanvas"><i class="las la-pen fs-18 align-middle me-2 text-muted"></i>Edit</a>
                     </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody><!-- /tbody -->
                </table>
                </form>
      <!-- </div> -->
    </div>
  </div>
</div>
</div>
<!-- Transport Create Modal  -->
<div class="offcanvas offcanvas-end Productroffcanvas" tabindex="-1" id="AddTransportoffcanvas" aria-labelledby="AddTransportoffcanvasLabel">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title text-capitalize" id="AddTransportoffcanvasLabel">Create Transport</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">

    <form action="{{ url('/transports') }}" method="POST" id="add-transport-form">
        <div class="modal-header mb-4">
        
          <h5 class="modal-title" id="addTranportLabel">Create New Transport</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->

            <div class="d-flex justify-content-end gap-3">
              <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-sm btn-primary"> Save</button>
    
            </div>
        </div>

        <div class="modal-body">
        @csrf
          
          <div class="row mb-3">
            <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal">Transport Name </label>
            <div class="col-sm-9">
              <div class="controls">
                  <input type="text" placeholder="Enter Transport Name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal ">Transport ID</label>
            <div class="col-sm-9">
              <div class="controls">
                  <input type="text" class="form-control" aria-describedby="" placeholder="Enter Transport ID" name="transport_id" value="{{ old('transport_id') }}">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal ">Vehicle No</label>
            <div class="col-sm-9">
              <div class="controls">
                  <input type="text" class="form-control @error('vehicle_no') is-invalid @enderror" placeholder="Enter Vehicle No" name="vehicle_no" value="{{ old('vehicle_no') }}">
                  @error('vehicle_no')
                      <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                      </span>
                  @enderror
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
<div class="offcanvas offcanvas-end Productroffcanvas" tabindex="-1" id="UpdateTransportoffcanvas" aria-labelledby="UpdateTransportoffcanvasLabel">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title text-capitalize" id="UpdateTransportoffcanvasLabel">Create Transport</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form action="javascript:;" method="POST" id="edit-transport-form">
      @csrf
      {{ method_field('PATCH') }}
        <div class="modal-header mb-3">
        
          <h5 class="modal-title text-capitalize" id="editTranportLabel">update Transport</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
            <div class="d-flex justify-content-end gap-3">
              <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-sm btn-primary"> Update</button>    
            </div>
        </div>
  
        <div class="modal-body">
          <input type="hidden" name="id" class="id">
          <div class="form-group row mb-3">
            <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal">Transport Name </label>
            <div class="col-sm-9">
              <div class="controls">
                  <input type="text" placeholder="Enter Transport Name"  class="form-control name @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal ">Transport ID</label>
            <div class="col-sm-9">
              <div class="controls">
                  <input type="text" class="form-control transport_id"  aria-describedby=""
                          placeholder="Enter Transport ID" name="transport_id" value="{{ old('transport_id') }}">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal ">Vehicle No</label>
            <div class="col-sm-9">
              <div class="controls">
                  <input type="text" class="form-control vehicle_no @error('vehicle_no') is-invalid @enderror" placeholder="Enter Vehicle No" name="vehicle_no" value="{{ old('vehicle_no') }}">
                  @error('vehicle_no')
                      <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                      </span>
                  @enderror
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
@endsection