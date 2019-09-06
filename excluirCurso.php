<?php 
    include("conecta.php");
    
    $recid=$_GET["idexc"];

    mysqli_query($conexao, "DELETE FROM course WHERE IdCourse = $recid");
    
    header("location:listagemCurso.php");

?>
