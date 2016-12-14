// formulaire d'inscription
$(function(){

  var form =$('#signup');
  var pseudo = $('#nom');
  var password = $('#password');

form.on('submit', function(e){
  e.preventDefault();

  var hasError = false;

  if (pseudo.val() === '') {
    pseudo.addClass('error');
    hasError = true;
  }
  if (password.val() === '') {
    password.addClass('error');
    hasError = true;
  }

  if (!hasError) {
    (this).submit();
  }
});
  pseudo.on('change',onChange);
  password.on('change',onChange);

});

function onChange(){
  var texte = $(this);

  if (texte.val() === '') {
    texte.addClass('error');
  } else {
    texte.removeClass('error');
  }
}

// formulaire de connection

$(function(){

  var formlog =$('#login');
  var pseudolog = $('#pseudo');
  var passlog = $('#passlog');

formlog.on('submit', function(e){
  e.preventDefault();

  var hasError = false;

  if (pseudolog.val() === '') {
    pseudolog.addClass('error');
    hasError = true;
  }
  if (passlog.val() === '') {
    passlog.addClass('error');
    hasError = true;
  }

  if (!hasError) {
    (this).submit();
  }
});
  pseudolog.on('change',onChange);
  passlog.on('change',onChange);

});
