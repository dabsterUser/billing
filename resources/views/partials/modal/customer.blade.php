<!--Create Customer Modal -->
<div class="modal right" id="customerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
  
    <div class="modal-content">
    
     
    <form action="javascript:;" method="POST" id="add-customer-form">
    @csrf
      <div class="modal-header">
      
        <h5 class="modal-title" id="exampleModalLabel">Create New Customer</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary"> Save</button>
      </div>

      <div class="modal-body">
      
        <div class="form-group row">
          <label for="registration_type" class="col-sm-3 col-form-label required">Type</label>
          <div class="col-sm-9">
            <div class="controls">
              <select class="form-control custom-select" id="companytype" name="type">
                <option value="customer" {{ old('type') =='customer'?'selected':''}}>Customer</option>
                <option value="vendor" {{ old('type') =='vendor'?'selected':''}}>Vendor</option>
                <option value="customer-vendor" {{ old('type') =='customer-vendor'?'selected':''}}>Customer/Vendor</option>
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
              <input type="number" name="phone" id="phone" value="" class="form-control"
                placeholder="Your company phone no./Mobile no.">
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
            <select class="form-control custom-select @error('state_id') is-invalid @enderror" id="state_id" name="state_id" >
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

        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Pin code</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="pincode" name="pincode" 
              placeholder="Your postal pin code">
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
            <input type="text" name="pan" id="pan_number" value="" class="form-control"
              placeholder="PAN number of the business or personal if propietor">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">GSTIN</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="gstin" name="gstin" 
              placeholder="Enter GSTIN (If available)">
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
                @foreach($states as $state)
                <option value="{{$state->id}}">{{$state->name}} ({{$state->state_code}})</option>
              @endforeach
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

<!-- End Create Customer Modal -->


<!--  Create Tranport Modal -->

<div class="modal right" id="transportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
  
    <div class="modal-content">
    
     
    <form action="javascript:;" method="POST" id="create-transport-form">
      <div class="modal-header">
      
        <h5 class="modal-title" id="addTranportLabel">Create New Transport</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary"> Save</button>
      </div>

      <div class="modal-body">
      @csrf
        
        <div class="form-group row mb-3">
          <label for="" class="col-sm-3 col-form-label required">Transport Name </label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" placeholder="Enter Transport Name"  class="form-control" name="trans_name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="" class="col-sm-3 col-form-label ">Transport ID</label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" class="form-control" aria-describedby="" placeholder="Enter Transport ID" name="trans_transport_id" >
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label ">Vehicle No</label>
          <div class="col-sm-9">
            <div class="controls">
                <input type="text" class="form-control" placeholder="Enter Vehicle No" name="trans_vehicle_no" >
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
<!-- End Transport Modal -->

<!-- Create Product Modal -->
<div class="modal right" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
    <form method="post" action="javascript:;" id="create-product-form">
              @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Product</h5>
        <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary"> Save</button>
      </div>

      <div class="modal-body">
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Type</label>
          <div class="col-sm-9">
            <div class="custom-control custom-radio custom-control-inline mr-5">
              <input type="radio" id="product_type" name="product_type" class="custom-control-input product_type" value="product" checked>
              <label class="custom-control-label" for="product_type">Product/Goods</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="product_type1" name="product_type" class="custom-control-input product_type" value="service"
                >
              <label class="custom-control-label" for="product_type1">Services</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label required">Name</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text" name="name" id="product_name" maxlength="150" class="form-control name"
                placeholder="Product/item name" required="" aria-required="true">
            </div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="registration_type" class="col-sm-3 col-form-label">Measurment Unit</label>
          <div class="col-sm-9">
            <div class="controls">
              <select name="unit" id="unit" class="custom-select unit">
                <option value="">Select unit</option>
                @if(array(count($units)>0))
                  @foreach($units as $unit)
                    <option value="{{$unit->short_name}}">{{$unit->name}} </option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="registration_type" class="col-sm-3 col-form-label">Category</label>
          <div class="col-sm-9">
            <div class="controls">
              <select name="category" id="category" class="custom-select category">
                <option value="taxable">Taxable</option>
                <option value="exempted">Exempted</option>
                <option value="non_gst">Non GST</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="registration_type" class="col-sm-3 col-form-label required">Sell Price</label>
          <div class="col-sm-9">
            <div class="input-group">
              <input type="text" class="form-control sell_price" name="sell_price" aria-label="Text input with dropdown button">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary dropdown-toggle sell-dropdown" type="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Including Tax</button>
                <div class="dropdown-menu sell-dropdown-option">
                <a class="dropdown-item" href="#">Including Tax</a>
                <a class="dropdown-item" href="#">Excluding Tax</a>
                </div>
              </div>
            </div>
            <input type="hidden" class="sell_price_tax" name="sell_price_tax" value="0">
            <!-- <p id="sell_price_tax_label" class="sell_price_tax_label" ></p> -->
            <input type="hidden" class="sell_price_original" name="sell_price_original" value="0">
            <!-- <p  class="sell_price_tax_label" ></p> -->
            <div class="sell_price_container ">
                <p class="d-none sell_price_label">Sell Price :<span> </span> </p>
                <p class="d-none sell_price_tax_label">Sell Price with tax :<span> </span> </p>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="registration_type" class="col-sm-3 col-form-label">Purchase Price</label>
          <div class="col-sm-9">
            <div class="input-group">
              <input type="text" name="purchase_price" class="form-control purchase_price" aria-label="Text input with dropdown button">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary dropdown-toggle purchase-dropdown" type="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Including Tax</button>
                <div class="dropdown-menu purchase-dropdown-option">
                  <a class="dropdown-item" href="#">Including Tax</a>
                  <a class="dropdown-item" href="#">Excluding Tax</a>
                </div>
              </div>

            </div>
            <input type="hidden" class="purchase_price_tax" name="purchase_price_tax" value="0">
            <!-- <p id="purchase_price_tax_label" class="purchase_price_tax_label" ></p> -->
            <input type="hidden" class="purchase_price_original" name="purchase_price_original" value="0">
            <!-- <p  class="sell_price_tax_label" ></p> -->
            <div class="purchase_price_container ">
                <p class="d-none purchase_price_label">Purchase Price :<span> </span> </p>
                <p class="d-none purchase_price_tax_label">Purchase Price with tax :<span> </span> </p>
            </div>
          </div>
        </div>
        <div class="form-group row mb-4">
          <label for="registration_type" class="col-sm-3 col-form-label">GST Rate</label>
          <div class="col-sm-9">
            <div class="controls">
              <select name="gst_rate" id="gst_rate" class="custom-select gst_rate">
                <option value="">Select applicable GST rate</option>
                @if(array(count($gstrate)>0))
                  @foreach($gstrate as $gst)
                    <option value="{{$gst->value}}">{{$gst->name}} </option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">HSN Code</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text" name="hsn_code" id="hsn_code" maxlength="150" class="form-control hsn_code"
                placeholder="HSN Code of an item" aria-required="true">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Item Code</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text" name="item_code" id="item_code"  maxlength="150" class="form-control item_code"
                placeholder="Item Code if you are using any"  aria-required="true">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-3 col-form-label">Opening Stock</label>
          <div class="col-sm-9">
            <div class="controls">
              <input type="text" name="stock" id="stock" maxlength="150" class="form-control stock"
                placeholder="Stock in numbers"  aria-required="true">
            </div>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- End Product Modal -->