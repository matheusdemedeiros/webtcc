//JavaScript Document
function verifica(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location = "excluir.php?idexc=" + recid
        alert("Cadastro excluido com sucesso!");
    }
}
