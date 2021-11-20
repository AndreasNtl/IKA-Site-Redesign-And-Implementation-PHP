var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "inline-block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}