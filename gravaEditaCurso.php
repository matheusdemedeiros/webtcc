<?php 
    include("conecta.php");
    
    $recid = $_POST['fid'];
    $recnome = $_POST['nome'];
    

    mysqli_query($conexao, "update course set NameCourse='$recnome' where IdCourse='$recid'");
    header("location:listagemCurso.php");
?>
