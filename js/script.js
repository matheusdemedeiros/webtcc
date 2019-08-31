//JavaScript Document
function excluiAluno(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location = "excluir.php?idexc=" + recid
        alert("Cadastro excluido com sucesso!");
    }
}

function excluiArea(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location = "excluirAreaAtuacao.php?idexc=" + recid
        alert("Cadastro excluido com sucesso!");
    }
}
