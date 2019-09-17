<?php 
    include("conecta.php");
    
    $recid=$_GET["idexc"];

    mysqli_query($conexao, "DELETE FROM area WHERE IdArea = $recid");
    
    header("location:listagemAreaAtuacao.php");

?>
