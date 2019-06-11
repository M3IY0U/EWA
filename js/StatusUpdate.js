var request = new XMLHttpRequest();

//Daten Anfragen Client --> Server
function requestData() {
    request.open("GET", "kundenstatus.php", true);  //URL für HTTP GET
    request.onreadystatechange = processData; //Callback-Handler zuordnen
    request.send(null);
}


//Handler für zurück kommenden Daten
function processData() {
    if (request.readyState == 4) {  //Übertragung = DONE
        if (request.status == 200) {  //HTTP-Status = OK
            if (request.responseText != null) {
                process(request.responseText);  //Daten Verarbeiten
            } else {
                console.error("Dokument ist leer");
            }
        } else {
            console.error("Fehler bei Datenübertragung");
        }
    } else {
        console.log("Übertragung läuft noch");
    }
}

window.onload = function process() {
    window.setInterval(requestData, 2000);
}

function process(jsonResponse) {
    "use strict";
    const jsonobj = JSON.parse(jsonResponse);
    createStatus(jsonobj);
}

function createStatus(jsonobj) {
    "use strict";
    var statushtml = document.getElementsByClassName("Status");
    for (var i = 0; i < jsonobj.length; i++) {
        statushtml[i].textContent = jsonobj[i].status;
    }
}