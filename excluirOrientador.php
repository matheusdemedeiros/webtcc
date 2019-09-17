<?php 
    include("conecta.php");
    
    $recid=$_GET["idexc"];

    mysqli_query($conexao, "DELETE FROM advisor WHERE IdAdvisor = $recid");
    
    header("location:listagemOrientadores.php");

?>
