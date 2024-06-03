const buttonExcluir = document.getElementsByClassName("buttonExcluir");
const buttonVisualizar = document.getElementsByClassName("buttonVisualizar");
if (buttonExcluir) {
    function redirectButtonVisualizar($turma) {
        window.location.href = `?pagina=turma&turma=${$turma}`;
    }
    function redirectButtonExcluir($turma) {
        window.location.href = `?pagina=home&metodo=deleteTurma&turma=${$turma}`;
    }
}

const idAtividade = document.getElementsByClassName("idAtividade");
const idTurma = document.getElementsByClassName("idTurma");
if (idAtividade) {
    for (var i = 0; i < idAtividade.length; i++) {
        idAtividade[i].innerHTML = `${i + 1}`;
    }
    for (var i = 0; i < idTurma.length; i++) {
        idTurma[i].innerHTML = `${i + 1}`;
    }
}style.css
