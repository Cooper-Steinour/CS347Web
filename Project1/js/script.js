var d = new Date();
var time = d.getHours();
let time_greeting = document.getElementById("time_greeting");

if (time < 12) {
  time_greeting.innerHTML = "Good morning!";
}
if (time > 12 && time < 18) {
  time_greeting.innerHTML = "Good afternoon!";
}
if (time > 18) {
  time_greeting.innerHTML = "Good evening!";
}