function number2text_with_currency(value, currency = "INR") {
    var fraction = Math.round(frac(value) * 100);
    var f_text = "";
    if (fraction > 0) {
        f_text = "AND " + convert_number(fraction) + " " + cur_decimal[currency];
    }
    return convert_number(value) + " " + cur_main[currency] + " " + f_text + " ONLY";
}



function number2text(value) {
    var fraction = Math.round(frac(value) * 100);
    var f_text = "";
    if (fraction > 0) {
        f_text = "AND " + convert_number(fraction) + " PAISA";
    }
    return convert_number(value) + " RUPEES " + f_text + " ONLY";
}

function frac(f) {
    return (f % Math.floor(f));
}

function convert_number(number) {
    if ((number < 0) || (number > 999999999)) {
        return "NUMBER OUT OF RANGE!";
    }
    var Gn = Math.floor(number / 10000000); /* Crore */
    number -= Gn * 10000000;
    var kn = Math.floor(number / 100000); /* lakhs */
    number -= kn * 100000;
    var Hn = Math.floor(number / 1000); /* thousand */
    number -= Hn * 1000;
    var Dn = Math.floor(number / 100); /* Tens (deca) */
    number = number % 100; /* Ones */
    var tn = Math.floor(number / 10);
    var one = Math.floor(number % 10);
    var res = "";
    if (Gn > 0) {
        res += (convert_number(Gn) + " CRORE");
    }
    if (kn > 0) {
        res += (((res == "") ? "" : " ") + convert_number(kn) + " LAKH");
    }
    if (Hn > 0) {
        res += (((res == "") ? "" : " ") + convert_number(Hn) + " THOUSAND");
    }
    if (Dn) {
        res += (((res == "") ? "" : " ") + convert_number(Dn) + " HUNDRED");
    }
    var ones = Array("", "ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX", "SEVEN", "EIGHT", "NINE", "TEN", "ELEVEN", "TWELVE", "THIRTEEN", "FOURTEEN", "FIFTEEN", "SIXTEEN", "SEVENTEEN", "EIGHTEEN", "NINETEEN");
    var tens = Array("", "", "TWENTY", "THIRTY", "FORTY", "FIFTY", "SIXTY", "SEVENTY", "EIGHTY", "NINETY");
    if (tn > 0 || one > 0) {
        if (!(res == "")) {
            res += " AND ";
        }
        if (tn < 2) {
            res += ones[tn * 10 + one];
        } else {
            res += tens[tn];
            if (one > 0) {
                res += ("-" + ones[one]);
            }
        }
    }
    if (res == "") {
        res = "ZERO";
    }
    return res;
}

var pre_gst_rate;
var price_decimal_rounding = 100;
var gst_decimal_rounding = 100;
var gst_rate_decimal_rounding = 100;
function product_calculation(selector) {


    var category_selector = $(selector + ' .category');
    var product_type_selector = $(selector + ' .product_type');
    var name_selector = $(selector + ' .name');
    var unit_selector = $(selector + ' .unit');
    var sell_price_selector = $(selector + ' .sell_price');
    var sell_price_tax_selector = $(selector + ' .sell_price_tax');
    var sell_price_label_selector = $(selector + ' .sell_price_label');
    var sell_price_tax_label_selector = $(selector + ' .sell_price_tax_label');
    var sell_price_original_selector = $(selector + ' .sell_price_original');

    var purchase_price_selector = $(selector + ' .purchase_price');
    var purchase_price_tax_selector = $(selector + ' .purchase_price_tax');
    var purchase_price_label_selector = $(selector + ' .purchase_price_label');
    var purchase_price_tax_label_selector = $(selector + ' .purchase_price_tax_label');
    var purchase_price_original_selector = $(selector + ' .purchase_price_original');


    var gst_rate_selector = $(selector + ' .gst_rate');
    var hsn_code_selector = $(selector + ' .hsn_code');
    var item_code_selector = $(selector + ' .item_code');
    var stock_selector = $(selector + ' .stock');
    var sell_dropdown_selector = $(selector + ' .sell-dropdown');
    var purchase_dropdown_selector = $(selector + ' .purchase-dropdown');

    var category = category_selector.val();
    var product_type = product_type_selector.val();
    var name = name_selector.val();
    var unit = unit_selector.val();
    var sell_price = sell_price_selector.val();
    var sell_price_original = sell_price_original_selector.val();
    var sell_price_tax = sell_price_tax_selector.val();
    var sell_price_label = sell_price_tax_label_selector.html();
    var sell_price_tax_label = sell_price_tax_label_selector.html();

    var purchase_price = purchase_price_selector.val();
    var purchase_price_original = purchase_price_original_selector.val();
    var purchase_price_tax = purchase_price_tax_selector.val();
    var purchase_price_label = purchase_price_label_selector.html();
    var purchase_price_tax_label = purchase_price_tax_label_selector.html();


    var gst_rate = gst_rate_selector.val();
    var hsn_code = hsn_code_selector.val();
    var item_code = item_code_selector.val();
    var stock = stock_selector.val();
    var sell_dropdown = sell_dropdown_selector.html();
    var purchase_dropdown = purchase_dropdown_selector.html();


    if (gst_rate != '') {
        pre_gst_rate = gst_rate;

    }

    // // console.log(category);
    if (category != 'taxable') {
        gst_rate_selector.attr('disabled', true);
        gst_rate_selector.val('');
        gst_rate = gst_rate_selector.val();
        sell_price_tax_label_selector.children('span').html('');
        sell_dropdown_selector.addClass('disabled')
        purchase_dropdown_selector.addClass('disabled')
        sell_price_tax_selector.children('span').val(0);
        sell_price_label_selector.children('span').html('');
        purchase_price_tax_selector.val(0);
        purchase_price_tax_label_selector.children('span').html('');
        purchase_price_label_selector.children('span').html('');
    } else {
        gst_rate_selector.attr('disabled', false);
        gst_rate_selector.val(pre_gst_rate);
        sell_dropdown_selector.removeClass('disabled');
        purchase_dropdown_selector.removeClass('disabled');
        // gst_rate = gst_rate_selector.val();
    }

    // if(gst_rate)
    if (gst_rate != '') {
        pre_gst_rate = gst_rate;
        if (gst_rate != 'nill' && gst_rate != 'zero') {
            if (sell_price != '') {

                if (sell_dropdown == 'Including Tax') {
                    // var tax_sell = (sell_price * gst_rate) / 100;

                    // Updated Taxs Cacluation Method
                    var new_price = sell_price
                    var new_gst = Math.floor(gst_rate);
                    var gst_new = 100 / (100 + new_gst)
                    var tax_sell = new_price * gst_new

                    // var product_sale_price = parseFloat(sell_price) - parseFloat(tax_sell);

                    var product_sale_price = parseFloat(tax_sell).toFixed(2);
                    sell_price_tax_selector.val(sell_price);
                    sell_price_original_selector.val(product_sale_price);
                    if (product_sale_price != '' || product_sale_price != 0) {
                        sell_price_tax_label_selector.removeClass('d-none');
                        sell_price_label_selector.removeClass('d-none');
                        sell_price_tax_label_selector.children('span').html(sell_price);
                        sell_price_label_selector.children('span').html(product_sale_price);
                    } else {
                        sell_price_tax_label_selector.addClass('d-none');
                        sell_price_label_selector.addClass('d-none');
                        sell_price_tax_label_selector.children('span').html('');
                        sell_price_label_selector.children('span').html('');
                    }
                } else {
                    var tax_sell = (sell_price * gst_rate) / 100;
                    var prdct_tax_sale_price = parseFloat(sell_price) + parseFloat(tax_sell);
                    var product_tax_sale_price = parseFloat(prdct_tax_sale_price).toFixed(2);
                    sell_price_tax_selector.val(sell_price);
                    sell_price_original_selector.val(product_sale_price);
                    if (product_tax_sale_price != '' || product_tax_sale_price != 0) {
                        sell_price_tax_label_selector.removeClass('d-none');
                        sell_price_label_selector.removeClass('d-none');
                        sell_price_tax_label_selector.children('span').html(product_tax_sale_price);
                        sell_price_label_selector.children('span').html(sell_price);
                    } else {
                        sell_price_tax_label_selector.addClass('d-none');
                        sell_price_label_selector.addClass('d-none');
                        sell_price_tax_label_selector.children('span').html('');
                        sell_price_label_selector.children('span').html('');
                    }
                }


            }
            if (purchase_price != '') {

                if (purchase_dropdown == 'Including Tax') {
                    // var tax_purchase = (purchase_price * gst_rate) / 100;
                    // Updated Cacluation Method
                    var new_purchase_price = purchase_price
                    var new_gst = Math.floor(gst_rate);
                    var gst_new = 100 / (100 + new_gst)
                    var tax_purchase = new_purchase_price * gst_new

                    // var product_purchase_price = parseFloat(purchase_price) - parseFloat(tax_purchase);
                    var product_purchase_price = parseFloat(tax_purchase).toFixed(2);
                    purchase_price_tax_selector.val(purchase_price);
                    purchase_price_original_selector.val(product_purchase_price);
                    if (product_purchase_price != '' || product_purchase_price != 0) {
                        purchase_price_tax_label_selector.removeClass('d-none');
                        purchase_price_label_selector.removeClass('d-none');
                        purchase_price_tax_label_selector.children('span').html(purchase_price);
                        purchase_price_label_selector.children('span').html(product_purchase_price);

                    } else {
                        purchase_price_tax_label_selector.addClass('d-none');
                        purchase_price_label_selector.addClass('d-none');
                        purchase_price_tax_label_selector.children('span').html();
                        purchase_price_label_selector.children('span').html();

                    }
                } else {
                    var tax_purchase = (purchase_price * gst_rate) / 100;
                    var product_purchase_price = parseFloat(purchase_price) + parseFloat(tax_purchase);
                    purchase_price_tax_selector.val(product_purchase_price);
                    purchase_price_original_selector.val(purchase_price);

                    if (product_purchase_price != '' || product_purchase_price != 0) {
                        purchase_price_tax_label_selector.removeClass('d-none');
                        purchase_price_label_selector.removeClass('d-none');
                        purchase_price_tax_label_selector.children('span').html(product_purchase_price);
                        purchase_price_label_selector.children('span').html(purchase_price);

                    } else {
                        purchase_price_tax_label_selector.addClass('d-none');
                        purchase_price_label_selector.addClass('d-none');
                        purchase_price_tax_label_selector.children('span').html();
                        purchase_price_label_selector.children('span').html();
                    }

                }



            }
        } else {
            purchase_price_tax_selector.val(0);
            purchase_price_tax_label_selector.children('span').html();
            purchase_price_label_selector.children('span').html();
            sell_price_tax_selector.val(0);
            sell_price_tax_label_selector.children('span').html('');
            sell_price_label_selector.children('span').html('');
        }
    } else {
        purchase_price_tax_selector.val(0);
        purchase_price_tax_label_selector.children('span').html();
        purchase_price_label_selector.children('span').html();
        sell_price_tax_selector.val(0);
        sell_price_tax_label_selector.children('span').html('');
        sell_price_label_selector.children('span').html('');
    }
}
