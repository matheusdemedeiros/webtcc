<?php 
    include("conecta.php");
    
    $recid = $_POST['fid'];
    $recnome = $_POST['nome'];
    $recmatricula = $_POST['registration'];
    $recemail = $_POST['email'];
    $recsenha = $_POST['password'];

    mysqli_query($conexao, "update student set NameStudent='$recnome',Registration='$recmatricula', Email='$recemail', Password='$recsenha' where IdStudent='$recid'");
    header("location:listagemAlunos.php");
?>
