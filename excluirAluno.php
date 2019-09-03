<?php 
    include("conecta.php");
    
    $recid=$_GET["idexc"];

    mysqli_query($conexao, "DELETE FROM student WHERE IdStudent = $recid");
    
    header("location:listagemAlunos.php");

?>
