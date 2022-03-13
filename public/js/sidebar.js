// const body = document.querySelector('body'),
//       sidebar = body.querySelector('.sidebar'),
//       toggle = body.querySelector(".toggle"),
//     //   searchBtn = body.querySelector(".search-box"),
//       modeSwitch = body.querySelector(".toggle-switch"),
//       modeText = body.querySelector(".mode-text");


// toggle.addEventListener("click" , () =>{
//     sidebar.classList.toggle("close");
// })

// // searchBtn.addEventListener("click" , () =>{
// //     sidebar.classList.remove("close");
// // })

// modeSwitch.addEventListener("click" , () =>{
//     body.classList.toggle("dark");
    
//     if(body.classList.contains("dark")){
//         modeText.innerText = "Light mode";
//     }else{
//         modeText.innerText = "Dark mode";
        
//     }
// });

$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});

jQuery(function($) {
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $('ul a').each(function() {
     if (this.href === path) {
      $(this).addClass('active');
     }
    });
   })