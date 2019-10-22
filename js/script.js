//JavaScript Document
function excluirAluno(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location = "excluirAluno.php?idexc=" + recid;
       
    }
}

function excluirArea(recid) {
  
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location = "excluirAreaAtuacao.php?idexc=" + recid;
      
    }
}
function excluirProfessorTCC(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location = "excluirProfessorTCC.php?idexc=" + recid;
        alert("Cadastro excluido com sucesso!");
    }
}

function excluirOrientador(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location = "excluirOrientador.php?idexc=" + recid;
       
    }
}
function excluirCurso(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location = "excluirCurso.php?idexc=" + recid;
       
    }
}
function excluirTCC(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location="excluirTCC.php?idexc=" + recid;
        alert("Excluído com sucesso!");
    }
}
function excluirTCCAluno(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location="excluirTCCAluno.php?idexc=" + recid;
        alert("Excluído com sucesso!");
    }
}
function excluirTCCOrientador(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este cadastro?")) {
        window.location="excluirTCCOrientador.php?idexc=" + recid;
        alert("Excluído com sucesso!");
    }
}

function excluirFormularioAcompanhamento(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este fromulario?")) {
        window.location="excluirFormularioAcompanhamento.php?idexc=" + recid;
        alert("Excluído com sucesso!");
    }
    
}
function excluirFormularioAcompanhamentoAluno(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este fromulario?")) {
        window.location="excluirFormularioAcompanhamentoAluno.php?idexc=" + recid;
        alert("Excluído com sucesso!");
    }
}
function excluirFormularioAcompanhamentoOrientador(recid) {
    if (confirm("Tem certeza de que deseja excluir permanentemente este fromulario?")) {
        window.location="excluirFormularioAcompanhamentoOrientador.php?idexc=" + recid;
        alert("Excluído com sucesso!");
    }
}
