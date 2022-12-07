var nameError = document.getElementById("name-error");
var emailError = document.getElementById("email-error");
var passwordError = document.getElementById("password-error");
var cpasswordError = document.getElementById("cpassword-error");

function validateName() {
  var name = document.getElementById("contact-name").value;
  if (name.length === 0) {
    nameError.innerHTML = "Name is required";
    return false;
  }

  nameError.innerHTML = '<i class="fa fa-check-circle"></i>';
  return true;
}
function validateEmail() {
  var email = document.getElementById("contact-email").value;
  var up = document.getElementById("email-label");

  onload = () => {
    up.style.transform = "translateY(-23px)";
  };

  if (email.length == 0) {
    emailError.innerHTML = "Email is required";
  }
  if (!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
    emailError.innerHTML = "Email is Invalid";
    return false;
  }
  emailError.innerHTML = '<i class="fa fa-check-circle"></i>';
  return true;
}

function validatePassword() {
  var password1 = document.getElementById("pass1").value;

  if (password1.length < 8) {
    passwordError.innerHTML = "Password must be at least 8 characters";
    return false;
  }
  if (password1 === "") {
    passwordError.innerHTML = "Password can not be empty";
    return false;
  }

  passwordError.innerHTML = '<i class="fa fa-check-circle"></i>';
  return true;
}
function validatePassword2() {
  var password1 = document.getElementById("pass1").value;
  var password2 = document.getElementById("pass2").value;
  if (password2 !== password1) {
    cpasswordError.innerHTML = "Password must be the same";
    return false;
  }
  cpasswordError.innerHTML = '<i class="fa fa-check-circle"></i>';
  return true;
}
