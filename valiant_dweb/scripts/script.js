// Student Names: Ronquillo, Michael Arnold, De Guzman, John Yuri, Laurel, Andrei Jovic
// script.js
// April 2024

// Hamburger Menu Function
function myFunction() {
    var menu = document.getElementById("menu-links");
    var logo = document.getElementById("valiant-logo-mobile");
    if (menu.style.display === "block"&& logo.style.display === "none") {
      menu.style.display = "none";
      logo.style.display= "block";
    } else {
      menu.style.display = "block";
      logo.style.display= "none";
    }
  }


  var video = document.getElementById("valiant-video");
  var btn = document.getElementById("vidBtn");
  
  function vidFunction() {
    if (video.paused) {
      video.play();
      btn.innerHTML = "Pause";
    } else {
      video.pause();
      btn.innerHTML = "Play";
    }
  }

// Function to display valiant motto
function motto(){
    var motto = document.getElementById("truly");
    motto.firstChild.nodeValue = "Truly Valiant";
    motto.style.color="#fcc200";
    motto.style.fontSize = "1em";
}

// Function to display valiant / HAU address
function address(){
  var address = document.getElementById("add");
  address.firstChild.nodeValue = "#1 Holy Angel Avenue, Sto. Rosario, Angeles City, Philippines 2009";
  address.style.color="#fcc200";
  address.style.fontSize = "1em";
}

document.getElementById('loginButton').addEventListener('click', function() {
  var loginForm = document.getElementById('loginForm');
  if (loginForm.style.display === 'block') {
      loginForm.style.display = 'none';
  } else {
      loginForm.style.display = 'block';
  }
});