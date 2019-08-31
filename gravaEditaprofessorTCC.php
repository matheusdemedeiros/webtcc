<?php 
    include("conecta.php");
    
    $recid = $_POST['fid'];
    $recnome = $_POST['nome'];
    $recemail = $_POST['email'];
    $recsenha = $_POST['password'];

    mysqli_query($conexao, "update termpaperteacher set NameTermPaperTeacher='$recnome',Email='$recemail', Password='$recsenha' where IdTermPaperTeacher='$recid'");
    header("location:listagemProfessorTCC.php");
?>
