jQuery(document).ready(function(){
  $("#login_link").click(function(){$("#login").css("display",'block');});
  $("#signup_link").click(function(){$("#signup").fadeIn();});
  $(".cross").click(function(){$("#login").css("display",'none');
  	$("#signup").css("display",'none');
});
  if (!$("#error").length==0) {$("#login").css("display",'block')
       $("#form").css("margin-top",'10px');}
});
