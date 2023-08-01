function showMesssage(status, messageContent) {
    var messEl = document.getElementById("toast");
    if(status) {
        messEl.className = "show style-success";
        setTimeout(function(){ messEl.className = messEl.className.replace("show style-success", ""); }, 5000);
    }
    else {
        messEl.className = "show style-error";
        setTimeout(function(){ messEl.className = messEl.className.replace("show style-error", ""); }, 5000);
    }
    messEl.querySelector('#desc').innerText = messageContent;
}