

var price_decimal_rounding = 100;
var gst_decimal_rounding = 100;
var gst_rate_decimal_rounding = 100;
$("#sellprice_incl_tax").on('keyup change blur', function () {
  var totaltax = 0;
  var sell = $("#sellprice").val();
  var sell_inc = $("#sellprice_incl_tax").val();
  var cgst = $("#cgst").val();
  var sgst = $("#sgst").val();
  var igst = $("#igst").val();
  var cess = $("#cess").val();
  var cess_amount = $("#cess_amount").val();
  if (sell_inc != "") {
    sell_inc = parseFloat(sell_inc);
    if (cess_amount != "") {
      cess_amount = parseFloat(cess_amount);
      sell_inc = sell_inc - cess_amount;
    }
    if (cgst != "" && sgst != "") {
      cgst = parseFloat(cgst);
      sgst = parseFloat(sgst);
      totaltax = totaltax + cgst + sgst;
    }
    else {
      if (igst != "") {
        igst = parseFloat(igst);
        totaltax = totaltax + igst;
      }
    }
    if (cess != "") {
      cess = parseFloat(cess);
      totaltax = totaltax + cess;
    }
    sell = (sell_inc * 100) / (100 + totaltax);
    sell = Math.round(sell * price_decimal_rounding) / price_decimal_rounding;
    $("#sellprice").val(sell);
  }

});
$("#sellprice,#cgst,#sgst,#igst,#cess").on('keyup change blur', function () {

  var totaltax = 0;
  var igstrate = 0;
  var cessrate = 0;
  var sell = $("#sellprice").val();
  var sell_inc = $("#sellprice_incl_tax").val();
  var cgst = $("#cgst").val();
  var sgst = $("#sgst").val();
  var igst = $("#igst").val();
  var cess = $("#cess").val();
  var cess_amount = $("#cess_amount").val();
  if (cgst != "" && (cgst.charAt(cgst.length - 1) != ".")) {
    cgst = parseFloat(cgst);
    cgst = Math.round(cgst * gst_rate_decimal_rounding) / gst_rate_decimal_rounding;
    $("#cgst").val(cgst);
  }
  if (sgst != "" && (sgst.charAt(sgst.length - 1) != ".")) {
    sgst = parseFloat(sgst);
    sgst = Math.round(sgst * gst_rate_decimal_rounding) / gst_rate_decimal_rounding;
    $("#sgst").val(sgst);
  }
  if (igst != "" && (igst.charAt(igst.length - 1) != ".")) {
    igst = parseFloat(igst);
    igst = Math.round(igst * gst_rate_decimal_rounding) / gst_rate_decimal_rounding;
    $("#igst").val(igst);
  }
  if (sell != "") {
    sell = parseFloat(sell);
    sell_inc = parseFloat(sell_inc);

    if (cgst != "" && sgst != "") {
      cgst = parseFloat(cgst);
      sgst = parseFloat(sgst);
      igstrate = (sell * (cgst + sgst)) / 100;
      igstrate = Math.round(igstrate * gst_decimal_rounding) / gst_decimal_rounding;
    }
    else {
      if (igst != "") {
        igst = parseFloat(igst);
        igstrate = (sell * igst) / 100;
        igstrate = Math.round(igstrate * gst_decimal_rounding) / gst_decimal_rounding;
      }
    }


    if (cess != "") {
      cessrate = (sell * cess) / 100;
      cessrate = Math.round(cessrate * gst_decimal_rounding) / gst_decimal_rounding;
    }
    sell_inc = sell + igstrate + cessrate;
    if (cess_amount != "") {
      cess_amount = parseFloat(cess_amount);
      sell_inc = sell_inc + cess_amount;
    }
    sell_inc = Math.round(sell_inc * price_decimal_rounding) / price_decimal_rounding;
    $("#sellprice_incl_tax").val(sell_inc);
  }

});
$("#purchaseprice_incl_tax").on('keyup change blur', function () {
  var totaltax = 0;
  var purc = $("#purchaseprice").val();
  var purc_inc = $("#purchaseprice_incl_tax").val();
  var cgst = $("#cgst").val();
  var sgst = $("#sgst").val();
  var igst = $("#igst").val();
  var cess = $("#cess").val();
  var cess_amount = $("#cess_amount").val();

  if (purc_inc != "") {
    purc_inc = parseFloat(purc_inc);
    if (cess_amount != "") {
      cess_amount = parseFloat(cess_amount);
      purc_inc = purc_inc - cess_amount;
    }
    if (cgst != "" && sgst != "") {
      cgst = parseFloat(cgst);
      sgst = parseFloat(sgst);
      totaltax = totaltax + cgst + sgst;
    }
    else {
      if (igst != "") {
        igst = parseFloat(igst);
        totaltax = totaltax + igst;
      }
    }
    if (cess != "") {
      cess = parseFloat(cess);
      totaltax = totaltax + cess;
    }
    purc = (purc_inc * 100) / (100 + totaltax);
    purc = Math.round(purc * price_decimal_rounding) / price_decimal_rounding;
    $("#purchaseprice").val(purc);
  }
});
$("#purchaseprice,#igst,#cess").on('keyup change blur', function () {
  var totaltax = 0;
  var igstrate = 0;
  var cessrate = 0;
  var purc = $("#purchaseprice").val();
  var purc_inc = $("#purchaseprice_incl_tax").val();
  var cgst = $("#cgst").val();
  var sgst = $("#sgst").val();
  var igst = $("#igst").val();
  var cess = $("#cess").val();
  var cess_amount = $("#cess_amount").val();
  if (purc != "") {
    purc = parseFloat(purc);
    if (cgst != "" && sgst != "") {
      cgst = parseFloat(cgst);
      sgst = parseFloat(sgst);
      igstrate = (purc * (cgst + sgst)) / 100;
      igstrate = Math.round(igstrate * gst_decimal_rounding) / gst_decimal_rounding;
    }
    else {
      if (igst != "") {
        igstrate = (purc * igst) / 100;
        igstrate = Math.round(igstrate * gst_decimal_rounding) / gst_decimal_rounding;
      }
    }
    if (cess != "") {
      cessrate = (purc * cess) / 100;
      cessrate = Math.round(cessrate * gst_decimal_rounding) / gst_decimal_rounding;
    }
    purc_inc = purc + igstrate + cessrate;
    if (cess_amount != "") {
      cess_amount = parseFloat(cess_amount);
      purc_inc = purc_inc + cess_amount;
    }
    purc_inc = Math.round(purc_inc * price_decimal_rounding) / price_decimal_rounding;
    $("#purchaseprice_incl_tax").val(purc_inc);
  }
});	
