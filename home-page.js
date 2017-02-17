jQuery(document).ready(function(){
  //To fadein login popup
  $("#login_link").click(function(){$("#login").css("display",'block');});
  //to fadein signup popup
  $("#signup_link").click(function(){$("#signup").fadeIn();});
  //to fade out login and signup popup on clicking cross buttons
  $(".cross").click(function(){$("#login").css("display",'none');
  	$("#signup").css("display",'none');
});
  //to show login error
  if (!$("#error").length==0) {$("#login").css("display",'block')
       $("#form").css("margin-top",'10px');}

  //to prevent directly creating image
  if (!$("#login-first").length==0) {$("#login").css("display",'block');
       }
  //to show message of email alredy exist
  if (!$("#already").length==0) {
       	$("#signup-error").append('EmailId already Exist');
       	$("#signup").css("display",'block');
       }
});
