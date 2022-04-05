/*D4 requirement (global variables)*/
var d = new Date();
var time = d.getHours();

if (time < 12) {
  document.getElementById("time_greeting").innerHTML = "Good morning from CS347!";
}
else if (time >= 12 && time < 18) {
  document.getElementById("time_greeting").innerHTML = "Good afternoon from CS347!";
}
else if (time >= 18) {
  document.getElementById("time_greeting").innerHTML = "Good evening from CS347!";
}

function validatePassword() {
	/*D3 requirement (local variable*/
	var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
	var x = document.myForm.pass.value;
	if (!re.test(x)) {
		alert("Password must have at least 8 letters, 1 number, upper and lower case letters.");
		return false;
	}

}

