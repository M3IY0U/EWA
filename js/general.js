function toggleNav(){
    var bar = document.getElementById("headerright");
    if(bar.style.display=="none"){
        bar.style.display = "inherit";
    }else{
        bar.style.display = "none";
    }
}
document.addEventListener("keypress", function(e){
    e = e || window.event;
    if(e.keyCode==246){
        toggleNav();
    }
});