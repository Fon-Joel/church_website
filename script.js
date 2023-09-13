    document.addEventListener("DOMContentLoaded", function() {
    var dropdownToggle = document.querySelector(".drop-down-toggle-icon");
    var menuItems = document.querySelector(".menu-items");
  
    dropdownToggle.addEventListener("click", function() {
      menuItems.classList.toggle("open");
    });
    
  });
  document.addEventListener("DOMContentLoaded", function() {
    var currentPage = location.pathname;
    var links = document.querySelectorAll("nav a");
    
    links.forEach(function(link) {
      if (link.getAttribute("href") === currentPage) {
        link.classList.add("active");
      }
    });
  
  });
