
$('#btnAvenger').click(function (e) {
    $('select').moveToList('#StaffList', '#PresenterList');
    e.preventDefault();
  });
  
  $('#btnRemoveAvenger').click(function (e) {
    $('select').removeSelected('#PresenterList');
    e.preventDefault();
  });
  
  $('#btnAvengerUp').click(function (e) {
    $('select').moveUpDown('#PresenterList', true, false);
    e.preventDefault();
  });
  
  $('#btnAvengerDown').click(function (e) {
    $('select').moveUpDown('#PresenterList', false, true);
    e.preventDefault();
  });
  
  $('#btnShield').click(function (e) {
    $('select').moveToList('#StaffList', '#ContactList');
    e.preventDefault();
  });
  
  $('#btnRemoveShield').click(function (e) {
    $('select').removeSelected('#ContactList');
    e.preventDefault();
  });
  
  $('#btnShieldUp').click(function (e) {
    $('select').moveUpDown('#ContactList', true, false);
    e.preventDefault();
  });
  
  $('#btnShieldDown').click(function (e) {
    $('select').moveUpDown('#ContactList', false, true);
    e.preventDefault();
  });
  
  $('#btnJusticeLeague').click(function (e) {
    $('select').moveToList('#StaffList', '#FacilitatorList');
    e.preventDefault();
  });
  
  $('#btnRemoveJusticeLeague').click(function (e) {
    $('select').removeSelected('#FacilitatorList');
    e.preventDefault();
  });
  
  $('#btnJusticeLeagueUp').click(function (e) {
    $('select').moveUpDown('#FacilitatorList', true, false);
    e.preventDefault();
  });
  
  $('#btnJusticeLeagueDown').click(function (e) {
    $('select').moveUpDown('#FacilitatorList', false, true);
    e.preventDefault();
  });
  
  $('#btnRight').click(function (e) {
    $('select').moveToListAndDelete('#lstBox1', '#lstBox2');
    e.preventDefault();
  });
  
  $('#btnAllRight').click(function (e) {
    $('select').moveAllToListAndDelete('#lstBox1', '#lstBox2');
    e.preventDefault();
  });
  
  $('#btnLeft').click(function (e) {
    $('select').moveToListAndDelete('#lstBox2', '#lstBox1');
    e.preventDefault();
  });
  
  $('#btnAllLeft').click(function (e) {
    $('select').moveAllToListAndDelete('#lstBox2', '#lstBox1');
    e.preventDefault();
  });

  function get_receipt_number(type='sale'){
    $.ajax({  
      type: "GET",  
      url: base_url+'/lastreceipt',  
      ContentType : 'application/json',
      dataType: 'json',
      data: {type},
      success: function(response){
          console.log(response);
        if(response.status=='1')
        {
          var data = response.data;
          if(data){
            // console.log('12');
            var receipt_number = parseInt(data.receipt_no) + 1;
            $('#receiptno').val(receipt_number);
          }else{
            $('#receiptno').val(1);
          }
        }
      },
      error: function(data){
      },
      complete: function(data){
      }
    });
  }

  function get_customer_detail(id,type,updateShipping  = true){
    var data = {id,type};
    $.ajax({  
      type: "GET",  
      url: base_url+'/customerlist',  
      ContentType : 'application/json',
      dataType: 'json',
      data: data,
      success: function(response){
        if(response.status=='1')
        {
          var data = response.data[0];
          // console.log(data);
          $(" #address").val(data.address1);
          $(".gstin_pan_label").html(data.pan);
          console.log(data.pan);
          if(data.pan){
            $(".gstin_pan_label").html(data.pan);
          }
        }
        else
        {
          // $(".customer_outstanding_value").html("").removeClass("btn-link");
        }
      },
      error: function(data){
      },
      complete: function(data){
      }
    });
  }

  function get_invoice_list(id,type){
    var data = {id,type};

    $.ajax({  
      type: "GET",  
      url: base_url+'/invoicelist',  
      ContentType : 'application/json',
      dataType: 'json',
      data: data,
      success: function(response){
        if(response.status=='1')
        {
          $('#lstBox1').html('');
          var data = response.data;
          $.each(data,function(key,value){
            if(value.payment > 0){
              $('#lstBox1').append('<option value="'+value.id+'" data-amount="'+value.payment+'">'+value.invoice_number+"- "+ value.payment+'</option>');
            }
          });
          // $(" #address").val(data.address1);
          // $("#gstin_pan").val(data.gstin_pan);
        }
        else
        {
          // $(".customer_outstanding_value").html("").removeClass("btn-link");
        }
      },
      error: function(data){
      },
      complete: function(data){
      }
    });
  }