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
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': csrf_token
        //     }
        // });
        
        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_url+'/create_customer',
            data: $('#add-customer-form').serialize(),
            headers: {'X-CSRF-TOKEN': csrf_token},
            success: function(data){
                if(data.status == 1){
                    var newState = new Option(data.data.name, data.data.id, true, true);
                    // Append it to the select
                    $("#customers").append(newState).trigger('change');
                    $('#add-customer-form')[0].reset();
                    $('#customerModal').modal('hide');
                }else{
                    toastr.error(data.message);
                }
              
            }
        });
    }
  });


  $('#is_same_shipping').on('click',function(){
    var ischecked = $('#is_same_shipping').is(':checked'); 
    if(ischecked == false){
        $('.additional-info').removeClass('d-none');
    }else{
        $('.additional-info').addClass('d-none');
    }
  });


  // Tranport Modal Ajax 

  $('#create-transport-form').validate({
    errorElement: 'span',
    errorClass: 'text-danger text-right',
    rules: {
      trans_name: {
          required:true,
          lettersonly:true,
          maxlength:20,
          minlength:4
        },
        trans_vehicle_no:{
          regex:'^[A-Za-z\s]{2}[0-9\s]{1,2}[A-Za-z\s]{1,2}[0-9\s]{1,4}$'
        },
    },
    messages: {
      trans_name: {
        required: 'Please enter Name',
        lettersonly:'Name should be only characters'
      },
      trans_vehicle_no:{
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
    submitHandler: function (form) {
      var formData = $('#create-transport-form').serialize();
      $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url + '/create_transport', 
        data: formData,
        success: function (data) {
          if (data.status == 1) {
            var newState = new Option(data.data.name, data.data.id, true, true);
            $("#selecttransport").append(newState).trigger('change');
            $('#create-transport-form')[0].reset();
            $('#transportModal').modal('hide');
          } else {
            // console.log(data);
            toastr.error(data.message);
          }
        },
        error: function (xhr, status, error) {
          // console.log(xhr.responseText);
          toastr.error("An error occurred while making the request.");
        }
      });
    }
    
});


// Product Modal 

$('#create-product-form .category,#create-product-form .sell_price,#create-product-form .purchase_price, #create-product-form .gst_rate').on('keyup change blur',function(){
  var selector = "#create-product-form";
  product_calculation(selector);
});

// $('#create-product-form .sell-dropdown').on('change click blur ',function(){
//   console.log($(this).html());
// });

$('#create-product-form .sell-dropdown-option a').on('click', function(){
  
    $('#create-product-form .sell-dropdown').html($(this).html());
    var selector = "#create-product-form";
    product_calculation(selector);
});

$('#create-product-form .purchase-dropdown-option a').on('click', function(){
  
    $('#create-product-form .purchase-dropdown').html($(this).html());
    var selector = "#create-product-form";
    product_calculation(selector);
});


$('#create-product-form').validate({
  errorElement: 'span',
  errorClass: 'text-danger text-right',
  rules: {
      name: {
        required:true,
      },
      sell_price:{
        required:true,
        number:true
      },
      purchase_price:{
        number:true
      },
      stock:{
        digits:true
      }
  },
  messages: {
    name: {
        required: 'Please enter Product Name',
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
    // var product_id = $('#update-product-form .product_id').val(); 
    $.ajax({  
      type: "POST",  
      url: base_url+'/create_products/',  
      ContentType : 'application/json',
      dataType: 'json',
      data: $('#create-product-form').serialize(),
      success: function(response){
        if(response.status == 1){
          // var newProduct = new Option(response.data.name, response.data.id, false, false);
          var newProduct = new Option(response.data.name, response.data.id);
        // Append it to the select
          $("#document-item-list .product_id").append(newProduct);
          $('#create-product-form')[0].reset();
          $('#productModal').modal('hide');
          // console.log(response);
          // toastr.success(response.message);
          // document.location.href = base_url + '/products';
        }else{
          toastr.error(response.message);
        }
      }
    });
  }
});