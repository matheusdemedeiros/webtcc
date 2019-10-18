<?php 
    include("conecta.php");
    
    $recid=$_GET["idexc"];

    mysqli_query($conexao, "DELETE FROM formtermpaper WHERE TermPaperId = '$recid'");
    mysqli_query($conexao, "DELETE FROM advisortermpaper WHERE TermPaperId = '$recid'");
    mysqli_query($conexao, "DELETE FROM studenttermpaper WHERE TermPaperId = '$recid'");
    mysqli_query($conexao, "DELETE FROM termpaper WHERE IdTermPaper = '$recid'");
   
    header("location:listagemTCC.php");
?>