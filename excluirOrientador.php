<?php 
    include("conecta.php");
    
    $recid=$_GET["idexc"];

    mysqli_query($conexao, "DELETE FROM advisor WHERE IdAdvidor = $recid");
    
    header("location:listagemOrientadores.php");

?>
