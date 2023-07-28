document.addEventListener("DOMContentLoaded", function() {
    var dropdownToggle = document.getElementById("prayerRequest");
    var menuItems = document.querySelector(".display-prayers");
  
    dropdownToggle.addEventListener("click", function() {
      menuItems.classList.toggle("open");
    });
    
  });