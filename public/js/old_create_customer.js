

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

      $('#create-customer-form').validate({
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
            city:{
              lettersonly:true,
              maxlength:35,
              minlength:4
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
          // $(form)[0].submit();
          $.ajax({
            type: "POST",
            dataType: "json",
            url: base_url+'/create_customer/',
            data: $('#create-customer-form').serialize(),
            success: function(data){
            //  console.log(data);
            if(data.status == 1){
            var newState = new Option(data.data.name, data.data.id, true, true);
            // Append it to the select
            $("#customers").append(newState).trigger('change');
            $('#create-customer-form')[0].reset();
            $('#exampleModal').modal('hide');
            }else{
                toastr.error(data.message);
            }
              
            }
        });
        }
    });

    $('#create-transport-form').validate({
      errorElement: 'span',
      errorClass: 'text-danger text-right',
      rules: {
        trans_name: {
            required:true,
            lettersonly:true,
            maxlength:20,
            minlength:4
          }
      },
      messages: {
        trans_name: {
            required: 'Please enter Name',
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
          error.appendTo(element.closest('.form-group'));
      },
      submitHandler: function(form) {
        // $(form)[0].submit();
        $.ajax({
          type: "POST",
          dataType: "json",
          url: base_url+'/create_transport/',
          data: $('#create-transport-form').serialize(),
          success: function(data){
          //  console.log(data);
          if(data.status == 1){
          var newState = new Option(data.data.name, data.data.id, true, true);
          // Append it to the select
          $("#selecttransport").append(newState).trigger('change');
            $('#create-transport-form')[0].reset();
            $('#transportModal').modal('hide');
          }else{
            console.log(data);
            toastr.error(data.message);
          }
            
          }
      });
      }
  });
