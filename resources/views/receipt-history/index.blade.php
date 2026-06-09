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
              <h4 class="mb-sm-0">Payment History</h4>

              <div class="page-title-right">
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
                    <th><a href="#">Receipt No</a></th>
                    <th><a href="#">Invoice No</a></th>
                    <th><a href="#">Company Name</a></th>
                    <th><a href="#">Amount</a></th>
                    <th><a href="#">Payment Date</a></th>
                    <th><a href="#">Notes</a></th>
                    <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                  @if(count($payments)>0)
                      @foreach($payments as $receipt)
                        <tr>
                          <td class="footable-first-visible"><input type="checkbox" name="reciept_id[]" class="single-select" value="{{$receipt->id}}"></td>
                          <td>{{$receipt->receipt_no}}</td>
                          <td>{{$receipt->invoice_no}}</td>
                          <td>{{$receipt->name}}</td>
                          <td>{{ $receipt->amount}}</td>
                          <td>{{\Carbon\Carbon::now()->toDateString($receipt->payment_date,'d M,Y')}}</td>
                          <td>{{ $receipt->payment_note}}</td>
                          <td class="td-actions footable-last-visible">
                            {{-- <a href="#UpdateTransportoffcanvas" onclick="get_transport_by_id('{{$transport->id}}')" class="btn btn-outline-primary" data-bs-toggle="offcanvas" role="button" aria-controls="UpdateTransportoffcanvas"><i class="las la-pen fs-18 align-middle me-2 text-muted"></i>Edit</a> --}}
                            <a href="{{url('print-purchase-inward')}}?id={{$receipt->id}}" class="btn btn-info print-btn" target="_blank" data-link="{{url('print-purchase-inward')}}?id={{$receipt->id}}" data-id="{{$receipt->id}}" >Print</a>

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