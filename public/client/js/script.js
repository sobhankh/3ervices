var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
      document.getElementById('panel').style.transition = "all 2s";
    } else {
      panel.style.display = "block";
      document.getElementById('panel').style.transition = "all 2s";
    }
  });
}
function show() {
  var btn = (document.getElementById("btn").style.display = "none");
  var ostan = (document.getElementById("ostan").style.display = "flex");
}