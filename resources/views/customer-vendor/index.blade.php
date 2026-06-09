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
              <h4 class="mb-sm-0">Cusomer/Vendor</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Customer/Vendor</a></li>
                      {{-- <li class="breadcrumb-item active">Invoice</li> --}}
                  </ol>
              </div>

          </div>
      </div>
  </div>
    <div class="row pb-4 gy-3">
      <div class="col-sm-4">
          {{-- <a href="#" class="btn btn-primary addMembers-modal" data-toggle="modal" data-target="#exampleModal"><i class="las la-plus me-1"></i> Add Customer</a> --}}
          <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#AddCustomeroffcanvas" role="button" aria-controls="AddCustomeroffcanvas"><i class="las la-plus me-1"></i>Add Customer</a>      
      </div>

      <div class="col-sm-auto ms-auto">
         <div class="d-flex gap-3">
          <div class="search-box">
            <input type="text" value="" name="" maxlength="150" class="form-control" id="searchbox" placeholder="Search for customer or vendor name  "
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
    <div class="row">
      <div class="col-xl-3 col-md-6">
          <!-- card -->
          <div class="card">
              <div class="card-body">
                  <div class="d-flex align-items-center">
                      <div class="flex-grow-1">
                          <h4 class="fs-18 fw-semibold  ff-secondary mb-2">Total </h4>
                              <span class="text-success fs-14 mb-0 ms-1 counter-value" data-target="{{$total_customer}}">
                                  {{-- <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +89.24 % --}}
                              </span>
                      </div>
                  </div>
              </div><!-- end card body -->
          </div><!-- end card -->
      </div><!-- end col -->
      <div class="col-xl-3 col-md-6">
          <!-- card -->
          <div class="card">
              <div class="card-body">
                  <div class="d-flex align-items-center">
                      <div class="flex-grow-1">
                          <h4 class="fs-18 fw-semibold  ff-secondary mb-2">Customer </h4>
                              <span class="text-success fs-14 mb-0 ms-1 counter-value" data-target="559.25">
                                  {{-- <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +89.24 % --}}
                              </span>
                      </div>
                  </div>
              </div><!-- end card body -->
          </div><!-- end card -->
      </div><!-- end col -->
      <div class="col-xl-3 col-md-6">
          <!-- card -->
          <div class="card">
              <div class="card-body">
                  <div class="d-flex align-items-center">
                      <div class="flex-grow-1">
                          <h4 class="fs-18 fw-semibold  ff-secondary mb-2"> Vendor </h4>
                              <span class="text-success fs-14 mb-0 ms-1 counter-value" data-target="559.25">
                                  {{-- <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +89.24 % --}}
                              </span>
                      </div>
                  </div>
              </div><!-- end card body -->
          </div><!-- end card -->
      </div><!-- end col -->
      <div class="col-xl-3 col-md-6">
          <!-- card -->
          <div class="card">
              <div class="card-body">
                  <div class="d-flex align-items-center">
                      <div class="flex-grow-1">
                          <h4 class="fs-18 fw-semibold  ff-secondary mb-2">Customer Vendor</h4>
                              <span class="text-success fs-14 mb-0 ms-1 counter-value" data-target="559.25">
                                  {{-- <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +89.24 % --}}
                              </span>
                      </div>
                  </div>
              </div><!-- end card body -->
          </div><!-- end card -->
      </div><!-- end col -->


  </div>

    <div class="record-table custom-data-table mt-3 mb-3 bg-white py-3 px-3">
      <!-- <div class="table-responsive"> -->

        <form id="customer-records" action="javascript:;" method="post">

          @csrf

          <table class="table table-hover" id="customer_datatable" data-footable="" data-toggle-column="last"
            style="display: table;">

            <thead>

              <tr class="footable-header">

                <th class="chkbox footable-first-visible">

                  <input type="checkbox" class="select-all" onclick="selectall();" name="del">

                </th>

                <th><a href="#">Customer/Vendor Name</a></th>

                <th><a href="#">Outstanding payment</a></th>

                <th><a href="#">Contact Number</a></th>

                <th><a href="#">Company Type</a></th>

                <th><a href="#">State</a></th>

                <th>

                  <a href="#">Status</a>

                </th>

                <th class="footable-last-visible">
                  <a href="#">Action</a>
                </th>

              </tr>

            </thead>

            <tbody>

              @if(count($customers) > 0)

              @foreach($customers as $key => $customer)

              <tr>

                <td class="footable-first-visible">

                  <input type="checkbox" class="single-select" name="customer_id[]" value="{{$customer->id}}">

                </td>

                <td>{{$customer->name}}</td>

                <td>

                  <a href="#" class="company_total"> Get Total Balance </a>

                </td>

                <td>{{$customer->phone}}</td>

                <td>{{$customer->type}}</td>

                <td>{{$customer->state_name}}</td>

                <td class="td-actions">

                  <input data-id="{{$customer->id}}" class="toggle-class btn btn-outline-success" type="checkbox"
                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                    data-off="InActive" {{ $customer->status=='active' ? 'checked' : '' }}>



                  <!--a href="#" class="btn btn-outline-success">{{ $customer->status }}</a-->

                </td>

                <td class="td-actions footable-last-visible">

                  <a href="#EditCustomeroffcanvas" onclick="get_customer_by_id('{{$customer->id}}')" class="btn btn-outline-primary d-flex" data-bs-toggle="offcanvas" role="button" aria-controls="EditCustomeroffcanvas"
                    ><i class="las la-pen fs-18 align-middle me-2 text-muted"></i>Edit</a>
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

{{-- Offcanvas Add Customer Modal --}}
<div class="offcanvas offcanvas-end Customeroffcanvas" tabindex="-1" id="AddCustomeroffcanvas" aria-labelledby="AddCustomeroffcanvasLabel">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title text-capitalize" id="AddCustomeroffcanvas">Create Customer Vendor</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form action="{{ url('/customers') }}" method="POST" id="add-customer-form">
      <div class="modal-header mb-3">

        <h5 class="modal-title fw-bold fs-18" id="exampleModalLabel"> Customer Vendor</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
          <div class="d-flex justify-content-end gap-3">
            <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-sm btn-primary" > Save</button>
          </div>
      </div>

      <div class="modal-body">
      @csrf
        <div class="form-group row mt-2">
          <label for="registration_type" class="col-sm-3 col-form-label required fs-14 fw-normal">Type</label>
          <div class="col-sm-9">
            <div class="controls">
              <select class="form-select custom-select" id="companytype" name="type" onchange="toggleBanDetails()">
                <option value="customer" {{ old('type') =='customer'?'selected':''}}>Customer</option>
                <option value="vendor" {{ old('type') =='vendor'?'selected':''}}>Vendor</option>
                <option value="customer-vendor" {{ old('type') =='customer-vendor'?'selected':''}}>Customer/Vendor</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row mt-2">
          <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal">Name</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text"  name="name" id="name" maxlength="150" class="form-control"
                placeholder="Enter customer / vendor name" aria-required="true">
            </div>
          </div>
        </div>
        <div class="form-group row mt-2">
          <label for="" class="col-sm-3 col-form-label fs-14 fw-normal">Phone Number</label>
          <div class="col-sm-9">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">+91</div>
              </div>
              <input type="text" name="phone" id="phone" value="" class="form-control" placeholder="Your company phone no./Mobile no." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
            </div>
          </div>
        </div>
        <div class="form-group row mt-2 ">
          <label for="" class="col-sm-3 col-form-label fs-14 fw-normal">Address</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="address1" id="address1" placeholder="Full address"
              rows="4"></textarea>
          </div>
        </div>
        <div class="form-group row mt-2">
          <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal">Country</label>
          <div class="col-sm-9">
            <select class="form-select" id="country">
              <option selected="">India</option>
            </select>
          </div>
        </div>
        <div class="form-group row mt-2">
          <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal">State</label>
          <div class="col-sm-9">
            <select class="form-select custom-select @error('state_id') is-invalid @enderror" id="state_id" name="state_id" >
              <option value="">Select State</option>
              @foreach($states as $state)
                <option value="{{$state->id}}">{{$state->name}} ({{$state->state_code}})</option>
              @endforeach
            </select>
              @error('state_id')
              <span class="invalid-feedback">
                <strong>{{$message}}</strong>
              </span>
              @enderror
          </div>
        </div>

        <div class="form-group row mt-2">
          <label for="" class="col-sm-3 col-form-label required fs-14 fw-normal">Pin code</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="pincode" name="pincode"
              placeholder="Your postal pin code" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="6">
          </div>
        </div>
        <div class="row mt-2">
          <label for="" class="col-sm-3 col-form-label fs-14 fw-normal">Registration Type</label>
          <div class="col-sm-9">
            <select class=" form-select custom-select" aria-label=".form-select-sm " id="type" name="registration_type">
              <option value="0" selected="">Your Company Type</option>
              <option value="1">Proprietorship</option>
              <option value="2">Partnership</option>
              <option value="3">Hindu Undivided Family</option>
              <option value="4" >Private Limited Company</option>
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
        <div class="form-group row mt-2">
          <label for="" class="col-sm-3 col-form-label fs-14 fw-normal">PAN no.</label>
          <div class="col-sm-9">
            <input type="text" name="pan" id="pan_number" value="" class="form-control text-uppercase"
              placeholder="PAN number of the business or personal if propietor" maxlength="10"
              oninput="if (this.value.length >= 10) ValidatePAN()"
              >
              <span id="lblPANCard" class="text-danger" style="visibility:hidden;">Invalid PAN Number</span>
          </div>
        </div>
        <div class="form-group row mt-2">
          <label for="" class="col-sm-3 col-form-label fs-14 fw-normal">GSTIN</label>
          <div class="col-sm-9">
            <input type="phone" class="form-control text-uppercase" id="gstin" name="gstin"
              placeholder="Enter GSTIN (If available)" maxlength="15"
              {{-- onkeypress="ValidateGST()"  --}}
              oninput="if (this.value.length >= 10) ValidateGST()"
              >
              <input type="hidden" name="" value="{{$state->state_code}}">
              <span id="lblGST" class="text-danger" style="visibility:hidden;">Invalid GST Number</span>

          </div>
        </div>

        <div class="form-group row mt-2">
          <label class="col-sm-3 col-form-label fs-14 fw-normal">Shipping Addr.</label>
          <div class="col-sm-9">
            <div class="controls mt-2">
              <label><input type="checkbox" name="same_shipping" value="1" checked="" id="is_same_shipping"> Use Same
                Shipping Address</label>
            </div>
          </div>
        </div>
        <div class="additional-info d-none">
          <h5 class="border-top py-3 my-3 subheading text-capitalize">additional shipping details</h5>
          <div class="row mt-2">
            <label for="Shipping Name" class="col-sm-3 col-form-label fs-14 fw-normal ">Shipping Name</label>
            <div class="col-9">
              <input type="text" value="" name="shipping_name" id="shipping_name" class="form-control"
                placeholder="Enter shipping Name">
            </div>
          </div>
          <div class="row mt-2">
            <label for="Shipping Phone" class="col-sm-3 col-form-label fs-14 fw-normal">Shipping Phone</label>
            <div class="col-9">
              <input type="text" value="" name="shipping_phone" id="ship_phone" class="form-control"
                placeholder="Enter shipping phone No." maxlength="20">
            </div>
          </div>
          <div class="row mt-2">
            <label for="Shipping Address" class="col-sm-3 col-form-label fs-14 fw-normal">Shipping Address</label>
            <div class="col-9">
              <textarea name="shipping_address" id="shipping_address" class="form-control"
                placeholder="Enter shipping address"></textarea>
            </div>
          </div>
          <div class="row mt-2">
            <label for="Shipping State" class="col-sm-3 col-form-label fs-14 fw-normal">Shipping State</label>
            <div class="col-9">
              <select type="list" data-value="" name="shipping_state_id" class="form-select" id="listBox2">
                <option value="">Select State</option>
                @foreach($states as $state)
                <option value="{{$state->id}}">{{$state->name}} ({{$state->state_code}})</option>
              @endforeach
              </select>
            </div>
          </div>

          <div class="row mt-2">
            <label for="PAN" class="col-sm-3 col-form-label fs-14 fw-normal">Shipping PAN</label>
            <div class="col-9">
              <input type="text" value="" name="shipping_pan" id="shipping_pan" class="form-control"
                placeholder="Enter shipping  PAN" maxlength="20">
            </div>
          </div>
          <div class="row mt-2">
            <label for="Shipping GSTIN " class="col-sm-3 col-form-label fs-14 fw-normal">Shipping GSTIN</label>
            <div class="col-9">
              <input type="text" value="" name="shipping_gstin" id="ship_gstno" class="form-control"
                placeholder="Enter shipping GSTIN " maxlength="20">
            </div>
          </div>
        </div>

        <div class="row border-bottom mt-3">
          <h4 class="fw-bold fs-18" >Opening Balance </h4>
        </div>
        <div class="row border-bottom mt-2 pb-3">
            <label class="col-sm-3 col-form-label fw-normal fs-14">Customer Balance</label>
            <div class="col-sm-9">
              <div class="controls mt-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="opening_balance_type" id="credit" value="credit" >
                    <label class="fs-14 fw-normal text-capitalize">credit</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="opening_balance_type" id="debit" value="debit">
                      <label class="fs-14 fw-normal text-capitalize"> debit </label>
                  </div>
              </div>
            </div>
            {{-- Amount --}}
            <label class="col-sm-3 col-form-label fw-normal fs-14">Amount</label>
            <div class="col-sm-9">
              <div class="controls mt-2">
                    <input type="text" name="opening_amount" class="form-control">
              </div>
            </div>
        </div>

        <div class="form-group row border-bottom vendor-bank-details" id="vendor-bank-details">
            <div class="mt-3 d-flex">
                <label class="col-sm-3 col-form-label">Bank Name </label>
                <div class="col-sm-9">
                  <div class="controls mt-2">
                        <input type="text" name="bank_name" class="form-control">
                  </div>
                </div>
            </div>
            <div class="mt-3 d-flex">
                <label class="col-sm-3 col-form-label">Bank IFSC Code</label>
                <div class="col-sm-9">
                  <div class="controls mt-2">
                        <input type="text" name="bank_ifsc" class="form-control">
                  </div>
                </div>
            </div>
            <div class="mt-3 d-flex">
                <label class="col-sm-3 col-form-label">Bank Account Number</label>
                <div class="col-sm-9">
                  <div class="controls mt-2">
                        <input type="text" name="bank_account_number" class="form-control">
                  </div>
                </div>
            </div>
            <div class="mt-3 d-flex">
                <label class="col-sm-3 col-form-label">Bank Branch Name</label>
                <div class="col-sm-9">
                  <div class="controls mt-2">
                        <input type="text" name="bank_branch" class="form-control">
                  </div>
                </div>
            </div>
        </div>



      </div>
    </div>

    </form>
  </div>
</div>


{{-- Offcanvas Edit mMdal --}}
<div class="offcanvas offcanvas-end Customeroffcanvas" tabindex="-1" id="EditCustomeroffcanvas" aria-labelledby="EditCustomeroffcanvasLabel">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title text-capitalize" id="offcanvasRightLabel">Update Customer Vendor</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form action="javascript:;" method="POST" id="update-customer-form">
      @csrf
      {{ method_field('PATCH') }}
      <input type="hidden" name="customer_id" id="customer_id" >
      <input type="hidden" name="address_id" id="address_id" >
      <div class="modal-header mb-3">

        <h5 class="modal-title" id="editCustomerModallabel">Customer Vendor</h5>

        <div class="d-flex justify-content-end gap-3">
          <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-sm btn-primary"> Update</button>
  
        </div>
      </div>

      <div class="modal-body">
      @csrf
        <div class="form-group row mt-2 ">
          <label for="registration_type" class="col-sm-3 col-form-label required fw-normal fs-14">Type</label>
          <div class="col-sm-9">
            <div class="controls">
              <select class="form-select custom-select" id="edit_companytype" name="type" onchange="toggleEditBanDetails()">
                <option value="customer" {{ old('type') =='customer'?'selected':''}}>Customer</option>
                <option value="vendor" {{ old('type') =='vendor'?'selected':''}}>Vendor</option>
                <option value="customer-vendor" {{ old('type') =='customer-vendor'?'selected':''}}>Customer/Vendor</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row mt-2">
          <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">Name</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text"  name="name" id="edit_name" maxlength="150" class="form-control"
                placeholder="Enter customer / vendor name" aria-required="true">
            </div>
          </div>
        </div>
        <div class="form-group row mb-3 mt-2">
          <label for="" class="col-sm-3 col-form-label fw-normal fs-14">Phone Number</label>
          <div class="col-sm-9">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">+91</div>
              </div>
              <input type="number" name="edit_phone" id="edit_phone" value="" class="form-control"
                placeholder="Your company phone no./Mobile no.">
            </div>
          </div>
        </div>
        <div class="form-group row mt-2">
          <label for="" class="col-sm-3 col-form-label fw-normal fs-14">Address</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="address1" id="edit_address1" placeholder="Full address"
              rows="4"></textarea>
          </div>
        </div>
        <div class="form-group row mt-2">
          <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">Country</label>
          <div class="col-sm-9">
            <select class="form-select text-capitalize" >
              <option selected="" id="edit_country">India</option>
            </select>
          </div>
        </div>
        <div class="form-group row mt-2">
          <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">State</label>
          <div class="col-sm-9">
            <select class="form-control custom-select @error('state_id') is-invalid @enderror" id="edit_state_id" name="state_id" >
              <option value="">Select State</option>
              @foreach($states as $state)
                <option value="{{$state->id}}">{{$state->name}} ({{$state->state_code}})</option>
              @endforeach
            </select>
              @error('state_id')
              <span class="invalid-feedback">
                <strong>{{$message}}</strong>
              </span>
              @enderror
          </div>
        </div>

        <div class="form-group row mt-2">
          <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">Pin code</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="edit_pincode" name="pincode"
              placeholder="Your postal pin code">
          </div>
        </div>
        <div class="form-group row mt-2">
          <label for="" class="col-sm-3 col-form-label fw-normal fs-14">Registration Type</label>
          <div class="col-sm-9">
            <select class=" form-select mb-3 custom-select fw-normal fs-15" aria-label=".form-select-sm" id="edit_registration_type" name="registration_type">
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
        <div class="form-group row mt-2 ">
          <label for="" class="col-sm-3 col-form-label fw-normal fs-14">PAN no.</label>
          <div class="col-sm-9">
            <input type="text" name="pan" id="edit_pan_number" value="" class="form-control"
              placeholder="PAN number of the business or personal if propietor">
          </div>
        </div>
        <div class="form-group row mt-2">
          <label for="" class="col-sm-3 col-form-label fw-normal fs-14">GSTIN</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="edit_gstin" name="gstin"
              placeholder="Enter GSTIN (If available)">
          </div>
        </div>
        <div class="form-group row mt-2">
          <label class="col-sm-3 col-form-label fw-normal fs-14">Shipping Address</label>
          <div class="col-sm-9">
            <div class="controls mt-2">
              <label><input type="checkbox" name="same_shipping" value="1" checked="" id="edit_is_same_shipping"> Use Same
                Shipping Address</label>
            </div>
          </div>
        </div>
        <div class="edit_additional-info d-none">
          <h5 class="border-top border-bottom py-3 my-3 subheading fw-bold fs-18">Additional Shipping Address</h5>
          <div class="row mt-2">
            <label for="Shipping Name" class="col-3 col-form-label fs-14 fw-normal">Shipping Name</label>
            <div class="col-9">
              <input type="text" value="" name="shipping_name" id="edit_shipping_name" class="form-control"
                placeholder="Enter shipping Name">
            </div>
          </div>
          <div class="row mt-2">
            <label for="Shipping Phone" class="col-3 col-form-label fs-14 fw-normal">Shipping Phone</label>
            <div class="col-9">
              <input type="text" value="" name="shipping_phone" id="edit_ship_phone" class="form-control"
                placeholder="Enter shipping phone No." maxlength="20">
            </div>
          </div>
          <div class="row mt-2">
            <label for="Shipping Address" class="col-3 col-form-label fs-14 fw-normal">Shipping Address</label>
            <div class="col-9">
              <textarea name="shipping_address" id="edit_shipping_address" class="form-control"
                placeholder="Enter shipping address"></textarea>
            </div>
          </div>
          <div class="row mt-2">
            <label for="Shipping State" class="col-3 col-form-label fs-14 fw-normal">Shipping State</label>
            <div class="col-9">
              <select type="list" data-value="" name="shipping_state_id" class="form-control" id="edit_ship_state">
                <option value="">Select State</option>
                @foreach($states as $state)
                <option value="{{$state->id}}">{{$state->name}} ({{$state->state_code}})</option>
              @endforeach
              </select>
            </div>
          </div>
          <div class="row mt-2">
            <label for="PAN" class="col-3 col-form-label fs-14 fw-normal">SHIP PAN</label>
            <div class="col-9">
              <input type="text" value="" name="shipping_pan" id="edit_shipping_pan" class="form-control"
                placeholder="Enter shipping  PAN" maxlength="20">
            </div>
          </div>
          <div class="row mt-2">
            <label for="Shipping GSTIN " class="col-3 col-form-label fs-14 fw-normal">Shipping GSTIN</label>
            <div class="col-9">
              <input type="text" value="" name="shipping_gstin" id="edit_ship_gstno" class="form-control"
                placeholder="Enter shipping GSTIN " maxlength="20">
            </div>
          </div>
        </div>

        {{-- Opening Balance  --}}
        <div class="row border-bottom mt-3">
          <h4 class="fw-bold fs-18" style="font-size:14px">Opening Balance </h4>
        </div>
        <div class="row border-bottom mt-2 pb-3">
            <label class="col-sm-3 col-form-label fw-normal fs-14">Customer Balance</label>
            <div class="col-sm-9">
              <div class="controls mt-2">
                {{-- <label>
                    <input type="radio" class="btn-check" name="opening_balance_type" id="credit" value="credit" autocomplete="off" >
                    <label  style="margin-right: 5px;border-radius: 0px;" for="credit">Credit</label>

                    <input type="radio" class="btn-check" name="opening_balance_type" id="debit" value="debit" autocomplete="off">
                    <label style="margin-right: 5px;border-radius: 0px;" for="debit">Debit</label>

                </label> --}}
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="opening_balance_type" id="credit" value="credit">
                    <Label class="fw-normal fs-14">Credit</Label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="opening_balance_type" id="debit" value="debit">
                    <Label class="fw-normal fs-14">Debit</Label>
                </div>
              </div>
            </div>
            {{-- Amount --}}
            <label class="col-3 col-form-label fs-14 fw-normal">Amount</label>
            <div class="col-sm-9">
              <div class="controls mt-2">
                    <input type="text" name="opening_amount" class="form-control">
              </div>
            </div>
        </div>

        {{-- vendor Bank Details --}}

        <div class="form-group row border-bottom update-vendor-bank-details" id="update-vendor-bank-details">
          <div class="mt-3 d-flex">
              <label class="col-sm-3 col-form-label">Bank Name </label>
              <div class="col-sm-9">
                <div class="controls mt-2">
                      <input type="text" name="bank_name" class="form-control">
                </div>
              </div>
          </div>
          <div class="mt-3 d-flex">
              <label class="col-sm-3 col-form-label">Bank IFSC Code</label>
              <div class="col-sm-9">
                <div class="controls mt-2">
                      <input type="text" name="bank_ifsc" class="form-control">
                </div>
              </div>
          </div>
          <div class="mt-3 d-flex">
              <label class="col-sm-3 col-form-label">Bank Account Number</label>
              <div class="col-sm-9">
                <div class="controls mt-2">
                      <input type="text" name="bank_account_number" class="form-control">
                </div>
              </div>
          </div>
          <div class="mt-3 d-flex">
              <label class="col-sm-3 col-form-label">Bank Branch Name</label>
              <div class="col-sm-9">
                <div class="controls mt-2">
                      <input type="text" name="bank_branch" class="form-control">
                </div>
              </div>
          </div>
      </div>

      </div>
    </div>

    </form>
  </div>
</div>




<!-- End Customer Modal -->
</div>
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
              required:true,
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
            required: 'Please enter phone number',
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
            // alert(data.message);
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

        // console.log(customer_data);

        $('#customer_id').val(customer_data.id);
        $('#address_id').val(customer_data.address_id);
        $('#edit_companytype').val(customer_data.type);
        $('#edit_name').val(customer_data.name);
        $('#edit_phone').val(customer_data.phone);
        $('#edit_address1').val(customer_data.address1);
        $('#edit_country').html('india');
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
            @foreach ($states as $state)
                [ "{{$state->state_code}}" ],
            @endforeach
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


// Bank-details

function toggleBanDetails() {
            var companyTypeSelect = document.getElementById("companytype");
            var banDetailsDiv = document.getElementById("vendor-bank-details");

            if (companyTypeSelect.value === "customer") {
                banDetailsDiv.style.display = "none";
            } else {
                banDetailsDiv.style.display = "block";
            }
        }

toggleBanDetails();

//Edit Bank-details

function toggleEditBanDetails() {
            var companyTypeSelect = document.getElementById("edit_companytype");
            var banDetailsDiv = document.getElementById("update-vendor-bank-details");

            if (companyTypeSelect.value === "customer") {
                banDetailsDiv.style.display = "none";
            } else {
                banDetailsDiv.style.display = "block";
            }
        }

toggleEditBanDetails();




</script>



@endsection
