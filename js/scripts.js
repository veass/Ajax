
//  ajax
const regular_email = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const regular_name = /[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/\d\s]/;

$('.sendemail').click(function(event) {
  event.preventDefault();

  let e_email= $("#email");
  let e_name = $("#name");
  let email = e_email.val();
  let name = e_name.val();
  let message = $("#textarea").val();
  
  if(regular_email.test(email) && !regular_name.test(name)){
    $.ajax({
      method: "POST",
      url: '../form.php',
      data: {
        email: email,
        message: message,
        name: name
      },                              
      success: function(response) {  
        $('.info__elements').append(response);
        if(response == 3 || response == 4){
          e_name.addClass('is-invalid');
        }
        if(response) {
          $('.sendemail span').text('Записано');
          $('.sendemail').prop("disabled",true)
          setTimeout(function(){$('.sendemail span').text('Записать');$('.sendemail').prop("disabled",false)}, 3000)
        }

      }
    });
    
  }
})


//  dynamic validation

$('#email').on('input', function(){
  if(regular_email.test($(this).val())) {
    $(this).removeClass('is-invalid')
    $(this).addClass('is-valid')
  }
  else {
    $(this).removeClass('is-ivalid')
    $(this).addClass('is-invalid')
  }
})

$('#name').on('input', function(){
  if(!regular_name.test($(this).val()) && $('#name').val() != '')  {
    $(this).removeClass('is-invalid')
    $(this).addClass('is-valid')
  }
  else {
    $(this).removeClass('is-ivalid')
    $(this).addClass('is-invalid')
  }
})