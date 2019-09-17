<?php 
    include("conecta.php");
    
    $recid=$_GET["idexc"];

    mysqli_query($conexao, "DELETE FROM termpaperteacher WHERE IdTermPaperTeacher = $recid");
    
    header("location:listagemProfessorTCC.php");

?>
