<?php 
    include("conecta.php");
    
    $recid=$_GET["idexc"];

    mysqli_query($conexao, "DELETE FROM formtermpaper WHERE IdFormTermPaper = '$recid'");
    
    header('Location:listagemTCC.php');

?>