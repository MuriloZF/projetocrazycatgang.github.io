function modoNoturno() {
    var element = document.body;
    element.classList.toggle("modoNoturno");
    const button = document.querySelector("button");
    if (button.innerText === "Modo Escuro") {
        button.innerText = "Modo Claro";
    } else {
        button.innerText = "Modo Escuro";
    }
}

function iniciarFormulario(){
    document.getElementById('apresentacao').style.display = 'none';
    document.getElementById('formulario').style.display = 'block';
}