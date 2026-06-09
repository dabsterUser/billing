var dateFormat = "dd-M-yy";
function getDate(element) {
  var date;
  try {
    date = $.datepicker.parseDate(dateFormat, element.value);
  } catch (error) {
    date = null;
  }
  return date;
}
$('#companytype').on('change', function () {
  var selectedOption = $(this).val();
  if (selectedOption == 'vendor' || selectedOption == 'customer-vendor') {
    $('.vendordetail').removeClass('d-none').addClass('d-block');
  } else {
    $('.vendordetail').removeClass('d-block').addClass('d-none');
  }
});

function SetPaymentModeDueDate() {
  if ($("#payment").val() == 'CASH' || $("#payment").val() == 'ONLINE' || $("#payment").val() == 'CHECK') {
    //  console.log( $("#datepicker_lr").data("old-due"));
    if ($("#datepicker_lr").data("old-due") == undefined) {
      $("#datepicker_lr").attr("data-old-due", $("#datepicker_lr").val());
    }
    $("#datepicker_lr").val("");
    $("#datepicker_lr").prop('disabled', true);
    $("#payment_received_row").show();
  }
  else {
    $("#datepicker_lr").prop('disabled', false);
    if ($("#datepicker_lr").attr("data-old-due") != "" && typeof $("#datepicker_lr").attr("data-old-due") !== typeof undefined && $("#datepicker_lr").attr("data-old-due") !== false) {
      var ddd = $("#datepicker_lr").attr("data-old-due");
      $("#datepicker_lr").val(ddd);
    }
    $("#payment_received_row").hide();
  }
}

$(document).on("change", "#payment", function () {
  SetPaymentModeDueDate();
});

// $('#is_same_shipping_invoice').on('click', function () {
//   var ischecked = $('#is_same_shipping_invoice').is(':checked');
//   if (ischecked == false) {
//     $('#shipping_detail_drawer').removeClass('d-none');
//   } else {
//     $('#shipping_detail_drawer').addClass('d-none');
//   }
// });
function updateAddressData(id, type, updateShipping = true) {
  var data = { id, type };
  $.ajax({
    type: "GET",
    url: base_url + '/customerlist',
    ContentType: 'application/json',
    dataType: 'json',
    data: data,
    success: function (response) {
      if(id){
        if (response.status == '1') {

          var data = response.data[0];
          
          $(".customer-information-invoice .address").val(data.address1);
          $(".customer-information-invoice .customer-address-label").html(data.address1);
          $(".customer-information-invoice .phone").val(data.phone);
          $(".customer-information-invoice .customer-phone-label").html(data.phone);
          $(".customer-information-invoice .customer_gstno").val(data.gstin);
          $(".customer-information-invoice .customer-gstin-label").html(data.gstin);
          $(".customer-information-invoice .customer_pan").val(data.pan);
          $(".customer-information-invoice .customer-pan-label").html(data.pan);
  
          $(".customer-information-invoice #PlaceofSupply").val(data.state_id).trigger('change');
          $(".customer_state_id").val(data.state_id).trigger('change');
  
          if(data.same_shipping == "off")
          {
            var ischecked = $('#is_same_shipping_invoice').is(':checked');
            if (ischecked) {
              $('#shipping_detail_drawer').removeClass('d-none');
            } 
            $('#is_same_shipping_invoice').prop('checked', !ischecked);

          }
          else{
            $('#shipping_detail_drawer').addClass('d-none');
            var ischecked = $('#is_same_shipping_invoice').is(':checked');
            
            $('#is_same_shipping_invoice').on('click', function () {
              var ischecked = $('#is_same_shipping_invoice').is(':checked');
              if (ischecked == false) {
                $('#shipping_detail_drawer').removeClass('d-none');
              } else {
                $('#shipping_detail_drawer').addClass('d-none');
              }
            });
          }


          // if(data.gstin_pan == "")
          // {
          //   $("#reverse_Charge").val("0");
          //   $("#reverse_Charge").attr("disabled", true).trigger("change");
          // }
          // else
          // {
          //   $("#reverse_Charge").attr("disabled", false).trigger("change");
          // }
  
          /* same shipping address enable & desabled code here */
  
          if (updateShipping) {
            $(".customer-information-invoice  #shippingName").val(data.shipping_name);
            $(".customer-information-invoice  #shippingAddress").val(data.shipping_address);
            $(".customer-information-invoice  #shippingPhone").val(data.shipping_phone);
            $(".customer-information-invoice  #shippingState").val(data.shipping_state_id);
            $(".customer-information-invoice  #shippingCountry").val('india');
            $(".customer-information-invoice  #shippingGSTIN").val(data.shipping_gstin);
            $(".customer-information-invoice  #shippingPAN").val(data.shipping_pan);
  
          }
  
          // if(data.due_days != "")
          // {
          //   // console.log(data.due_days);
          //   // console.log('1');
          //   $("#datepicker_lr").attr("data-default-due",data.due_days);
          //   $( "#datepicker_bill" ).trigger("change");
          // }
          // else 
          // {
          //   // console.log(data.due_days);
          //   // console.log('2');
          //   $("#datepicker_lr").attr("data-default-due",$("#datepicker_lr").attr("data-main-default-due"));
          //   $( "#datepicker_bill" ).trigger("change");
          // }
  
  
  
          // SetIGTS();
          // $(".customer_outstanding_value").html("Get Customer Oustanding").addClass("btn-link");
          // $(".customer_outstanding_value").click(getCustomerOutstanding);
        }
        else {
  
          // Setting ISGT Values for POS
          SetIGTS();
  
        }
      }
      else
      {

        $(".customer-information-invoice .address").val("");
        $(".customer-information-invoice .customer-address-label").html("");
        $(".customer-information-invoice .phone").val('');
        $(".customer-information-invoice .customer-phone-label").html('');
        $(".customer-information-invoice .customer_gstno").val('');
        $(".customer-information-invoice .customer-gstin-label").html('');
        $(".customer-information-invoice .customer_pan").val('');
        $(".customer-information-invoice .customer-pan-label").html('');

        $(".customer-information-invoice #PlaceofSupply").val('').trigger('change');

        if (updateShipping) {
          $(".customer-information-invoice  #shippingName").val(" ");
          $(".customer-information-invoice  #shippingAddress").val(" ");
          $(".customer-information-invoice  #shippingPhone").val(" ");
          $(".customer-information-invoice  #shippingState").val(" ");
          $(".customer-information-invoice  #shippingCountry").val(" ");
          $(".customer-information-invoice  #shippingGSTIN").val(" ");
          $(".customer-information-invoice  #shippingPAN").val(" ");

        }

      }
    },
    error: function (data) {
    },
    complete: function (data) {
    }
  });

  UpdateCalculations();
}

function get_invoice_number() {
  $.ajax({
    type: "GET",
    url: base_url + '/lastinvoice',
    ContentType: 'application/json',
    dataType: 'json',
    data: [],
    success: function (response) {
      if (response.status == '1') {
        var data = response.data;
        if (data) {
          // console.log('12');
          var invoice_number = parseInt(data.invoice_number) + 1;
          $('#invoiceNumber').val(invoice_number);
        } else {
          $('#invoiceNumber').val(1);
        }
      }
    },
    error: function (data) {
    },
    complete: function (data) {
    }
  });
}

function updateTransport(id) {
  $.ajax({
    type: "GET",
    url: base_url + '/transportlist',
    ContentType: 'application/json',
    dataType: 'json',
    data: { id },
    success: function (response) {
      // console.log(response);
      if (response.status == '1') {
        var data = response.data[0];
        if (data) {
          $('.transport_id').val(data.id);
          $('.transport_id_label').val(data.transport_id);
          $('.transport_transport_id').val(data.transport_id);
          $('.transport_vehicle_no').val(data.vehicle_no);
          $('.vehicle_no_label').val(data.vehicle_no);
        } else {
          $('.transport_id').val('');
          $('.transport_id_label').val('');
          $('.transport_transport_id').val('');
          $('.transport_vehicle_no').val('');
          $('.vehicle_no_label').val('');
        }
      }
    },
    error: function (data) {
    },
    complete: function (data) {
    }
  });
}

function validateCurrentRows() {
  var isValid = true;

  $(".product-list-row .product-item-row").each(function () {

    var quantity = $(this).find(".quantity").val();
    var rate = $(this).find(".rate").val();
    var product = $(this).find(".product-item").val();
    var row_total = 0;
    if (product == "") {
      alert('Please Select Product.');
      $(this).find(".product-item").focus();
      isValid = false;
      return false;
    }
    if (quantity == "") {
      alert('Please enter Quantity.');
      $(this).find(".quantity").focus();
      isValid = false;
      return false;
    }
    if (rate == "") {
      alert('Please enter Price.');
      $(this).find(".rate").focus();
      isValid = false;
      return false;
    }
  });
  return isValid;
}

$(document).ready(function() {
  $(".quantity").on("blur", function() {
      var quantity = $(this).val();
      var totalquantity = $(".product-quantity-available").html();

      if (parseInt(quantity) > parseInt(totalquantity)) {
          alert('Please enter a valid quantity.');
      }
  });
});


function clonerow(selector) {
  var cloned = $('.product-list-row .product-item-row:last').clone(true, true);
  cloned.find('span.select2-container').remove();
  cloned.find('select.select2').select2();
  cloned.insertAfter(".product-list-row .product-item-row:last").find('input').val('');
  cloned.find('select.select2').select2();
  cloned.find('.product-quantity-available').html();
  $(selector).siblings().removeClass('d-none');
}

function get_invoice_number1() {
  $.ajax({
    type: "GET",
    url: base_url + '/lastinvoice',
    ContentType: 'application/json',
    dataType: 'json',
    data: [],
    success: function (response) {
      if (response.status == '1') {
        var data = response.data;
        if (data) {
          $('#invoiceNumber').val(data.invoice_number);
        } else {
          $('#invoiceNumber').val(1);
        }
      }
    },
    error: function (data) {
    },
    complete: function (data) {
    }
  });
}

function get_product_by_id(id, current) {
  // var current = this;
  // console.log(current);
  $.ajax({
    type: "GET",
    url: base_url + '/productlist',
    ContentType: 'application/json',
    dataType: 'json',
    data: { id },
    success: function (response) {
      if (response.status == '1') {
        var data = response.data[0];
        if (data) {

          // console.log(data);

          var targetparent = $(current).parents(".product-item-row");
          // $(targetparent).find(".hidden-item-product-id").val();
          $(targetparent).find(".hidden-item-product-id").val(data.id)
          $(targetparent).find(".hidden-item-product-name").val(data.name)
          $(targetparent).find(".hidden-item-product-uom").val(data.unit)
          $(targetparent).find(".hidden-item-product-is_transport").val('N')
          $(targetparent).find(".hidden-item-product-gst").val(data.gst_rate)
          // $(targetparent).find(".hidden-item-product-cess").val(data.cess)
          // $(targetparent).find(".hidden-item-product-cess_amount").val(data.cess_amount);
          if (data.is_service_product == 1) {
            $(targetparent).find(".quantity").val(1);
          } else {
            $(targetparent).find(".quantity").val(1);
            $(targetparent).find(".product-quantity-available").html(data.stock);
          }
          $(targetparent).find(".hsccode").val(data.hsn_code);
          $(targetparent).find(".rate").val(data.sell_price);
          $(targetparent).find(".gst:not([readonly])").val(data.cgst);
          $(targetparent).find(".gst").val(data.gst_rate);
          $(targetparent).find(".sell_price_with_tax").val(data.sell_price_with_tax);
          // $(targetparent).find(".sgst:not([readonly])").val(data.sgst);
          // $(targetparent).find(".igst:not([readonly])").val(data.igst);
          // $(targetparent).find(".cess").val(data.cess);
          // $(targetparent).find(".cess_amount").val(data.cess_amount);
          UpdateCalculations();
          // console.log($(targetparent).find(".hidden-item-product-id").val());
          // $('#invoiceNumber').val(data.invoice_number);
        } else {
          // $('#invoiceNumber').val(1);
        }

      }
    },
    error: function (data) {
    },
    complete: function (data) {
    }
  });
}

function SetIGTS() {
  // console.log('igsts');
  // if($("#invoicetype").val() == "SEZInvoiceWithoutIGST" || $("#invoicetype").val() == "BillofSupply")
  // {
  // //  console.log('1');
  //   DisableALL_IGST();
  // }
  // else if($("#invoicetype").val() == "SEZInvoice"  )
  // {
  //   // console.log('2');
  //   EnableIGST();
  // }
  // else if($("#business_state").val() == $("#PlaceofSupply").val())
  // {
  //   // console.log('3');
  //   DisableIGST();
  // }
  // else
  // {
  //   // console.log('4');
  //   EnableIGST();
  // }

  if ($("#business_state").val() == $("#PlaceofSupply").val()) {

    DisableIGST();
  }
  else {
    // console.log('4');
    EnableIGST();
  }


}

function DisableALL_IGST() {
  $(".product-list-row .gst").val("").attr('readonly', true);
  // $(".product-list-row .cgst").val("").attr('readonly',true);
  // $(".product-list-row .sgst").val("").attr('readonly',true);
  // $(".product-list-row .igst_rate").val("0");
  // $(".product-list-row .cgst_rate").val("0");
  $(".product-list-row .gst").val("0");

  UpdateCalculations();
}
function DisableIGST() {
  $(".product-list-row .gst").val("").attr('readonly', true);
  // $(".product-list-row .igst").val("").attr('readonly',true);
  // $(".product-list-row .cgst").removeAttr('readonly');
  // $(".product-list-row .sgst").removeAttr('readonly');
  // $(".product-list-row .igst_rate").val("0");
  $(".product-list-row .product-item-row").each(function () {
    var gstPer = $(this).find(".hidden-item-product-gst").val();
    // var cgstPer = $(this).find(".hidden-item-product-cgst").val();
    // var sgstPer = $(this).find(".hidden-item-product-sgst").val();

    if ($(this).find(".gst:not([readonly])").val() == "") {
      $(this).find(".gst:not([readonly])").val(gstPer);
    }


    // if($(this).find(".cgst:not([readonly])").val() == "")
    // {
    //   $(this).find(".cgst:not([readonly])").val(cgstPer);
    // }
    // if($(this).find(".sgst:not([readonly])").val()== "")
    // {
    //   $(this).find(".sgst:not([readonly])").val(sgstPer);
    // }

  });
  UpdateCalculations();
}
function EnableIGST() {
  $(".product-list-row .gst").removeAttr('readonly');
  // $(".product-list-row .igst").removeAttr('readonly');
  // $(".product-list-row .cgst").val("").attr('readonly',true);
  // $(".product-list-row .sgst").val("").attr('readonly',true);
  // $(".product-list-row .cgst_rate").val("0");
  // $(".product-list-row .sgst_rate").val("0");
  $(".product-list-row .product-item-row").each(function () {
    var gstPer = $(this).find(".hidden-item-product-gst").val();
    // var igstPer = $(this).find(".hidden-item-product-igst").val();
    if ($(this).find(".gst:not([readonly])").val() == "") {
      $(this).find(".gst:not([readonly])").val(gstPer);
    }

    // if($(this).find(".igst:not([readonly])").val()=="")
    // {
    //   $(this).find(".igst:not([readonly])").val(igstPer);
    // }

  });
  UpdateCalculations();
}

$("#document-item-list .quantity, #document-item-list .rate, #document-item-list .disc, #document-item-list .cgst, #document-item-list .gst, #document-item-list .igst, #document-item-list .cess, #document-item-list .cess_amount,#total_discount_value,#other_charges").off('keyup change blur').on('keyup change blur', function () {
  UpdateCalculations();
});

function UpdateCalculations() {

  var reverse_Charge = $("#reverse_Charge").val();
  if (reverse_Charge == "1") {
    reverse_Charge = true;
    $(".reverse_charge_label_text").html("Tax Under Reverse Charge :");
  }
  else {
    reverse_Charge = false;
    $(".reverse_charge_label_text").html("Total Tax :");
  }

  var total_taxable_value = 0;
  var grand_total_value = 0;
  var total_tax_value = 0;
  
  var total_sgst_value = 0;
  var total_cgst_value = 0;


  var row_total_qty = 0;
  var row_total_price = 0;
  var row_total_disc = 0;
  var row_total_gst_rate = 0;
  // var row_total_sgst_rate = 0;
  // var row_total_igst_rate = 0;
  var row_total_cess_rate = 0;
  var row_total_total = 0;
  var other_charges = 0;
  $(".product-list-row .product-item-row").each(function () {
    var quantity = $(this).find(".quantity").val();
    // console.log(quantity);
    // var is_transport = $(this).find(".hidden-item-product-is_transport").val();
    var rate = $(this).find(".rate").val();
    // console.log(rate);
    var disc = $(this).find(".disc").val();
    var disc_in_rupee = $(this).find(".disc_in_rupee").val();
    // console.log(disc);
    var gst = "";
    // var sgst = "";
    // var igst = "";
    var cess = $(this).find(".cess").val();
    var cessrate = "";
    var cess_amount = $(this).find(".cess_amount").val();
    var gstrate = "";
    if ($(this).find(".gst:not([readonly])").length > 0) { gst = $(this).find(".gst:not([readonly])").val(); }
    // if($(this).find(".sgst:not([readonly])").length > 0 ) { sgst = $(this).find(".sgst:not([readonly])").val(); }
    // if($(this).find(".igst:not([readonly])").length > 0 ) { igst = $(this).find(".igst:not([readonly])").val(); }
    if (gst != "" && (gst.charAt(gst.length - 1) != ".")) {
      gst = parseFloat(gst);
      gst = Math.round(gst * gst_rate_decimal_rounding) / gst_rate_decimal_rounding;
      $(this).find(".gst:not([readonly])").val(gst);
    }
    // if(sgst != "" && (sgst.charAt(sgst.length - 1) != ".") ){
    //   sgst = parseFloat(sgst);
    //   sgst = Math.round(sgst * gst_rate_decimal_rounding) / gst_rate_decimal_rounding;
    //   $(this).find(".sgst:not([readonly])").val(sgst);
    // }
    // if(igst != "" && (igst.charAt(igst.length - 1) != ".") ){
    //   igst = parseFloat(igst);
    //   igst = Math.round(igst * gst_rate_decimal_rounding) / gst_rate_decimal_rounding;
    //   $(this).find(".igst:not([readonly])").val(igst);
    // }
    var row_total = 0;
    if (quantity != "" && rate != "") {
      // console.log(quantity);
      if ((quantity.charAt(quantity.length - 1) != "." && quantity_decimal_rounding_by > 0 && quantity.toString().indexOf('.') > -1)) {
        // console.log('12');
        quantity = quantity.toString().substring(0, quantity.toString().indexOf('.') + 1 + quantity_decimal_rounding_by);
        $(this).find(".quantity").val(quantity);
        quantity = parseFloat(quantity);
      }
      else if (quantity_decimal_rounding_by == 0 && quantity.toString().indexOf('.') > -1) {
        // console.log('34');
        quantity = quantity.toString().substring(0, quantity.toString().indexOf('.') + 1 + quantity_decimal_rounding_by);
        quantity = parseFloat(quantity);
        $(this).find(".quantity").val(quantity);
      }
      else {
        // console.log('56');
        quantity = parseFloat(quantity);
      }

      if ((rate.charAt(rate.length - 1) != "." && price_decimal_rounding_by > 0 && rate.toString().indexOf('.') > -1)) {
        rate = rate.toString().substring(0, rate.toString().indexOf('.') + 1 + price_decimal_rounding_by);
        $(this).find(".rate").val(rate);
        rate = parseFloat(rate);
      }
      else if (price_decimal_rounding_by == 0 && rate.toString().indexOf('.') > -1) {
        rate = rate.toString().substring(0, rate.toString().indexOf('.') + 1 + price_decimal_rounding_by);
        rate = parseFloat(rate);
        $(this).find(".rate").val(rate);
      }
      else {
        rate = parseFloat(rate);
      }

      if (disc != "") {
        // console.log('disc');
        disc = parseFloat(disc);
      }
      else {
        // console.log('dis1c');
        disc = 0;
      }

      // if(!(is_transport == 1 || is_transport == "1")){
      //   row_total_qty += quantity;
      // }

      // Price Without Tax
      row_total_qty += quantity;
      row_total_price += rate;
      
      // row_total = quantity * rate;      
      sell_price_with_tax = $(this).find('.sell_price_with_tax').val();

      sell_row_total = sell_price_with_tax * quantity/(1+gst/100);

      row_total = Math.round(sell_row_total * gst_decimal_rounding) / gst_decimal_rounding;

      $(this).find('.total_taxable_label').val(row_total);

      var DiskRs = 0;
      if (disc >= 0) {
        DiskRs = (disc * row_total) / 100;
        $(this).find('.disc_in_rupee').val(DiskRs);
      }

      // if(disc_in_rupee >= 0  )
      // {
      //   DiskRs = disc_in_rupee*quantity;

      //   var discount_in_percent = (  DiskRs/row_total ) * 100;
      //   // $('.total_discount_in_percentage').val(discount_percent);
      //   $(this).find('.disc').val(discount_in_percent);
      // }

      // if(disc>0 && discount_in=='rupee' && discount_per_item == 0)
      // {
      //   DiskRs = disc;
      // }

      row_total_disc += DiskRs;
      row_total = row_total - DiskRs;
      row_total = Math.round(row_total * taxable_decimal_rounding) / taxable_decimal_rounding;

        
      // console.log(row_total_disc);
      $(this).find(".taxable_line_value").val(row_total);
      total_taxable_value += row_total;


      if (gst != "") {
        gst = parseFloat(gst);
        if (gst > 0) {

          gstrate = row_total * (gst / 100);

          gstrate = Math.round(gstrate * gst_decimal_rounding) / gst_decimal_rounding;
 
          $(this).find('.gst_amount').val(gstrate);
          
        }
      }

      // if(sgst != "" ){
      //   sgst = parseFloat(sgst);
      //   if(sgst>0){
      //     sgstrate = (row_total*sgst)/100;
      //     sgstrate = Math.round(sgstrate * gst_decimal_rounding) / gst_decimal_rounding;
      //   }
      // }
      // if(igst != "" ){
      //   igst = parseFloat(igst);
      //   if(igst>0){
      //     igstrate = (row_total*igst)/100;
      //     igstrate = Math.round(igstrate * gst_decimal_rounding) / gst_decimal_rounding;
      //   }
      // }

      if (cess != "") {
        cess = parseFloat(cess);
        if (cess > 0) {
          cessrate = (row_total * cess) / 100;
          cessrate = Math.round(cessrate * gst_decimal_rounding) / gst_decimal_rounding;
        }
      }
      // console.log(cessrate);

      if (gstrate != "") {
        $(this).find(".gst_rate").val(gstrate);
        if (!reverse_Charge) {
          row_total = row_total + gstrate;
        }
        total_tax_value += gstrate;
        row_total_gst_rate += gstrate;

      }
      else {
        $(this).find(".gst_rate").val("0");
      }

      // if(sgstrate !=""){
      //   $(this).find(".sgst_rate").val(sgstrate);
      //   if(!reverse_Charge){
      //     row_total = row_total+sgstrate;
      //   }
      //   total_tax_value+=sgstrate;
      //   row_total_sgst_rate += sgstrate;
      // }
      // else{
      //   $(this).find(".sgst_rate").val("0");
      // }
      // if(igstrate !=""){
      //   $(this).find(".igst_rate").val(igstrate);
      //   if(!reverse_Charge){
      //     row_total = row_total+igstrate;
      //   }
      //   total_tax_value+=igstrate;
      //   row_total_igst_rate += igstrate;
      // }
      // else{
      //   $(this).find(".igst_rate").val("0");
      // }

      if (cessrate != "") {
        $(this).find(".cessrate").val(cessrate);
        if (!reverse_Charge) {
          row_total = row_total + cessrate;
        }
        total_tax_value += cessrate;
        row_total_cess_rate += cessrate;
      }
      else {
        $(this).find(".cessrate").val("0");
      }

      if (cess_amount != "") {
        cess_amount = parseFloat(cess_amount);
        if (cess_amount > 0) {
          cess_amount = Math.round(cess_amount * gst_decimal_rounding) / gst_decimal_rounding;

          $(this).find(".cess_amount").val(cess_amount);
          
          if (!reverse_Charge) {
            row_total = row_total + cess_amount;
          }
          total_tax_value += cess_amount;
          row_total_cess_rate += cess_amount;

        }
      }
      

      row_total = Math.round(row_total * taxable_decimal_rounding) / taxable_decimal_rounding;

      grand_total_value += row_total;
      row_total_total += row_total;

      $(this).find(".line_total").val(row_total);


    }


  });

  row_total_qty = Math.round(row_total_qty * quantity_decimal_rounding) / quantity_decimal_rounding;
  row_total_price = Math.round(row_total_price * price_decimal_rounding) / price_decimal_rounding;
  row_total_disc = Math.round(row_total_disc * 100) / 100;
  row_total_gst_rate = Math.round(row_total_gst_rate * gst_decimal_rounding) / gst_decimal_rounding;
  // row_total_sgst_rate = Math.round(row_total_sgst_rate * gst_decimal_rounding) / gst_decimal_rounding;
  // row_total_igst_rate = Math.round(row_total_igst_rate * gst_decimal_rounding) / gst_decimal_rounding;
  // row_total_cess_rate = Math.round(row_total_cess_rate * gst_decimal_rounding) / gst_decimal_rounding;
  row_total_total = Math.round(row_total_total * 100) / 100;

  //   var other_tax_in_rupee =  $(".other_tax_in_rupee:checked").val();
  // var other_tax_type_minus =  $(".other_tax_type_minus:checked").val();
  var other_charges = $("#other_charges").val();
  // var other_tax_amount =  $("#other_tax_amount").val();

  if (other_charges > 0 && other_charges != '') {
    grand_total_value = grand_total_value + parseFloat(other_charges);
  }

  // if(other_tax_in_rupee == "0")
  // {
  //   // console.log('123');
  // 	other_tax_amount = ((other_tax_value * grand_total_value)/100);
  // 	other_tax_amount=Math.round(other_tax_amount * 100) / 100;
  // 	if(other_tax_type_minus == "1")
  // 	{
  // 		grand_total_value  = grand_total_value - other_tax_amount;
  // 	}
  // 	else
  // 	{
  // 		grand_total_value  = grand_total_value + other_tax_amount;
  // 	}
  // 	$("#other_tax_amount_label").html(other_tax_amount);
  // }
  // else 
  // {
  //   // console.log('456');
  // 	other_tax_amount = other_tax_value;
  // 	other_tax_amount=Math.round(other_tax_amount * 100) / 100;
  //   // console.log(other_tax_amount);
  // 	if(other_tax_type_minus == "1")
  // 	{
  // 		grand_total_value  = grand_total_value - other_tax_amount;
  // 	}
  // 	else
  // 	{
  // 		grand_total_value  = grand_total_value + other_tax_amount;
  // 	}
  // 	$("#other_tax_amount_label").html('');
  // }
  // $("#other_tax_amount").val(other_tax_amount);

  // var total_discount_in_rupee =  $(".total_discount_in_rupee:checked").val();
  // var total_discount_type_minus =  $(".total_discount_type_minus:checked").val();
  var total_discount_value = $("#total_discount_value").val();
  var total_discount_amount = $("#total_discount_amount").val();
  var total_discount_in_number = $(".total_discount_in_amount").val();
  var total_discount_in_percentage = $(".total_discount_in_percentage").val();

  if ((total_discount_in_number != '' && total_discount_in_number > 0) || (total_discount_in_percentage != '' && total_discount_in_percentage > 0)) {

    if (total_discount_in_number) {
      grand_total_value = grand_total_value - total_discount_in_number;
    }

    // if(total_discount_in_percentage){
    //   grand_total_value = grand_total_value - ((grand_total_value * total_discount_in_percentage)/100);
    // }

  }
  // if(total_discount_in_rupee == "0")
  // {
  // 	total_discount_amount = ((total_discount_value * grand_total_value)/100);
  // 	total_discount_amount=Math.round(total_discount_amount * 100) / 100;
  // 	if(total_discount_type_minus == "1")
  // 	{
  // 		grand_total_value  = grand_total_value - total_discount_amount;
  // 	}
  // 	else
  // 	{
  // 		grand_total_value  = grand_total_value + total_discount_amount;
  // 	}
  // 	$("#total_discount_amount_label").html(total_discount_amount);
  // }
  // else 
  // {
  // 	total_discount_amount = total_discount_value;
  // 	total_discount_amount=Math.round(total_discount_amount * 100) / 100;
  // 	if(total_discount_type_minus == "1")
  // 	{
  // 		grand_total_value  = grand_total_value - total_discount_amount;
  // 	}
  // 	else
  // 	{
  // 		grand_total_value  = grand_total_value + total_discount_amount;
  // 	}
  // 	$("#total_discount_amount_label").html('');
  // }

  $("#total_discount_amount").val(total_discount_amount);
  // console.log(grand_total_value);
  // console.log(grand_total_value);
  var old_grandTotal = grand_total_value;


  // if(parseInt(enable_round_off,10) == 1){		grand_total_value = Math.round(grand_total_value);			}
  var round_off_value = grand_total_value - old_grandTotal;

  total_taxable_value = Math.round(total_taxable_value * taxable_decimal_rounding) / taxable_decimal_rounding;
  grand_total_value = Math.round(grand_total_value * 100) / 100;
  round_off_value = Math.round(round_off_value * 100) / 100;
  total_tax_value = Math.round(total_tax_value * gst_decimal_rounding) / gst_decimal_rounding;

  total_sgst_value = total_tax_value / 2 ;
  total_cgst_value = total_tax_value / 2;

  var cus_pay_grandtotal = grand_total_value;
  // console.log(cus_pay_grandtotal);

  $(".total_cgst_tax_lable").html(total_cgst_value);
  $(".total_sgst_tax_lable").html(total_sgst_value);

  Customer_stateId = $(".customer_state_id").val();
  CurrentUser_stateId = $(".currentUser_stateId").val();

  // console.log('currentUser :' + CurrentUser_stateId);
  // console.log('customer Id :' + Customer_stateId);
  
  if (Customer_stateId === CurrentUser_stateId) {

    $('.cgst').removeClass('d-none').addClass('d-block');
    $('.igst').removeClass('d-block').addClass('d-none');
  } 
  else 
  {

    $('.igst').removeClass('d-none').addClass('d-block');
    $('.cgst').removeClass('d-block').addClass('d-none');
  }
    
  
  $("#total_qty_label").html(row_total_qty);
  $("#total_qty").val(row_total_qty);

  $("#total_price_lable").html(row_total_price);
  $("#total_price").val(row_total_price);
  $("#total_discount_label").html(row_total_disc);
  $("#total_discount").val(row_total_disc);
  $("#total_gst_rate_label").html(row_total_gst_rate);
  $("#total_gst_rate").val(row_total_gst_rate);
  // $("#total_sgst_rate_label").html(row_total_sgst_rate);
  // $("#total_sgst_rate").val(row_total_sgst_rate);
  // $("#total_igst_rate_label").html(row_total_igst_rate);
  // $("#total_igst_rate").val(row_total_igst_rate);
  $("#total_cess_rate_label").html(row_total_cess_rate);
  $("#total_cess_rate").val(row_total_cess_rate);
  $("#item_total_label").html(row_total_total);
  $("#item_total").val(row_total_total);

  $(".total_taxable_label").html(total_taxable_value);
  $("#total_taxable").val(total_taxable_value);
  $(".total_tax_lable").html(total_tax_value);
  $("#total_tax").val(total_tax_value);
  $("#grand_total_label").html(grand_total_value);
  $("#grand_total").val(grand_total_value);

  $("#hidden_round_off_value").val(round_off_value);
  $(".grandtotalwords").text(number2text(cus_pay_grandtotal));
  $("#hidden_grandtotalwords").val(number2text(grand_total_value));
  $("#payment_received").val(grand_total_value);
}


$("#datepicker_bill").datepicker(
  {
    changeMonth: true,
    changeYear: true,
    dateFormat: 'dd-M-yy'
  }).on("change", function () {
    if ($("#datepicker_lr").attr("data-value") == "") {
      var ddd = $("#datepicker_lr").attr("data-default-due");
      var newDate = getDate(this);
      // console.log(newDate);
      $("#datepicker_lr").datepicker("option", "minDate", getDate(this));
      newDate.setDate(newDate.getDate() + parseInt(ddd, 10));
      $("#datepicker_lr").datepicker("setDate", newDate);
    }
  });

if ($("#datepicker_bill").val() == '') {
  $("#datepicker_bill").datepicker("setDate", new Date());
}

$('.total_discount_in_percentage').on('keyup change blur', function () {

  var discount_percentage = $(this).val();
  var item_totals = $('#item_total').val();
  var discount_amount = (item_totals * discount_percentage) / 100;
  $('.total_discount_in_amount').val(discount_amount);
  UpdateCalculations();

});



$('.total_discount_in_amount').on('keyup change blur', function () {

  var discount_amount = $(this).val();
  var item_totals = $('#item_total').val();
  var discount_percent = (discount_amount / item_totals) * 100;
  $('.total_discount_in_percentage').val(discount_percent);
  UpdateCalculations();

});

$('.disc_in_rupee').on('keyup', function () {

  var discount_in_rupees = $(this).val();
  var item_price = $(this).closest('.product-item-row').find('.rate').val();
  var discount_percent = (discount_in_rupees / item_price) * 100;
  var final_discount_percent = Math.round(discount_percent * gst_rate_decimal_rounding) / gst_rate_decimal_rounding

  $(this).closest('.product-item-row').find('.disc').val(final_discount_percent);
  // UpdateCalculations();

});

$('.disc_in_rupee').on('blur', function () {
  UpdateCalculations();
});




