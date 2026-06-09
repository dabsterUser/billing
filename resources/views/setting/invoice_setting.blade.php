@extends('layouts.customer')



@section('content')
<div class="page-content">
<form action="{{url('/invoice-setting')}}" method="post" id="add-saleinvoice-form">
@csrf
    <div class="top-stickybar">
        <div class="container-fluid">
            <div class="row d-flex justify-content-end align-items-center">
                <div class="col-4 pl-0">
                    <h1>General Settings</h1>
                </div>
                <div class="col-8 text-right">
                    <a href="{{url('/')}}" class="btn btn-light mr-2">Cancel</a>
                    <button type="submit" id="submit-data" class="btn btn-secondary disabled"  disabled="true">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid main-container">
        <div class="main-form-container">
            <div class="row mx-0">
                <div class="col-8 py-3">
                    <h5 class="form-heading mb-4">Invoice</h5>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Enable rounding</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="enable_round" name="enable_round"
                                    class="custom-control-input" value="1" {{$general_settings->enable_round == 1? 'checked': ''}}>
                                <label class="custom-control-label" for="enable_round">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="enable_round1" name="enable_round"
                                    class="custom-control-input" value="0" {{$general_settings->enable_round == 0? 'checked': ''}}>
                                <label class="custom-control-label" for="enable_round1">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Due Date</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="due_date" name="due_date"
                                    class="custom-control-input" value="1" {{$general_settings->due_date == 1? 'checked': ''}}>
                                <label class="custom-control-label" for="due_date">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="due_date1" name="due_date"
                                    class="custom-control-input" value="0" {{$general_settings->due_date == 0? 'checked': ''}}>
                                <label class="custom-control-label" for="due_date1">Hide</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Challan Date & no.</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="challan_date_no"  name="challan_date_no"
                                    class="custom-control-input" value="1" {{$general_settings->challan_date_no == 1? 'checked': ''}}>
                                <label class="custom-control-label" for="challan_date_no">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="challan_date_no1" name="challan_date_no"
                                    class="custom-control-input" value="0" {{$general_settings->challan_date_no == 0? 'checked': ''}}>
                                <label class="custom-control-label"  for="challan_date_no1">Hide</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">E-Way no.</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="e_way_no" name="e_way_no"
                                    class="custom-control-input" value="1" {{$general_settings->e_way_no == 1? 'checked': ''}}>
                                <label class="custom-control-label" for="e_way_no">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="e_way_no1" name="e_way_no"
                                    class="custom-control-input" value="0" {{$general_settings->e_way_no == 0? 'checked': ''}}>
                                <label class="custom-control-label" for="e_way_no1">Hide</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Transport</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="transport" name="transport"
                                    class="custom-control-input" value="1" {{$general_settings->transport == 1? 'checked': ''}}>
                                <label class="custom-control-label" for="transport">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="transport1" name="transport"
                                    class="custom-control-input" value="0" {{$general_settings->transport == 0? 'checked': ''}}>
                                <label class="custom-control-label" for="transport1">Hide</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="" class="col-sm-3 col-form-label">Discount box</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="discount_box" name="discount_box"
                                    class="custom-control-input" value="1" {{$general_settings->discount_box == 1? 'checked': ''}}>
                                <label class="custom-control-label" for="discount_box">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="discount_box1" name="discount_box"
                                    class="custom-control-input" value="0" {{$general_settings->discount_box == 0? 'checked': ''}}>
                                <label class="custom-control-label" for="discount_box1">Hide</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">PAN no.</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pan_no" name="pan_no"
                                    class="custom-control-input" value="1" {{$general_settings->pan_no == 1? 'checked': ''}}>
                                <label class="custom-control-label" for="pan_no">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pan_no1" name="pan_no"
                                    class="custom-control-input" value="0" {{$general_settings->pan_no == 0? 'checked': ''}}>
                                <label class="custom-control-label" for="pan_no1">Hide</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="" class="col-sm-3 col-form-label">Price from last Invoice</label>
                        <div class="col-sm-3">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="show_price_last" name="show_price_last"
                                    class="custom-control-input" value="1" {{$general_settings->show_price_last == 1? 'checked': ''}}>
                                <label class="custom-control-label" for="show_price_last">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="show_price_last1" name="show_price_last"
                                    class="custom-control-input" value="0" {{$general_settings->show_price_last == 0? 'checked': ''}}>
                                <label class="custom-control-label" for="show_price_last1">Hide</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="alert alert-warning mt-0" role="alert">
                                Show product price from last invoice of same customer.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="" class="col-sm-3 col-form-label">Allow oversell</label>
                        <div class="col-sm-3">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="allow_oversell" name="allow_oversell"
                                    class="custom-control-input" value="1" {{$general_settings->allow_oversell == 1? 'checked': ''}}>
                                <label class="custom-control-label" for="allow_oversell">Show</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="allow_oversell1" name="allow_oversell"
                                    class="custom-control-input" value="0" {{$general_settings->allow_oversell == 0? 'checked': ''}}>
                                <label class="custom-control-label" for="allow_oversell1">Hide</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="alert alert-warning mt-0" role="alert">
                                Selecting "No" will not allow to generate invoice if product goes out of stock.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="" class="col-sm-3 col-form-label">Default first page</label>
                        <div class="col-sm-3">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="default_first_page" name="default_first_page"
                                    class="custom-control-input" value="1" {{$general_settings->default_first_page == 1? 'checked': ''}}>
                                <label class="custom-control-label" for="default_first_page">New Invoice</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="default_first_page1" name="default_first_page"
                                    class="custom-control-input" value="2" {{$general_settings->default_first_page == 2? 'checked': ''}}>
                                <label class="custom-control-label" for="default_first_page1">Analytics</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="alert alert-warning mt-0" role="alert">
                                Select what page you want to open each time after login.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <hr />
            <div class="setting-tab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item ml-3" role="presentation">
                        <a class="nav-link active" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab"
                            aria-controls="invoice" aria-selected="true">Invoice</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dc-tab" data-toggle="tab" href="#delivery_challan" role="tab" aria-controls="dc"
                            aria-selected="false">Delivery challan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="quotation-tab" data-toggle="tab" href="#quotation" role="tab"
                            aria-controls="quotation" aria-selected="false">Quotation</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pi-tab" data-toggle="tab" href="#proforma_invoice" role="tab" aria-controls="pi"
                            aria-selected="false">Proforma Invoice</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="po-tab" data-toggle="tab" href="#purchase_order" role="tab" aria-controls="po"
                            aria-selected="false">Purchase Order</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dn-tab" data-toggle="tab" href="#debit_note" role="tab" aria-controls="dn"
                            aria-selected="false">Debit Note</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="cn-tab" data-toggle="tab" href="#credit_note" role="tab" aria-controls="cn"
                            aria-selected="false">Credit Note</a>
                    </li>
                </ul>
                <div class="tab-content bg-grey" id="myTabContent">
                    @if(isset($invoice_option) && count($invoice_option) > 0)
                        @foreach($invoice_option as $key =>  $option)
                        <input type="hidden" name="id[]" value="{{$option->id}}">
                        <div class="tab-pane fade show @if($key == 0) active @endif" id="{{$option->type}}" role="tabpanel" aria-labelledby="{{$option->type}}-tab">
                            <div class="row mx-0">
                                <div class="col-11 py-3">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">P.O no.</label>
                                        <div class="col-sm-9">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="po_no{{$key}}" name="po_no[{{$key}}]"
                                                    class="custom-control-input" value="1"  {{$option->po_no == 1 ? 'checked': ''}} >
                                                <label class="custom-control-label" for="po_no{{$key}}">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="po_no_{{$key}}" name="po_no[{{$key}}]"
                                                    class="custom-control-input" value="0" {{$option->po_no == 0 ? 'checked': ''}}>
                                                <label class="custom-control-label" for="po_no_{{$key}}">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">L.R no.</label>
                                        <div class="col-sm-9">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="lr_no{{$key}}" name="lr_no[{{$key}}]"
                                                    class="custom-control-input"  value="1" {{$option->lr_no == 1 ? 'checked': ''}} >
                                                <label class="custom-control-label" for="lr_no{{$key}}">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="lr_no_{{$key}}" name="lr_no[{{$key}}]"
                                                    class="custom-control-input" value="0" {{$option->lr_no == 0 ? 'checked': ''}}>
                                                <label class="custom-control-label" for="lr_no_{{$key}}">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Invoice no. Prefix</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="invoice_no_prefix[]" id="invoice_no_prefix_{{$key}}" value="{{$option->invoice_no_prefix}}" placeholder="Enter Prefix">
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="alert alert-warning mt-0" role="alert">
                                                It will show <b>before</b> Invoice no. Example: <b>GK</b>-0001.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Invoice no. Postfix</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="invoice_no_postfix[]" id="invoice_no_postfix{{$key}}" value="{{$option->invoice_no_postfix}}"  placeholder="Enter Postfix">
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="alert alert-warning mt-0" role="alert">
                                                It will show <b>after</b> Invoice no. Example: 0001-<b>GK</b>.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">T & C title</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="term_condition_title[]" id="term_condition_title{{$key}}" value="{{$option->term_condition_title}}" 
                                                placeholder="Terms and Conditions">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Terms and Conditions</label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" rows="4"
                                                placeholder="Enter text here" name="term_condition[]" id="term_condition{{$key}}"  >{{$option->term_condition}}</textarea>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="alert alert-warning mt-0" role="alert">
                                                Maximum xxx characters
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<script>
    var button = $('#submit-data');
var orig = [];

$.fn.getType = function () {
    return this[0].tagName == "INPUT" ? $(this[0]).attr("type").toLowerCase() : this[0].tagName.toLowerCase();
}

$("form :input").each(function () {
    var type = $(this).getType();
    var tmp = {
        'type': type,
        'value': $(this).val()
    };
    if (type == 'radio') {
        tmp.checked = $(this).is(':checked');
    }
    orig[$(this).attr('id')] = tmp;
});

$('form').bind('change keyup', function () {

    var disable = true;
    $("form :input").each(function () {
        var type = $(this).getType();
        var id = $(this).attr('id');

        if (type == 'text' || type == 'select') {
            disable = (orig[id].value == $(this).val());
        } else if (type == 'radio') {
            disable = (orig[id].checked == $(this).is(':checked'));
        }

        if (!disable) {
            return false; // break out of loop
        }
    });

    if(disable == false){
        // console.log('123');
        button.addClass('btn-primary');
        button.removeClass('btn-secondary');
    }else{
        // console.log('456');
        button.removeClass('btn-primary');
        button.addClass('btn-secondary');
    }

    button.prop('disabled', disable);
});
</script>
@endsection