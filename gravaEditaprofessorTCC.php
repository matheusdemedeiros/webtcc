<?php 
    include("conecta.php");
    
    $recid = $_POST['fid'];
    $recnome = $_POST['nome'];
    $recemail = $_POST['email'];
    $recsenha = $_POST['password'];
    $matricula=$_POST["matricula"];

    mysqli_query($conexao, "update termpaperteacher set 
    NameTermPaperTeacher='$recnome',Email='$recemail', 
    Password='$recsenha',
    Siape='$matricula' where IdTermPaperTeacher='$recid'");
    header("location:listagemProfessorTCC.php");
?>
