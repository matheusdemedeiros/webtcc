<?php 
    include("conecta.php");
    
    $idOrientador = $_POST['fid'];
    $senha = $_POST['password'];
    
    $id=mysqli_query($conexao,"Select * from advisor where IdAdvisor='$idOrientador'");
    $id_user=mysqli_fetch_array($id);
    
    $options = array("cost"=>4);
    $hashPassword = password_hash($senha,PASSWORD_BCRYPT,$options);

    mysqli_query($conexao,"update users 
    set Password='$hashPassword' where IdUser='$id_user[UserId]'");
    header("location:listagemOrientadores.php");
?>
