
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function profileDropdown() {
  document.getElementById("profileDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  let profileDropdown = document.getElementById("profileDropdown");
    if (profileDropdown.classList.contains('show')) {
        profileDropdown.classList.remove('show');
    }
  }
}

function catDropdown() {
    document.getElementById("catDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
    let catDropdown = document.getElementById("catDropdown");
      if (catDropdown.classList.contains('show')) {
        catDropdown.classList.remove('show');
      }
    }
  }
