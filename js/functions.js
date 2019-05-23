let basket = new Array();
let sum = 0.0;
function addToBasket(arg) {
  "use strict";
  let pItem = JSON.parse(arg);
  basket.push(pItem);
  sum += parseFloat(pItem["price"]);
  let warenkorb = document.getElementById("wk");
  var opt = document.createElement("option");
  opt.value = pItem["name"];
  opt.innerText = pItem["name"];
  warenkorb.appendChild(opt);
  updateSum();
}

function submitOrder() {
  "use strict";
  let select = document.getElementById("wk");
  for (var i = 0; i < select.options.length; i++) {
    select.options[i].selected = true;
  }
}

function emptyBasket() {
  "use strict";
  let select = document.getElementById("wk");
  select.options.length = 0;
  sum = 0.0;
  basket = [];
  updateSum();
  updateSubmitButton();
}

function removeFromBasket() {
  "use strict";
  let select = document.getElementById("wk");
  for (var i = select.options.length - 1; i >= 0; i--) {
    if (select.options[i].selected) {
      select.remove(i);
      basket.splice(i, 1);
    }
  }
  updateSum();
  updateSubmitButton();
}

function updateSum() {
  "use strict";
  sum = 0.0;
  basket.forEach(element => {
    sum += parseFloat(element["price"]);
  });

  let sumField = document.getElementById("sumField");
  sumField.innerText = "Total: " + sum.toFixed(2) + "€";
}

function isValidForm() {
  if (document.getElementById("adr").value == "") {
    alert("Keine Adresse angegeben!");
    return false;
  }
  if (basket.length == 0) {
    alert("Es befindet sich nichts im Warenkorb!");
    return false;
  }
  return true;
}

document.addEventListener("click", function() {
    "use strict";
    updateSubmitButton();
});

function updateSubmitButton(){
    var options = document.getElementById("wk");
    var submitButton = document.getElementById("send");
    if(options.length <= 0)
    {
        submitButton.disabled = true;
        return;
    }
    else{
        submitButton.disabled = false;
    }
    var adr = document.getElementById("adr");
    var plz = document.getElementById("plz");
    var name = document.getElementById("name");
    var submitButton = document.getElementById("send");
    if (
      (adr.value.length <= 0) || (plz.value.length <= 0) ||
      name.value.length <= 0) {
      submitButton.disabled = true;
    } else {
      submitButton.disabled = false;
    }
}

document.addEventListener("keyup", function() {
  "use strict";
  updateSubmitButton();
});

function toggleMode() {
  if (document.body.style.backgroundColor != "ivory") {
    document.body.style.backgroundColor = "ivory";
    document.body.style.color = "black";
  } else {
    document.body.style.backgroundColor = "#121212";
    document.body.style.color = "white";
  }
}
