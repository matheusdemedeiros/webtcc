//JavaScript Document
function excluirAluno(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location = "excluir.php?idexc=" + recid
        alert("Cadastro excluido com sucesso!");
    }
}

function excluirArea(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location = "excluirAreaAtuacao.php?idexc=" + recid
        alert("Cadastro excluido com sucesso!");
    }
}
function excluirProfessorTCC(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location = "excluirProfessorTCC.php?idexc=" + recid
        alert("Cadastro excluido com sucesso!");
    }
}

function excluirOrientador(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location = "excluirOrientador.php?idexc=" + recid
        alert("Cadastro excluido com sucesso!");
    }
}
function excluirCurso(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location = "excluirCurso.php?idexc=" + recid
        alert("Cadastro excluido com sucesso!");
    }
}

