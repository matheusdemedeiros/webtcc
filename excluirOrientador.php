<?php 
    include("conecta.php");
    
    $recid=$_GET["idexc"];
    $id=mysqli_query($conexao, "SELECT * FROM advisor WHERE IdAdvisor = '$recid'");
    $id_user=mysqli_fetch_array($id);

    mysqli_query($conexao, "DELETE FROM advisor WHERE IdAdvisor = $recid");
    mysqli_query($conexao, "DELETE FROM users WHERE IdUser = '$id_user[UserId]'");

    header("location:listagemOrientadores.php");

?>
