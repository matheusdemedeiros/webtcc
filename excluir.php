<?php 
    include("conecta.php");
    
    $recid=$_GET["idexc"];

    mysqli_query($conexao, "DELETE FROM aluno WHERE id = $recid");
    
    header("location:listagemAlunos.php");

?>
