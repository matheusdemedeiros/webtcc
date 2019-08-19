<?php 
    include("conecta.php");
    
    $recid = $_POST['fid'];
    $recnome = $_POST['nome'];
    $recemail = $_POST['email'];
    $recsenha = $_POST['password'];

    mysqli_query($conexao, "update aluno set nome='$recnome', email='$recemail', senha='$recsenha' where id='$recid'");
    header("location:listagemAlunos.php");
?>