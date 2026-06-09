@extends('layouts.customer')

@section('content')

<div class="page-content">
  
  <div class="top-stickybar">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Expense</h4>
  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">/Expenses</a></li>
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
            <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#AddExpenseoffcanvas" role="button" aria-controls="AddExpenseoffcanvas"><i class="las la-plus me-1"></i>Add Expense</a>      
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
                    <th><a href="#">Date</a></th>
                    <th><a href="#">Expense </a></th>
                    <th><a href="#">Additional Note</a></th>
                    <th><a href="#">Amount</a></th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @if(count($expenses) > 0)
                      @foreach ($expenses as $expense)
                        <tr>
                        <td class="footable-first-visible"><input type="checkbox" name="transport_id[]" class="single-select" value="{{$expense->id}}"></td>
                        <td>{{$expense->date}}</td>
                        <td>{{$expense->title}}</td>
                        <td>{{$expense->additional_note}}</td>
                        <td>{{$expense->amount}}</td>
                        <td class="td-actions footable-last-visible">
                          <a href="#UpdateExpenseoffcanvas{{$expense->id}}" class="btn btn-outline-primary" data-bs-target="#UpdateExpenseoffcanvas{{$expense->id}}" data-bs-toggle="offcanvas" role="button" aria-controls="UpdateTransportoffcanvas"><i class="las la-pen fs-18 align-middle me-2 text-muted"></i>Edit</a>
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

{{-- Add Expense Offcanva --}}
<div class="offcanvas offcanvas-end Productroffcanvas" tabindex="-1" id="AddExpenseoffcanvas" aria-labelledby="AddExpenseoffcanvasLabel">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title text-capitalize" id="AddExpenseoffcanvasLabel">Expense</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">

    <form action="{{url ('expenses/store')}}" method="POST">
      <div class="modal-header mb-4">
        
        <h5 class="modal-title" id="addTranportLabel">Add Expense</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
          <div class="d-flex justify-content-end gap-3">
            <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
  
          </div>
        </div>
      @csrf
        <div class="row mb-3">
          <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal">Date </label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="date" placeholder="Enter Transport Name"  class="form-control @error('date') is-invalid @enderror" name="expense_date" id="date" value="{{ old('date') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal">Expense Tittle </label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" placeholder="Enter Transport Name"  class="form-control @error('expense_title') is-invalid @enderror" name="expense_title" id="title" value="{{ old('expense_title') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal">Additional Note </label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" placeholder="Enter Transport Name"  class="form-control @error('expense_note') is-invalid @enderror" name="expense_note" id="note" value="{{ old('expense_note') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal">Amount </label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" placeholder="Enter Transport Name"  class="form-control @error('expense_amount') is-invalid @enderror" name="expense_amount" id="amount" value="{{ old('expense_amount') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
        </div>
    </form>

  </div>
</div>


{{-- Edit Expense --}}
@foreach ($expenses as $expense)
<div class="offcanvas offcanvas-end Productroffcanvas" tabindex="-1" id="UpdateExpenseoffcanvas{{$expense->id}}" aria-labelledby="UpdateExpenseoffcanvasLabel">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title text-capitalize" id="UpdateExpenseoffcanvasLable">Expense</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">

    <form action="{{url ('expenses/update',$expense->id)}}" method="POST">
      <div class="modal-header mb-4">
        
        <h5 class="modal-title" id="addTranportLabel">Add Expense</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
          <div class="d-flex justify-content-end gap-3">
            <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
  
          </div>
        </div>
      @csrf
        <div class="row mb-3">
          <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal">Date </label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="date" placeholder="Enter Transport Name"  class="form-control @error('date') is-invalid @enderror" name="expense_date" id="date" value="{{$expense->date}}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal">Expense Tittle </label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" placeholder="Enter Transport Name"  class="form-control @error('expense_title') is-invalid @enderror" name="expense_title" id="title" value="{{$expense->title}}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal">Additional Note </label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" placeholder="Enter Transport Name"  class="form-control @error('expense_note') is-invalid @enderror" name="expense_note" id="note" value="{{$expense->additional_note}}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal">Amount </label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" placeholder="Enter Transport Name"  class="form-control @error('expense_amount') is-invalid @enderror" name="expense_amount" id="amount" value="{{ $expense->amount }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
        </div>
    </form>

  </div>

</div>

@endforeach


</div>

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
