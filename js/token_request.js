//uncomment *** marked comments if you want to see the flow of process
//ajax function to get CSRF token for current session
function tokenRequest(cookie){
  //***alert("token request.js called");
  var c_data = cookie;
  //***alert("cookie value: "+ c_data);
  $.ajax({
    type: "POST",
    url: 'Token_Issuer.php',
    data: {cookieValue: c_data},
    dataType: 'HTML',
    success: function (test){
      //***alert(test);
      //set received CSRF token in hidden filed in Home.php page form
      document.getElementById("MyToken").setAttribute("value", test);
    },
    error: function(){
      alert("Invalid Token!!!");
    }
  });
}
