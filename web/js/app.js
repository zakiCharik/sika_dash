// route : client_new
// Creating user before persisting the client
//Please do not change ids

//---- Function to render 
function randString(id){
  var dataSet = $(id).attr('data-character-set').split(',');  
  var possible = '';
  if($.inArray('a-z', dataSet) >= 0){
    possible += 'abcdefghijklmnopqrstuvwxyz';
  }
  if($.inArray('A-Z', dataSet) >= 0){
    possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  }
  if($.inArray('0-9', dataSet) >= 0){
    possible += '0123456789';
  }
  if($.inArray('#', dataSet) >= 0){
    possible += '![]{}()%&*$#^<>~@|';
  }
  var text = '';
  for(var i=0; i < $(id).attr('data-size'); i++) {
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  }
  return text;
}    

//---- Function on click generate password and append it in the input zone
$('#_to-generate-pass').on('click',function(){
	// var input = $('#_generated-password');
	var input = $('#apisikabundle_client_user_password');
	console.log(input);
	input.val(randString($(this)));
});

//---- Function on change feed the inpu email in the user form
$('input#apisikabundle_client_email').keyup(function(){
	//first part is the email input
	var inputEm = $("input#apisikabundle_client_email");
	console.log(inputEm[0].value);
	var input = $('#apisikabundle_client_user_login');
	input.val(inputEm[0].value);
	// and then 
	var input = $('#apisikabundle_client_user_password');
	input.val(randString($('#_to-generate-pass')));

});

//---- UI design Change the icon and the type of the input to show password
// $('#_generated-password-change').on('click',function(){
// 	var input = $('#apisikabundle_client_user_password');
// 	if (input.attr('type') == 'password' ){
// 		input.attr('type', 'text');
// 		$(this).children().attr('class','fa fa-eye');
// 	}else{
// 		input.attr('type', 'password');
// 		$(this).children().attr('class','fa fa-eye-slash');		
// 	}
// });

//---- Async call to save user and get the id form last persist
