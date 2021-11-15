document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
document.body.scrollTop = 0; // For Safari

window.onbeforeunload = function () {
  window.scrollTo(0, 0);
}

let trava = false;

document.getElementById("img").onclick = function() {
    if(!trava) {
        ativarMenu();
        trava = true;

    }else {
        desativarMenu();
        trava = false;
    }
};

function ativarMenu() {
  document.getElementById("nav").style.marginTop = "0%";
  document.getElementById("nav").style.position = "relative";

}

function desativarMenu() {
    document.getElementById("nav").style.marginTop = "-150%";
    document.getElementById("nav").style.position = "absolute";
  
  }