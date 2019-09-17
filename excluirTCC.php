<?php 
    include("conecta.php");
    
    $recid=$_GET["idexc"];

    mysqli_query($conexao, "DELETE FROM termpaper WHERE IdTermPaper = $recid");
    mysqli_query($conexao, "DELETE FROM advisortermpaper WHERE TermPaperId = $recid");
    mysqli_query($conexao, "UPDATE student SET termPaperId=NULL WHERE termPaperId = '$recid'");
    header("location:listagemTCC.php");
?>