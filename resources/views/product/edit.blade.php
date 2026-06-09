@extends('layouts.customer')

@section('content')
<div class="container-fluid">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">Product</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="icon icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{url('/products')}}">Product</a></li>
                <li class="breadcrumb-item"><a href="#!">Edit Product</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5>Edit Product</h5>
            </div>
            <div class="card-body">

              <form method="post" action="{{url('/products/'.$product->id)}}">
              @csrf
              {{ method_field('PATCH') }}

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Name *</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Product Note</label>
                      <textarea cols="2" name="description" class="form-control" placeholder="Enter Product Note">{{ $product->name }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">HSN/SAC Code</label>
                      <input type="number" name="hsn_code" class="form-control" id="" aria-describedby=""
                        placeholder="Enter HSN/SAC Code" value="{{ $product->name }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Unit of Measurement *</label>
                      <select class="form-control" id="" name="unit">

                        <option >Select Unit</option>
                        @foreach($units as $unit)
                        <option value="{{$unit->short_name}}"  {{ $product->unit == $unit->short_name ? 'selected':'' }}>{{$unit->name}} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Stock Available</label>
                      <input type="number" class="form-control" id="" aria-describedby=""
                        placeholder="Enter Stock Available" name="stock" value="{{ $product->name }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Product Type *</label>
                      <select class="form-control" id="" name="type">
                      <option value="taxable">Taxable</option>
                        <option value="nill_rated">Nil Rated</option>
                        <option value="exempted">Exempt</option>
                        <option value="non_gst">Non-GST</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">No-ITC</label>
                      <div class="controls mt-2">
                        <label><input type="checkbox" name="no_itc" value="{{ $product->no_itc}}" {{ $product->no_itc == 1 ?'checked':''}} id=""> Is Product ineligible for Input
                          Credit?</label>
                      </div>
                    </div>

                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">CGST %</label>
                      <div class="controls">
                        <input type="text" id="" value="{{ $product->cgst }}" class="form-control" name="cgst" placeholder="Enter CGST %"
                          maxlength="50"  aria-required="true">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">SGST %</label>
                      <div class="controls">
                        <input type="text" id=""  value="{{ $product->sgst }}" class="form-control" name="sgst" placeholder="Enter SGST %"
                          maxlength="50"  aria-required="true">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">IGST %</label>
                      <div class="controls">
                        <input type="text" id=""  value="{{ $product->igst }}" class="form-control" name="igst" placeholder="Enter IGST %"
                          maxlength="50"  aria-required="true">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">CESS %</label>
                      <div class="controls">
                        <input type="text" id=""  value="{{ $product->cess }}" class="form-control" name="cess" placeholder="Enter CESS %"
                          maxlength="50"  aria-required="true">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">CESS Amount</label>
                      <div class="controls">
                        <input type="text" id=""  value="{{ $product->cess_amount }}" class="form-control" name="cess_amount" placeholder="Enter CESS Amount"
                          maxlength="50"  aria-required="true">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Sell Price</label>
                      <div class="controls">
                        <input type="text" id=""  value="{{ $product->sell_price }}" class="form-control" name="sell_price" placeholder="Enter Sell Price"
                          maxlength="50"  aria-required="true">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Sell Price (Incl. Tax)</label>
                      <div class="controls">
                        <input type="text" id=""  value="{{ $product->sell_price_with_tax }}" class="form-control" name="sell_price_with_tax" placeholder="Enter Sell Price (Incl. Tax)"
                          maxlength="50"  aria-required="true">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Purchase Price</label>
                      <div class="controls">
                        <input type="text" id=""  value="{{ $product->purchase_price }}" class="form-control" name="purchase_price" placeholder="Enter Purchase Price"
                          maxlength="50"  aria-required="true">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Purchase Price (Incl. Tax)</label>
                      <div class="controls">
                        <input type="text" id=""  value="{{ $product->purchase_price_with_tax }}" class="form-control" name="purchase_price_with_tax" placeholder="Enter Purchase Price (Incl. Tax)"
                          maxlength="50"  aria-required="true">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Service Item</label>
                      <div class="controls mt-2">
                        <label><input type="checkbox"  name="is_service_product" value="{{ $product->is_service_product }}" {{ $product->is_service_product == 1 ?'checked':''}} id=""> Check if it is service, Ex - Computer Service, Consulting Services (No Stock Count)</label>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Product Enable</label>
                      <div class="controls mt-2">
                        <label><input type="checkbox" name="is_visible_all"  value="{{ $product->is_visible_all }}" {{ $product->is_visible_all == 1 ?'checked':''}}  id=""> Product will be visiable on all document.</label>
                      </div>
                    </div>

                  </div>

                  <div class="col-md-12 form-controls my-3 text-right">
                    <button type="button" class="btn mr-3">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{asset('public/js/product_calculation.js')}}"></script>
    @endsection