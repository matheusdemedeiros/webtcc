<?php 
    include("conecta.php");
    
    

    mysqli_query($conexao, "UPDATE student SET TermPaperId=NULL WHERE TermPaperId = '$recid'");
    mysqli_query($conexao, "DELETE FROM advisortermpaper WHERE TermPaperId = '$recid'");
    mysqli_query($conexao, "DELETE FROM studenttermpaper WHERE TermPaperId = '$recid'");
    mysqli_query($conexao, "DELETE FROM termpaper WHERE IdTermPaper = '$recid'");
   
    header("location:listagemTCCOrientador.php");
?>