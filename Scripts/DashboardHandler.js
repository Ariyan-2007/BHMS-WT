var popup = document.getElementById("pop");

var button = document.getElementById("postButton");

var span = document.getElementsByClassName("close")[0];


    button.onclick = function() { popup.style.display = "block"; address.style.display = "none";  }

    span.onclick = function() { popup.style.display = "none"; }

    window.onclick = function(event) { if (event.target == popup) { popup.style.display = "none"; } }
