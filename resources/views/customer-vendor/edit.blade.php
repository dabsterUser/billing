@extends('layouts.customer')

@section('content')
<div class="container-fluid">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">Customers</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="icon icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{url('/customers')}}">Customers</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Edit Customer / Vendor</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5>Add Customer / Vendor</h5>
            </div>
            <div class="card-body">

              <form action="{{ url('/customers/'.$customer->id) }}" method="post" id="edit-customer-form">
              @csrf
              {{ method_field('PATCH') }}
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Customer / Vendor Name *</label>
                      <input type="text" class="form-control text-capitalize" id="" name="name"
                        placeholder="Enter Customer / Vendor Name *" value="{{$customer->name}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Contact Person</label>
                      <input type="text" class="form-control text-capitalize" id="" aria-describedby=""
                        placeholder="Enter Contact Person" name="person_name" value="{{$customer->person_name}}" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Contact No</label>
                      <input type="number" class="form-control" id="" aria-describedby=""
                        placeholder="Enter Contact No" name="phone" value="{{$customer->phone}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Address" class="">Address Line 1*</label>
                      <div class="controls">
                        <input type="text"  name="address1" maxlength="100" id="txtaddress" class="form-control"
                          placeholder="Enter address line 1" required="" aria-required="true" value="{{$customer->address1}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Address" class="">Address Line 2</label>
                      <div class="controls">
                        <input type="text"  name="address2" maxlength="100" id="txtaddress2"
                          class="form-control" placeholder="Enter address line 2" value="{{$customer->address2}}">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="PinCode" class="">PinCode*</label>
                      <div class="controls">
                        <input type="text"  name="pincode" id="txtpincode" class="form-control"
                          placeholder="Enter your pincode" maxlength="20" required="" aria-required="true" value="{{$customer->pincode}}" >
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">State</label>
                      <select class="form-control" id="" name="state_id">
                        <option value="">Select State</option>
                        @foreach($states as $state)
                        <option value="{{$state->id}}" {{ $state->id == $customer->state_id ? 'selected':'' }} >{{$state->name}} ({{$state->state_code}})</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">CIty*</label>
                      <div class="controls">
                        <input type="text" id=""  class="form-control" name="city"
                          placeholder="Enter your " maxlength="50" required="" aria-required="true" value="{{$customer->city}}">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Company Type</label>
                      <select class="form-control" id="companytype" name="type">
                        <option value="customer" {{ $customer->type == 'customer' ? 'selected':'' }} >Customer</option>
                        <option value="vendor" {{ $customer->type == 'vendor' ? 'selected':'' }}>Vendor</option>
                        <option value="customer-vendor" {{ $customer->type == 'customer-vendor' ? 'selected':'' }}>Customer/Vendor</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 vendordetail {{ $customer->type !='customer'?'':'d-none'}}">
                    <div class="form-group">
                      <label for="" class="">Bank Name</label>
                      <div class="controls">
                        <input type="text"  name="bank_name"  value="{{$customer->bank_name}}" class="form-control"
                          placeholder="Enter bank name" >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 vendordetail {{ $customer->type !='customer'?'':'d-none'}}">
                    <div class="form-group">
                      <label for="" class="">Bank IFSC</label>
                      <div class="controls">
                        <input type="text"  name="bank_ifsc" id="bank_ifsc"  value="{{$customer->bank_ifsc}}" class="form-control"
                          placeholder="Enter IFSC Code" >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 vendordetail {{ $customer->type !='customer'?'':'d-none'}}">
                    <div class="form-group">
                      <label for="" class="">Bank Account Number</label>
                      <div class="controls">
                        <input type="number" value="{{$customer->bank_account_number}}" name="bank_account_number" id="" class="form-control"
                          placeholder="Enter account Number" >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Fax No</label>
                      <div class="controls">
                        <input type="number"  name="fax" id="" class="form-control"
                          placeholder="Enter your Fax No" maxlength="50" value="{{$customer->fax}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Website</label>
                      <div class="controls">
                        <input type="text"  name="website"  class="form-control"
                          placeholder="Enter URL" maxlength="50" value="{{$customer->website}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Email </label>
                      <div class="controls">
                        <input type="email"  name="email"  class="form-control"
                          placeholder="Enter Email Address" maxlength="50" value="{{$customer->email}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Registration Type *</label>
                      <select class="form-control" id="" name="registration_type">
                        <option value="Regular"  {{ $customer->registration_type == 'Regular' ? 'selected':'' }} >Regular</option>
													<option value="Regular-UIN"  {{ $customer->registration_type == 'Regular-UIN' ? 'selected':'' }} >Regular-Embassy/UN Body</option>
													<option value="Regular-SEZ"  {{ $customer->registration_type == 'Regular-SEZ' ? 'selected':'' }} >Regular-SEZ</option>
													<option value="Composition"  {{ $customer->registration_type == 'Composition' ? 'selected':'' }} >Composition</option>
													<option value="Consumer"  {{ $customer->registration_type == 'Consumer' ? 'selected':'' }} >Consumer</option>
													<option value="Unregistered"  {{ $customer->registration_type == 'Unregistered' ? 'selected':'' }} >Unregistered</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">GSTIN / PAN</label>
                      <div class="controls">
                        <input type="text"  name="gstin_pan" id="" class="form-control"
                          placeholder="Enter GSTIN / PAN" maxlength="50" value="{{$customer->gstin_pan}}">
                      </div>
                    </div>

                  </div>
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Update GSTIN ?</label>
                      <div class="controls">
                        <label><input type="checkbox" name="" value="1" id=""> Update above GST
                          number on
                          all
                          previous invoices.</label>
                      </div>
                    </div>

                  </div> -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Distance for e-way bill (in km)</label>
                      <div class="controls">
                        <input type="text"  name="eway_distance" id="" class="form-control"
                          placeholder="Enter Distance for e-way bill (in km)" maxlength="50" value="{{$customer->eway_distance}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">License No.</label>
                      <div class="controls">
                        <input type="text"  name="license_no" id="" class="form-control"
                          placeholder="Enter License No." maxlength="50" value="{{$customer->license_no}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Due Days <small class="text-muted">(Note : Use "" to use Default due date from settings, Set numeric value for Days from invoice date.)</small></label>
                      <div class="controls">
                        <input type="number"  name="due_days" id="" class="form-control"
                          placeholder="Enter Due Days" maxlength="50" value="{{$customer->due_days}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-12"><h5 class="border-top border-bottom py-3 my-3">Additional Shipping Address</h5></div>
                  <hr>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">SHIP. Contact Person</label>
                      <input type="text" class="form-control" name="shipping_name" id="" aria-describedby="" placeholder="Enter SHIP. Contact Person" value="{{$customer->shipping_name}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">SHIP. Contact No</label>
                      <input type="number" class="form-control" name="shipping_phone" id="" aria-describedby=""
                        placeholder="Enter SHIP. Contact No" value="{{$customer->shipping_phone}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Address" class="">SHIP. Address</label>
                      <div class="controls">
                        <input type="text"  name="shipping_address" maxlength="100" id="txtaddress" class="form-control"
                          placeholder="Enter address line 1" aria-required="true" value="{{$customer->shipping_address}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">SHIP. State</label>
                      <select class="form-control" id="" name="shipping_state_id">
                        <option value="">Select State</option>
                        @foreach($states as $state)
                        <option value="{{$state->id}}" {{ $state->id == $customer->shipping_state_id ? 'selected':'' }} >{{$state->name}} ({{$state->state_code}})</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">SHIP. Country</label>
                      <input type="text"  name="shipping_country" maxlength="100" id="txtaddress" class="form-control"
                          placeholder="Enter address line 1"  aria-required="true" value="{{$customer->shipping_country}}">
                      <!-- <select class="form-control" id="" name="shipping_country">
                        <option >Select Country</option>
                        <option value="Andaman and Nicobar">Andaman and Nicobar ( 35 )</option>
                        <option value="Andhra Pradesh">Andhra Pradesh ( 28 )</option>
                        <option value="Andhra Pradesh (New)">Andhra Pradesh (New) ( 37 )</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh ( 12 )</option>
                        <option value="Assam">Assam ( 18 )</option>
                        <option value="Bihar">Bihar ( 10 )</option>
                        <option value="Chandigarh">Chandigarh ( 04 )</option>
                        <option value="Chhattisgarh">Chhattisgarh ( 22 )</option>
                        <option value="Dadra &amp; Nagar Haveli and Daman &amp; Diu">Dadra &amp; Nagar Haveli and Daman
                          &amp; Diu ( 26 )</option>
                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli ( 26 )**</option>
                        <option value="Daman and Diu">Daman and Diu ( 25 )**</option>
                        <option value="Delhi">Delhi ( 07 )</option>
                        <option value="Goa">Goa ( 30 )</option>
                      </select> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">SHIP. GSTIN / PAN</label>
                      <div class="controls">
                        <input type="text" id=""   class="form-control" name="shipping_gstin_pan"
                          placeholder="Enter SHIP. GSTIN / PAN" maxlength="50" value="{{$customer->shipping_gstin_pan}}" >
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Company Enable</label>
                      <div class="controls mt-2">
                        <label><input type="checkbox" name="visible_all" value="1" id="" value="{{$customer->id}}"> Company will be visiable on all document.</label>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-12 form-controls my-3 text-right">
                  <a  href="{{url('/customers')}}" type="button" class="btn mr-3">Cancel</a>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="{{asset('js/customer.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
    <script>

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

    jQuery.validator.addMethod("gstinpan", function(value, element) {
      var pan = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
      var gstin = new RegExp('^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$');
      return this.optional(element) || pan.test(value) || gstin.test(value);
    }, "Invalid Gstin/Pan number");

    jQuery.validator.addMethod("exactlength", function(value, element, param) {
    return this.optional(element) || value.length == param;
    }, $.validator.format("Please enter exactly {0} characters."));

      $('#edit-customer-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
          name: {
              required:true,
              lettersonly:true,
              maxlength:20,
              minlength:4
            },
            person_name:{
              lettersonly:true,
              maxlength:20,
              minlength:4
            },
            phone:{
              digits:true,
              exactlength:10
            },
            pincode:{
              digits:true,
              exactlength:6
            },
            bank_ifsc:{
              regex:'^[A-Z]{4}0[A-Z0-9]{6}$'
            },
            bank_account_number:{
              regex:'^\[0-9]{9,18}$'
            },
            website:{
              url:true
            },
            email:{
              regex: "^[a-zA-Z0-9_.]+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}$"
            },
            city:{
              lettersonly:true,
              maxlength:35
            },
            gstin_pan:{
              gstinpan:true
            },
            eway_distance:{
              digits:true
            },
            license_no:{
              regex: "^(([A-Z]{2}[0-9]{2})( )|([A-Z]{2}-[0-9]{2}))((19|20)[0-9][0-9])[0-9]{7}$"
            },
            shipping_gstin_pan:{
              gstinpan:true
            },
            shipping_name:{
              lettersonly:true
            },
            shipping_phone:{
              digits:true,
              exactlength:10
            },
            shipping_country:{
              lettersonly:true
            }
        },
        messages: {
          name: {
              required: 'Please enter Customer/vendor',
              lettersonly:'Name should be only characters'
          },
          person_name:{
            lettersonly:'You can enter only characters'
          },
          phone:{
            digits:'you can enter only digits'
          },
          pincode:{
            digits:'you can enter only digits'
          },
          bank_ifsc:{
            regex:'Invalid IFSC code'
          },
          bank_account_number:{
            regex:'Invalid Account number'
          },
          email:{
            regex:"Please enter a valid email address"
          },
          license_no:{
            regex: "Invalid License "
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
            error.appendTo(element.closest('.form-group'));
        },
        submitHandler: function(form) {
          $(form)[0].submit();
        }
    });
    </script>
@endsection
