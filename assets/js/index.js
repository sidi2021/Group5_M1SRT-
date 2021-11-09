
var buttonPartie = document.getElementById("add-partie");
var input = document.getElementById("partie");
var buttonQT = document.getElementById("add-question");
var inputQT = document.getElementById("question");
var ul = document.querySelector("ul#parties");

var num = 1;
var numQT = 1;
buttonPartie.addEventListener("click", function() {
  numQT = 1;
  var li = document.createElement("li");
  li.setAttribute("id", "partie-" + num);
  var partie = document.createElement("h3");
  partie.textContent = input.value;
  partie.setAttribute("style", "text-align:center;margin-top:20px;margin-bottom:40px;");
  li.appendChild(partie);
  var olQT = document.createElement("ol");
  li.appendChild(olQT)
  li.className = 'list-group-item outer';
  if (input.value !== "") {
    ul.appendChild(li);
  }
  input.value = "";
  num++;
})



buttonQT.addEventListener("click", function() {
  let num1 = num - 1
  var olQT = document.querySelector("#partie-" + num1 + " ol");
  olQT.className = "list-group list-group-numbered";
  var bQT = document.createElement("b");
  var spanQT = document.createElement("span");
  spanQT.setAttribute("style", "font-weight: 500; font-size: 10pt");
  spanQT.setAttribute("id", "span-" + numQT);
  var liQT = document.createElement("li");
  liQT.className = 'list-group-item inner';
  spanQT.textContent = inputQT.value;
  bQT.textContent = "Partie"+numQT+":       ";
  liQT.appendChild(bQT)
  liQT.appendChild(spanQT)
  if (inputQT.value !== "") {
    olQT.appendChild(liQT);
  }
  inputQT.value = "";
  numQT++;
})




$("#submit").click(function(e) {

  let parties = [];
  let len1 = document.querySelectorAll("ul#parties li.outer").length;
  for(var i = 1; i <= len1; i++){
    let questions = [];
    let len2 = document.querySelectorAll("ul#parties li#partie-" + i + " ol li.inner").length;
    for(var j = 1; j <= len2; j++){
      questions[j - 1] = document.querySelector("ul#parties li#partie-" + i + " ol li.inner span#span-" + j).innerText;
    }
    parties[i - 1] = questions;
  }
  $.ajax({
    type: 'POST',
    dataType: 'json',
    url: '/app/main.php',
    data: { 
      code: $('#code').val(), 
      titre: $('#titre').val(),
      date: $('#dateInput').val(),
      parties: parties,
    },
    success: function (data, status, xhr) {
        window.location.href = '/app/success.php';
        
    },
    error: function (jqXhr, textStatus, errorMessage) {
        window.location.href = '/app/success.php';
        
    } 
});
})
