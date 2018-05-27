//User validation process
//Hard-Code values used for demonstartion.
function UserValidation() {
  var name = document.forms["loginForm"]["user_name"].value;
  var password = document.forms["loginForm"]["p_word"].value;

  if (name != "Test"  || password != "123"){
    alert("Incorrect username or password");
    return false;
  }
}
