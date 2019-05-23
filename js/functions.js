let basket = new Array;
let sum = 0.0;
function addToBasket(arg) {
    "use strict";
    let pItem = JSON.parse(arg);
    basket.push(pItem);
    sum += parseFloat(pItem["price"]);
    let warenkorb = document.getElementById("wk");
    var opt = document.createElement('option');
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
}

function updateSum() {
    "use strict";
    sum = 0.0;
    basket.forEach(element => {
        sum += parseFloat(element["price"])
    });

    let sumField = document.getElementById("sumField");
    sumField.innerText = "Total: " + sum.toFixed(2) + "€";
}

function isValidForm(){
    if(document.getElementById("adr").value==""){
        alert("Keine Adresse angegeben!");
        return false;
    }
    if(basket.length==0){
        alert("Es befindet sich nichts im Warenkorb!");
        return false;
    }
    return true;
}

document.addEventListener('keyup', function (e) {
    'use strict';
    var adr = document.getElementById('adr');
    var plz = document.getElementById('plz');
    var name = document.getElementById('name');
    var submitButton = document.getElementById('send');
    let select = document.getElementById("wk");

    if (adr.value.length <= 0 | plz.value.length <= 0 || name.value.length <= 0 || select.options.length <= 0) {
      submitButton.disabled = true;
    } else {
      submitButton.disabled = false;
    }
  });
